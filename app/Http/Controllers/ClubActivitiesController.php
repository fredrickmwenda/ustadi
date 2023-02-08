<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ClubActivityCreateRequest;
use App\Http\Requests\ClubActivityUpdateRequest;
use App\Repositories\ClubActivityRepository;
use App\Validators\ClubActivityValidator;

/**
 * Class ClubActivitiesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ClubActivitiesController extends Controller
{
    /**
     * @var ClubActivityRepository
     */
    protected $repository;

    /**
     * @var ClubActivityValidator
     */
    protected $validator;

    /**
     * ClubActivitiesController constructor.
     *
     * @param ClubActivityRepository $repository
     * @param ClubActivityValidator $validator
     */
    public function __construct(ClubActivityRepository $repository, ClubActivityValidator $validator)
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
        $clubActivities = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $clubActivities,
            ]);
        }

        return view('clubActivities.index', compact('clubActivities'));
    }
    public function create()
    {
        $clubs = \App\Models\Club::all();
        $activity_types = \App\Models\ActivityType::all();
        return view('clubActivities.create', compact('clubs', 'activity_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClubActivityCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ClubActivityCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $clubActivity = $this->repository->create($request->all());

            $response = [
                'message' => 'ClubActivity created.',
                'data'    => $clubActivity->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('clubs-activities.index')->with('message', 'ClubActivity created.');
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
        $clubActivity = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $clubActivity,
            ]);
        }

        return view('clubActivities.show', compact('clubActivity'));
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
        $clubActivity = $this->repository->find($id);
        $clubs = \App\Models\Club::all();
        $activity_types = \App\Models\ActivityType::all();

        return view('clubActivities.edit', compact('clubActivity', 'clubs', 'activity_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClubActivityUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ClubActivityUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $clubActivity = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ClubActivity updated.',
                'data'    => $clubActivity->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('clubs-activities.index')->with('message', 'ClubActivity updated.');
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
                'message' => 'ClubActivity deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ClubActivity deleted.');
    }
}
