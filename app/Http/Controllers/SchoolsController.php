<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SchoolCreateRequest;
use App\Http\Requests\SchoolUpdateRequest;
use App\Models\Location;
use App\Models\School;
use App\Repositories\SchoolRepository;
use App\Validators\SchoolValidator;
use Illuminate\Support\Carbon;

/**
 * Class SchoolsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SchoolsController extends Controller
{
    /**
     * @var SchoolRepository
     */
    protected $repository;

    /**
     * @var SchoolValidator
     */
    protected $validator;

    /**
     * SchoolsController constructor.
     *
     * @param SchoolRepository $repository
     * @param SchoolValidator $validator
     */
    // public function __construct(SchoolRepository $repository, SchoolValidator $validator)
    // {
    //     $this->repository = $repository;
    //     $this->validator  = $validator;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::with('location')->get();
        // dd($schools);


        return view('schools.index', compact('schools'));
    }


    public function create(){
        $locations = Location::all();
        // dd($locations);
        return view('schools.create', compact('locations'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SchoolCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'school_name' => 'required|unique:schools|max:100',
            'county_id' => 'required',
            //email set to unique but not required sometimes so it can be null
            'email' => $request->email != null ? 'unique:schools|max:100' : '',
            'phone' => 'required',
            // 'address' => 'required',
            'motto' => 'required',
        ]);

        // dd($request->all());
        

        //store school
        School::create([
            'school_name' => $request->school_name,
            'county_id' => $request->county_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'motto' => $request->motto,
            'created_by' => auth()->user()->id,
        ]);

        return redirect()->route('schools.index')->with('success', 'School created successfully');

        // try {

        //     $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
        //     //join 
        //     $created_by = auth()->user()->id;

        //     $request->merge(['created_by' => $created_by]);

        //     $school = $this->repository->create($request->all());

        //     $response = [
        //         'message' => 'School created.',
        //         'data'    => $school->toArray(),
        //     ];

        //     if ($request->wantsJson()) {

        //         return response()->json($response);
        //     }

        //     return redirect()->back()->with('message', $response['message']);
        // } catch (ValidatorException $e) {
        //     if ($request->wantsJson()) {
        //         return response()->json([
        //             'error'   => true,
        //             'message' => $e->getMessageBag()
        //         ]);
        //     }

        //     return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        // }
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
        $school = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $school,
            ]);
        }

        return view('schools.show', compact('school'));
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
        $school = School::find($id);
        $counties = Location::all();

        return view('schools.edit', compact('school', 'counties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SchoolUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'school_name' => 'required|max:100',
            'county_id' => 'required',
            'email' => $request->email != null ? 'unique:schools|max:100' : '',
            'phone' => 'required',
            'motto' => 'required',
        ]);

        $school = School::find($id);
        //update school
        $school->update([
            'school_name' => $request->school_name,
            'county_id' => $request->county_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'motto' => $request->motto,
        ]);

        return redirect()->route('schools.index')->with('success', 'School updated successfully');
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
                'message' => 'School deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'School deleted.');
    }

    public function approveSchool(Request $request, $id){
        //if the user has role coordinator,  or if the user is admin, then allow them to approve the school
        if (!auth()->user()->hasRole('coordinator') && !auth()->user()->hasRole('admin')) {
            return redirect()->back()->with('message', 'You are not authorized to approve schools.');
        }
        
        $school = School::find($id);
        // dd($school);
        $school->approved_by = auth()->user()->id;
        //$school->approved_at = Carbon::now();
        $school->approval_comments = $request->approval_comments;
        $school->status = 'approved';
        $school->save();

        return redirect()->back()->with('message', 'School approved.');
    }
}
