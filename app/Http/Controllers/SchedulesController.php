<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ScheduleCreateRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Models\Mentor;
use App\Models\Request as ModelsRequest;
use App\Repositories\ScheduleRepository;
use App\Validators\ScheduleValidator;
use Illuminate\Support\Facades\Auth;

/**
 * Class SchedulesController.
 *
 * @package namespace App\Http\Controllers;
 */
class SchedulesController extends Controller
{
    /**
     * @var ScheduleRepository
     */
    protected $repository;

    /**
     * @var ScheduleValidator
     */
    protected $validator;

    /**
     * SchedulesController constructor.
     *
     * @param ScheduleRepository $repository
     * @param ScheduleValidator $validator
     */
    public function __construct(ScheduleRepository $repository, ScheduleValidator $validator)
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
        if(Auth::user()->hasRole('mentor')){
            $mentor_id = Auth::user()->id;
            $mentor =  Mentor::where('user_id', $mentor_id)->first();
            $schedules = $this->repository->findWhere(['mentor_id' => $mentor->id]);
        }else{
            $schedules = $this->repository->all();
        }
        // $schedules = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $schedules,
            ]);
        }
        // dd($schedules);

        return view('schedules.index', compact('schedules'));
    }

    /**
     * Create a new resource.
     * @return \Illuminate\Http\Response
     * 
     */

    public function create(){
        // $requests = ModelsRequest::where('accepted', 1)->get();
        // if 
        if(!auth()->user()->hasRole('mentor')){
            return redirect()->back()->with('error', 'You do not have permission to access this page');
        }

        // //check if mentor approval_status is approved
        // //get the mentor id
        $mentor_id = auth()->user()->id;
        $mentor = Mentor::where('user_id', $mentor_id)->first();
        if($mentor->approval_status != 'approved'){
            return redirect()->back()->with('error', 'You do not have permission to access this page');
        }

        $requests = ModelsRequest::where('mentor_id', $mentor->id)->where('accepted', 1)->get();
        //dd($requests);
        // return view('schedules.create', compact('requests'));
        return view('schedules.create', compact('requests'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  ScheduleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ScheduleCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
             if(!auth()->user()->role == 'mentor'){
                return redirect()->back()->with('error', 'You are not authorized to perform this action');
             }
             $user = auth()->user()->id;
             $mentor =\App\Models\Mentor::where('user_id', $user)->first();
             $mentor_id = $mentor->id;
             $request->merge(['mentor_id' => $mentor_id]);
            //  dd($request->all());
            if($request->hasFile('logo')){
                // get filename with extension
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                // get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // get just extension
                $extension = $request->file('file')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // upload image
                $path = $request->file('file')->storeAs('public/schedules', $fileNameToStore);

                //merge the file name to the request
                $request->merge(['logo' => $fileNameToStore]);
            }

            $schedule = $this->repository->create($request->all());

            $response = [
                'message' => 'Schedule created.',
                'data'    => $schedule->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('schedules.index')->with('message', $response['message']);
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
        $schedule = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $schedule,
            ]);
        }

        return view('schedules.show', compact('schedule'));
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
        $schedule = $this->repository->find($id);
        $mentor_id = auth()->user()->id;
        $mentor = Mentor::where('user_id', $mentor_id)->first();

        $requests = ModelsRequest::where('mentor_id', $mentor->id)->where('accepted', 1)->get();

        return view('schedules.edit', compact('schedule', 'requests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ScheduleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ScheduleUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            if($request->hasFile('logo')){
                //get the old file name from the database
                // get filename with extension
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                // get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // get just extension
                $extension = $request->file('file')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // upload image
                $request->file('file')->storeAs('public/schedules', $fileNameToStore);

                //merge the file name to the request
                $request->merge(['logo' => $fileNameToStore]);
            }

            $schedule = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Schedule updated.',
                'data'    => $schedule->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('schedules.index')->with('message', $response['message']);
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
                'message' => 'Schedule deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Schedule deleted.');
    }


}
