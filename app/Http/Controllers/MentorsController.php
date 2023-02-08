<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MentorCreateRequest;
use App\Http\Requests\MentorUpdateRequest;
use App\Models\Location;
use App\Models\User;
use App\Repositories\MentorRepository;
use App\Validators\MentorValidator;
use Illuminate\Support\Facades\Auth;

/**
 * Class MentorsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MentorsController extends Controller
{
    /**
     * @var MentorRepository
     */
    protected $repository;

    /**
     * @var MentorValidator
     */
    protected $validator;

    /**
     * MentorsController constructor.
     *
     * @param MentorRepository $repository
     * @param MentorValidator $validator
     */
    public function __construct(MentorRepository $repository, MentorValidator $validator)
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
        $mentors = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $mentors,
            ]);
        }

        return view('mentors.index', compact('mentors'));
    }

    public function create(){
        // get ids of all mentors and exclude them from the list of users
        $mentorIds = $this->repository->all()->pluck('user_id')->toArray();
        $users = User::whereNotIn('id', $mentorIds)->where('role', 'mentor')->get();
        // $users = User::where('role', 'mentor')->get();
        $locations = Location::all();
        return view('mentors.create', compact('locations', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MentorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MentorCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $mentor = $this->repository->create($request->all());

            $response = [
                'message' => 'Mentor created.',
                'data'    => $mentor->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('mentors.index')->with('message', $response['message']);
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
        $mentor = $this->repository->find($id)->load('user', 'location');

        return response()->json([
            'mentor' => $mentor,
        ]);

        // return view('mentors.show', compact('mentor'));
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
        $mentor = $this->repository->find($id);
        $users = User::where('role', 'mentor')->get();
        $locations = Location::all();

        return view('mentors.edit', compact('mentor', 'locations', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MentorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MentorUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            // dd($request->all(), $id);

            $mentor = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Mentor updated.',
                'data'    => $mentor->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('mentors.index')->with('message', $response['message']);
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
                'message' => 'Mentor deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Mentor deleted.');
    }

    // public function edit

    //approve self signed mentors this is done by the coordinator
    public function approve($id)
    {
        
        //first check if the user has role of coordinator
        // if(!Auth::user()->hasRole('coordinator') || !Auth::user()->hasRole('admin')){
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'You are not authorized to perform this action.'
        //     ]);
            
        // }
        $mentor = $this->repository->find($id);
        $mentor->status = 'active';
        $mentor->approval_status = 'approved';
        $mentor->approved_by = Auth::user()->id;
        $mentor->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Mentor approved.',
        ]);
    }

    //reject self signed mentors this is done by the coordinator
    public function reject($id)
    {
        //first check if the user has role of coordinator
        if(!Auth::user()->hasRole('coordinator')){
            return redirect()->back()->with('message', 'You are not authorized to perform this action.');
        }
        $mentor = $this->repository->find($id);
        $mentor->status = 'rejected';
        $mentor->approved_by = Auth::user()->id;
        $mentor->save();

        return redirect()->back()->with('message', 'Mentor rejected.');
    }
    //update specializations and availability for a mentor
    public function updateMentorProfile(Request $request, $id)
    {
        $mentor = $this->repository->find($id);
        $mentor->specializations = $request->specializations;
        // $mentor->location_id = $request->location_id;
        $mentor->availability = $request->availability;
        $mentor->save();

        return redirect()->back()->with('message', 'Mentor profile updated.');
    }
    
}
