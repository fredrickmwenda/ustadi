<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MatronCreateRequest;
use App\Http\Requests\MatronUpdateRequest;
use App\Repositories\MatronRepository;
use App\Validators\MatronValidator;

/**
 * Class MatronsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MatronsController extends Controller
{
    /**
     * @var MatronRepository
     */
    protected $repository;

    /**
     * @var MatronValidator
     */
    protected $validator;

    /**
     * MatronsController constructor.
     *
     * @param MatronRepository $repository
     * @param MatronValidator $validator
     */
    public function __construct(MatronRepository $repository, MatronValidator $validator)
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
        $matrons = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $matrons,
            ]);
        }

        return view('matrons.index', compact('matrons'));
    }


    public function create()
    {
        $schools = \App\Models\School::all();
        $matronIds = $this->repository->all()->pluck('user_id')->toArray();
        $users = \App\Models\User::whereNotIn('id', $matronIds)->where('role', 'matron')->get();
        return view('matrons.create', compact('schools', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MatronCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MatronCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);


            $matron = $this->repository->create($request->all());

            $response = [
                'message' => 'Matron created.',
                'data'    => $matron->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('matrons.index')->with('message', $response['message']);
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
        $matron = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $matron,
            ]);
        }

        return view('matrons.show', compact('matron'));
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
        $matron = $this->repository->find($id);
        $users = \App\Models\User::all();
        $schools = \App\Models\School::all();

        return view('matrons.edit', compact('matron', 'users', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatronUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MatronUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $matron = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Matron updated.',
                'data'    => $matron->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('matrons.index')->with('message', $response['message']);
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
                'message' => 'Matron deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Matron deleted.');
    }
}
