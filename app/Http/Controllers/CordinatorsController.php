<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CordinatorCreateRequest;
use App\Http\Requests\CordinatorUpdateRequest;
use App\Repositories\CordinatorRepository;
use App\Validators\CordinatorValidator;

/**
 * Class CordinatorsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CordinatorsController extends Controller
{
    /**
     * @var CordinatorRepository
     */
    protected $repository;

    /**
     * @var CordinatorValidator
     */
    protected $validator;

    /**
     * CordinatorsController constructor.
     *
     * @param CordinatorRepository $repository
     * @param CordinatorValidator $validator
     */
    public function __construct(CordinatorRepository $repository, CordinatorValidator $validator)
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
        $cordinators = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cordinators,
            ]);
        }

        return view('cordinators.index', compact('cordinators'));
    }

    public function create()
    {
        $cordinatorsIds = $this->repository->all()->pluck('id')->toArray();
        $users = \App\Models\User::whereNotIn('id', $cordinatorsIds)->where('role', 'coordinator')->get();
        return view('cordinators.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CordinatorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CordinatorCreateRequest $request)
    {
 
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $cordinator = $this->repository->create($request->all());

            $response = [
                'message' => 'Cordinator created.',
                'data'    => $cordinator->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('coordinators.index')->with('message', $response['message']);
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
        $cordinator = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cordinator,
            ]);
        }

        return view('cordinators.show', compact('cordinator'));
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
        $cordinator = $this->repository->find($id);

        return view('cordinators.edit', compact('cordinator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CordinatorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CordinatorUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $cordinator = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Cordinator updated.',
                'data'    => $cordinator->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('coordinators.index')->with('message', $response['message']);
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
                'message' => 'Cordinator deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cordinator deleted.');
    }
}
