<?php

namespace App\Http\Controllers;

use App\Models\ClubActivity;
use App\Models\Matron;
use App\Models\SchoolClub;
use App\Models\SchoolClubActivity;
use Illuminate\Http\Request;

class SchoolClubActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check on the user's role if thy are matron check if they are assigned to a school
        //if they are assigned to a school then get the school id and get all the clubs in that school

        $schoolClubActivities = SchoolClubActivity::all();
        if(auth()->user ()->hasRole ('matron')){
            $matron = Matron::where('user_id', auth()->user()->id)->first();
            if($matron->school_id != null){
                $school_clubs = SchoolClub::where('school_id', $matron->school_id)->get();
                $school_clubs_ids = $school_clubs->pluck('id');
                $schoolClubActivities = SchoolClubActivity::whereIn('school_club_id', $school_clubs_ids)->get();
            }
        }
        return view('school_club_activities.index', compact('schoolClubActivities'));
              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //get only school_clubs that are assigned to the school 
        //get the school id from the matron
        if(!auth()->user ()->hasRole ('matron')){
            return redirect()->route('school-club-activities.index')->with('error', 'You are not allowed to access this page');
        }
        $matron = Matron::where('user_id', auth()->user()->id)->first();
        $school_clubs = SchoolClub::where('school_id', $matron->school_id)->get();
        //get all club_ids from the school_clubs
        $club_ids = $school_clubs->pluck('club_id');
        $club_activities =ClubActivity::whereIn('club_id', $club_ids)->get();
        //route to the create view
        return view('school_club_activities.create', compact('school_clubs', 'club_activities'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'school_club_activity' => 'required',
            'description' => 'required',
            'school_club_id' => 'required',
            'club_activity_id' => 'required',
            'proposed_date_time' => 'required',

        ]);

        //create the school club activity
        SchoolClubActivity::create([
            'school_club_activity' => $request->school_club_activity,
            'description' => $request->description,
            'school_club_id' => $request->school_club_id,
            'club_activity_id' => $request->club_activity_id,
            'proposed_date_time' => $request->proposed_date_time,
        ]);

        //redirect to the school club activities index page
        return redirect()->route('school-club-activities.index')->with('success', 'School club activity created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolClubActivity  $schoolClubActivity
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //get the school club activity
        $schoolClubActivity = SchoolClubActivity::find($id);
        //route to the show view
        return view('school_club_activities.show', compact('schoolClubActivity'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolClubActivity  $schoolClubActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //get the school club activity
        $schoolClubActivity = SchoolClubActivity::find($id);
        //get only school_clubs that are assigned to the school 
        //get the school id from the matron
        $matron = Matron::where('user_id', auth()->user()->id)->first();
        $school_clubs = SchoolClub::where('school_id', $matron->school_id)->get();
        //route to the edit view
        return view('school_club_activities.edit', compact('schoolClubActivity', 'school_clubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolClubActivity  $schoolClubActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the request
        $request->validate([
            'school_club_activity' => 'required',
            'description' => 'required',
            'school_club_id' => 'required',
            'club_activity_id' => 'required',
            'proposed_date_time' => 'required',

        ]);

        //update the school club activity
        $schoolClubActivity = SchoolClubActivity::find($id);
        $schoolClubActivity->school_club_activity = $request->school_club_activity;
        $schoolClubActivity->description = $request->description;
        $schoolClubActivity->school_club_id = $request->school_club_id;
        $schoolClubActivity->club_activity_id = $request->club_activity_id;
        $schoolClubActivity->proposed_date_time = $request->proposed_date_time;
        $schoolClubActivity->save();

        //redirect to the school club activities index page
        return redirect()->route('school-club-activities.index')->with('success', 'School club activity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolClubActivity  $schoolClubActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //delete the school club activity
        $schoolClubActivity = SchoolClubActivity::find($id);
        $schoolClubActivity->delete();

        //redirect to the school club activities index page
        return redirect()->route('school-club-activities.index')->with('success', 'School club activity deleted successfully');
    }

    public function getProposedDateTime($id)
    {
        $school_club_activity = \App\Models\SchoolClubActivity::where('id', $id)->first();
        $proposed_date_time = $school_club_activity->proposed_date_time;
        return response()->json(['proposed_date_time' => $proposed_date_time]);
    }

}
