<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RequestCreateRequest;
use App\Http\Requests\RequestUpdateRequest;
use App\Notifications\RequestNotification;
use App\Repositories\RequestRepository;
use App\Validators\RequestValidator;
use Carbon\Carbon;

/**
 * Class RequestsController.
 *
 * @package namespace App\Http\Controllers;
 */
class RequestsController extends Controller
{
    /**
     * @var RequestRepository
     */
    protected $repository;

    /**
     * @var RequestValidator
     */
    protected $validator;

    /**
     * RequestsController constructor.
     *
     * @param RequestRepository $repository
     * @param RequestValidator $validator
     */
    public function __construct(RequestRepository $repository, RequestValidator $validator)
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
            $requests = $this->repository->all();
        } elseif (auth()->user()->hasRole('mentor')) {
            $user = auth()->user();
            $mentor = \App\Models\Mentor::where('user_id', $user->id)->first();
            $requests = $this->repository->findWhere(['mentor_id' => $mentor->id]);
        }
        elseif (auth()->user()->hasRole('matron')) {
           $user_id =  auth()->user()->id;
            $matron = \App\Models\Matron::where('user_id', $user_id)->first();
            $school_id = $matron->school_id;
            $requests = $this->repository->findWhere(['school_id' => $school_id]);
            
        }


        if (request()->wantsJson()) {

            return response()->json([
                'data' => $requests,
            ]);
        }

        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')) {
            $mentors = \App\Models\Mentor::all();
            $schools = \App\Models\School::all();
        } elseif (auth()->user()->hasRole('matron')) {
            //check for mentors with location_id which is same as matron's school location_id
            $user_id =  auth()->user()->id;
            $matron = \App\Models\Matron::where('user_id', $user_id)->first();
            $school_id = $matron->school_id;     
            $schools = \App\Models\School::where('id', $school_id)->first();
            //get school_club_ids of the school
            $school_club_ids = \App\Models\SchoolClub::where('school_id', $school_id)->pluck('id');

            //get the location_id of the school
            $location_id = $schools->county_id;
            $mentors = \App\Models\Mentor::where('location_id', $location_id)->get();
            // also check that school_club_activity is not past proposed_date_time
            $school_club_activities = \App\Models\SchoolClubActivity::where('school_club_id', $school_club_ids)->where('proposed_date_time', '>', date('Y-m-d H:i:s'))->get();
        }
        return view('requests.create', compact('mentors', 'schools', 'school_club_activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RequestCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RequestCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $user_id = auth()->user()->id;
            $matron = \App\Models\Matron::where('user_id', $user_id)->first();
            //get the name of the matron from user
            $created_by = $matron->id;
            $request->merge(['created_by' => $created_by]);

            $request = $this->repository->create($request->all());

            $school_name = \App\Models\School::where('id', $request->school_id)->first();
            $mentor = \App\Models\Mentor::where('id', $request->mentor_id)->first();
            //mentor_name gets the name of the mentor from user model
            $mentor_name = $mentor->user->name;
            // use the the school_club_activity_id to get the club name
            $school_club_activity = \App\Models\SchoolClubActivity::where('id', $request->school_club_activity_id)->first();
            $school_club_id = $school_club_activity->school_club_id;
            $school_club = \App\Models\SchoolClub::where('id', $school_club_id)->first();
            $club_id = $school_club->club_id;
            $club = \App\Models\Club::where('id', $club_id)->first();
            $club_activity_id = $school_club_activity->club_activity_id;
            $club_activity = \App\Models\ClubActivity::where('id', $club_activity_id)->first();
            $activity_name = $club_activity->activity_name;
            //get the request id from this already created request and not from request->id
            $request_id = $request->id; 


            $data =[
                'matron_name' => auth()->user()->name,
                'school_name' => $school_name->school_name,
                'mentor_name' => $mentor_name,
                'club_name' => $club->club_name,
                'activity_name' => $activity_name,
                'request_id' => $request_id,
                'message' => 'You have a new request',
            ];
            // send this data to the mentor as notification in RequestNotification.php
            $mentor->notify(new RequestNotification($data));

            $response = [
                'message' => 'Request created.',
                'data'    => $request->toArray(),
            ];


            // if ($request->wantsJson()) {

            //     return response()->json($response);
            // }

            return redirect()->route('requests.index')->with('message', $response['message']);
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
        $request = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $request,
            ]);
        }

        return view('requests.show', compact('request'));
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
        $request = $this->repository->find($id);

        return view('requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RequestUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RequestUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $request = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Request updated.',
                'data'    => $request->toArray(),
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
                'message' => 'Request deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Request deleted.');
    }

    public function acceptReject($id){
        $request = $this->repository->find($id);
        return view('requests.acceptReject', compact('request'));
    }


    //accept request
    public function acceptRejectRequest(Request $request,  $id){
       
        //send the matron notification that the request has been accepted or rejected
        $requests = $this->repository->find($id);
        // dd($request->status_id);
        if($request->status_id =="accept"){
            $requests->accepted = 1;
            $requests->accepted_at = Carbon::now();
            $requests->save();
            return redirect()->route('requests.index')->with('message', 'Request accepted.');
        } else {
            $requests->accepted = 0;
            $requests->rejection_reason = $request->rejection_reason;
            $requests->save();
            return redirect()->route('requests.index')->with('message', 'Request rejected.');
        }     
    }
    public function getProposedDateTime($id)
    {
        $requests_date = \App\Models\Request::where('id', $id)->first();
        $proposed_date_time = $requests_date->proposed_date_time;
        return response()->json(['proposed_date_time' => $proposed_date_time]);
    }

    // get proposed_date_time of a school_club_activity using ajax

}
