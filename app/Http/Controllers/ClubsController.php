<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ClubCreateRequest;
use App\Http\Requests\ClubUpdateRequest;
use App\Models\Club;
use App\Models\Matron;
use App\Models\School;
use App\Models\SchoolClub;
use App\Repositories\ClubRepository;
use App\Validators\ClubValidator;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

/**
 * Class ClubsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ClubsController extends Controller
{
    /**
     * @var ClubRepository
     */
    protected $repository;

    /**
     * @var ClubValidator
     */
    protected $validator;

    /**
     * ClubsController constructor.
     *
     * @param ClubRepository $repository
     * @param ClubValidator $validator
     */
    public function __construct(ClubRepository $repository, ClubValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $clubs = $this->repository->paginate(10);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $clubs,
            ]);
        }
// if request is ajax, return the view
        if ($request->ajax()) {
            return response()->json(view('clubs.table', compact('clubs'))->render());
        }

        return view('clubs.index', compact('clubs'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClubCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ClubCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $created_by = Auth::user()->id;
            $request->merge(['created_by' => $created_by]);
            if ($request->hasFile('logo')) {
                $file = $request->file('logo')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                // get just extension
                $extension = $request->file('logo')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //move the file to the folder, assets/images/clubs
                $path = $request->file('logo')->move(public_path('assets/images/clubs'), $fileNameToStore);
                $name = $fileNameToStore;
                // dd($name);
                //from the request remove the file and add the name of the file to the request
                $logo = $name;
                // $request->merge(['logo' => $name]);
                
            }
           
            //remove the logo from the request before saving
            // $request->request->remove('logo');
            // dd($logo, $request->all());


            $club = $this->repository->create(
                //pass the parameters to the create method
                [
                    'club_name' => $request->club_name,
                    'description' => $request->description,
                    'logo' => $logo,
                    'created_by' => $created_by,
                ]
            );

            $response = [
                'message' => 'Club created.',
                'data'    => $club->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            return redirect()->route('clubs.index')->with('message', $response['message']);

            // return redirect()->back()->with('message', $response['message']);
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
        $club = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $club,
            ]);
        }

        return view('clubs.show', compact('club'));
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
        $club = $this->repository->find($id);

        return view('clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClubUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ClubUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            if ($request->hasFile('logo')) {
                $file = $request->file('logo')->getClientOriginalName();
                $filename = pathinfo($file, PATHINFO_FILENAME);
                // get just extension
                $extension = $request->file('logo')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //move the file to the folder, assets/images/clubs
                $path = $request->file('logo')->move(public_path('assets/images/clubs'), $fileNameToStore);
                $name = $fileNameToStore;
                // dd($name);
                //from the request remove the file and add the name of the file to the request
                $logo = $name;
                // $request->merge(['logo' => $name]);
                $club = $this->repository->update([
                    'club_name' => $request->club_name,
                    'description' => $request->description,
                    'logo' => $logo,
                ], 
                $id);
                
            }
            else{

                $club = $this->repository->update([
                    'club_name' => $request->club_name,
                    'description' => $request->description,
                ], 
                $id);
                
            }

 

            $response = [
                'message' => 'Club updated.',
                'data'    => $club->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('clubs.index')->with('message', $response['message']);
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
                'message' => 'Club deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Club deleted.');
    }

    public function assignClub(Request $request, $id)
    {
        $club = Club::where('id', $id)->first();

        //get the user id of the logged in user
        $user_id = auth()->user()->id;
        //get the matron_id of the logged in user and use it to get the school_id
        $matron = Matron::where('user_id', $user_id)->first();
        $matron_id = $matron->id;
        $school_id = $matron->school_id;
        $school = School::where('id', $school_id)->first();
        // dd($school);



        return view ('clubs.assign', compact('club', 'matron_id', 'school_id', 'school'));
    }

    //on activation of a club by the matron store it as school_c
    public function activateClub(Request $request, $id)
    {
        $club = Club::where('id', $id)->first();

        //get the user id of the logged in user
        $user_id = auth()->user()->id;
        //get the matron_id of the logged in user and use it to get the school_id
        $matron = Matron::where('user_id', $user_id)->first();
        $matron_id = $matron->id;
        $school_id = $matron->school_id;

        //create a school_club with the club id and school id
        $school_club = new SchoolClub();
        $school_club->club_id = $club->id;
        $school_club->school_id = $school_id;
        $school_club->approved_by = $matron_id;
        $school_club->students_count = $request->students_count;
        $school_club->approved = 1;

        $school_club->save();
        return view ('clubs.index')->with('success', 'Club Activated Successfully');
    }

    //on deactivation of a club by the matron delete it from school_c
    public function deactivateClub(Request $request, $id)
    {
        $club = Club::where('id', $id)->first();

        //get the user id of the logged in user
        $user_id = auth()->user()->id;
        //get the matron_id of the logged in user and use it to get the school_id
        $matron_id = Matron::where('user_id', $user_id)->first()->id;
        $school_id = School::where('matron_id', $matron_id)->first()->id;

        //delete the school_club with the club id and school id
        $school_club = SchoolClub::where('club_id', $club->id)->where('school_id', $school_id)->first();
        $school_club->delete();
        return redirect()->back()->with('message', 'Club deactivated.');
    }

    //matron creates school club activities
    public function storeSchoolClubActivity(Request $request)
    {
        //get the user id of the logged in user
        $user_id = auth()->user()->id;
        //get the matron_id of the logged in user and use it to get the school_id
        $matron_id = Matron::where('user_id', $user_id)->first()->id;
        $school_id = School::where('matron_id', $matron_id)->first()->id;

        //get the school_clubs that belong to the school
        $school_clubs = SchoolClub::where('school_id', $school_id)->get();

        //create a school_club_activity with the club id and school id
        $school_club_activity = new SchoolClubActivity();
        $school_club_activity->club_id = $club->id;
        $school_club_activity->school_id = $school_id;
        $school_club_activity->activity = $request->input('activity');
        $school_club_activity->save();
        return redirect()->back()->with('message', 'Club activity created.');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $requests = Club::where('club_name', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->get();
        \Log::info($requests);

        return response()->json($requests);
    }
}
