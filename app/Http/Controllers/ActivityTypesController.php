<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ActivityTypeCreateRequest;
use App\Http\Requests\ActivityTypeUpdateRequest;
use App\Repositories\ActivityTypeRepository;
use App\Validators\ActivityTypeValidator;

/**
 * Class ActivityTypesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ActivityTypesController extends Controller
{
    /**
     * @var ActivityTypeRepository
     */
    protected $repository;

    /**
     * @var ActivityTypeValidator
     */
    protected $validator;

    /**
     * ActivityTypesController constructor.
     *
     * @param ActivityTypeRepository $repository
     * @param ActivityTypeValidator $validator
     */
    public function __construct(ActivityTypeRepository $repository, ActivityTypeValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $activityTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $activityTypes,
            ]);
        }

        return view('activityTypes.index', compact('activityTypes'));
    }

    public function create()
    {
        return view('activityTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ActivityTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ActivityTypeCreateRequest $request)
    {
        try {
            if(!auth()->user()->hasRole('mentor')){
                return redirect()->back()->with('error', 'You are not authorized to perform this action');
            }

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $user_id = auth()->user()->id;
            $mentor_id = \App\Models\Mentor::where('user_id', $user_id)->first()->id;
            $request->merge(['mentor_id' => $mentor_id]);

            $activityType = $this->repository->create($request->all());

            $response = [
                'message' => 'ActivityType created.',
                'data'    => $activityType->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('activities-types.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activityType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $activityType,
            ]);
        }

        return view('activityTypes.show', compact('activityType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activityType = $this->repository->find($id);

        return view('activityTypes.edit', compact('activityType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ActivityTypeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ActivityTypeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $activityType = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ActivityType updated.',
                'data'    => $activityType->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'ActivityType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ActivityType deleted.');
    }
}
