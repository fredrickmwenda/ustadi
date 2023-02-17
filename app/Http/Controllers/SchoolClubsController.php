<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SchoolClubCreateRequest;
use App\Http\Requests\SchoolClubUpdateRequest;
use App\Models\Matron;
use App\Repositories\SchoolClubRepository;
use App\Validators\SchoolClubValidator;

/**
 * Class SchoolClubsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SchoolClubsController extends Controller
{
    /**
     * @var SchoolClubRepository
     */
    protected $repository;

    /**
     * @var SchoolClubValidator
     */
    protected $validator;

    /**
     * SchoolClubsController constructor.
     *
     * @param SchoolClubRepository $repository
     * @param SchoolClubValidator $validator
     */
    public function __construct(SchoolClubRepository $repository, SchoolClubValidator $validator)
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
            $schoolClubs = $this->repository->all();
        } elseif (auth()->user()->hasRole('matron')) {
            $matron = auth()->user()->id;
            $matron = Matron::where('user_id', $matron)->first();
            $school_id = $matron->school_id;
            $schoolClubs = $this->repository->findWhere(['school_id' => $school_id]);
        } else{
            // you are not allowed to view this page
            return redirect()->back()->with('message', 'You are not allowed to view this page');
        }
        // $schoolClubs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $schoolClubs,
            ]);
        }

        return view('schoolClubs.index', compact('schoolClubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SchoolClubCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SchoolClubCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $schoolClub = $this->repository->create($request->all());

            $response = [
                'message' => 'SchoolClub created.',
                'data'    => $schoolClub->toArray(),
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
        $schoolClub = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $schoolClub,
            ]);
        }

        return view('schoolClubs.show', compact('schoolClub'));
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
        $schoolClub = $this->repository->find($id);

        return view('schoolClubs.edit', compact('schoolClub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SchoolClubUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SchoolClubUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $schoolClub = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SchoolClub updated.',
                'data'    => $schoolClub->toArray(),
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
                'message' => 'SchoolClub deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SchoolClub deleted.');
    }
}
