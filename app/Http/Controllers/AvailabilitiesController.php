<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AvailabilityCreateRequest;
use App\Http\Requests\AvailabilityUpdateRequest;
use App\Models\Mentor;
use App\Repositories\AvailabilityRepository;
use App\Validators\AvailabilityValidator;
use Illuminate\Support\Facades\Auth;

/**
 * Class AvailabilitiesController.
 *
 * @package namespace App\Http\Controllers;
 */
class AvailabilitiesController extends Controller
{
    /**
     * @var AvailabilityRepository
     */
    protected $repository;

    /**
     * @var AvailabilityValidator
     */
    protected $validator;

    /**
     * AvailabilitiesController constructor.
     *
     * @param AvailabilityRepository $repository
     * @param AvailabilityValidator $validator
     */
    public function __construct(AvailabilityRepository $repository, AvailabilityValidator $validator)
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
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')) {
            $availabilities = $this->repository->all();
        } elseif (auth()->user()->hasRole('mentor')) {
            $mentor_id = Auth::user()->id;
            $mentor =  Mentor::where('user_id', $mentor_id)->first();
            $availabilities = $this->repository->findWhere(['mentor_id' => $mentor->id]);
        }
        // $availabilities = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $availabilities,
            ]);
        }

        return view('availabilities.index', compact('availabilities'));
    }



    public function create()
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')) {
            $mentors = \App\Models\Mentor::all();
        } elseif (auth()->user()->hasRole('mentor')) {
            $mentor_id = Auth::user()->id;
            $mentor =  Mentor::where('user_id', $mentor_id)->first();
            $mentors = \App\Models\Mentor::where('id', $mentor->id)->get();
        }
        return view('availabilities.create', compact('mentors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AvailabilityCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AvailabilityCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $availability = $this->repository->create($request->all());

            $response = [
                'message' => 'Availability created.',
                'data'    => $availability->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $availability = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $availability,
            ]);
        }

        return view('availabilities.show', compact('availability'));
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
        $availability = $this->repository->find($id);

        return view('availabilities.edit', compact('availability'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AvailabilityUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AvailabilityUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $availability = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Availability updated.',
                'data'    => $availability->toArray(),
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
                'message' => 'Availability deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Availability deleted.');
    }
}
