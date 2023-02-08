<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Mentor;
use App\Models\Request as ModelsRequest;
use App\Models\Resource;
use App\Models\Schedule;
use App\Models\School;
use App\Models\SchoolClubActivity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rainwater\Active\Active;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //schools count
        $schools = School::get()->count();
        $clubs = Club::get()->count();
        $users = User::get()->count();
        $requests = ModelsRequest::get()->count();
        $resources = Resource::get()->count();
        // we got top 6 top mentors from the ones with the most requests
        $top_mentors  = ModelsRequest::select('mentor_id', \DB::raw('count(*) as total'))
            ->where('accepted', 1)
            ->groupBy('mentor_id')
            ->orderBy('total', 'desc')
            ->take(6)
            ->get();
        $top_mentors = $top_mentors->pluck('mentor_id');
        $top_mentors = Mentor::whereIn('id', $top_mentors)->get();
            // $transactionData = $this->getTransactionsAndDisbursements();
            // $transactionData = json_encode($transactionData);
        $sessionData = $this->sessions();
        $sessionData = json_encode($sessionData);
        $sessionSet = json_decode($sessionData);
        $all_sessions = $sessionSet->original->sessions_data;
        $sessionData = json_encode($all_sessions);
        $current_sessions = $sessionSet->original->current_sessions;
        $currentSessionsData = json_encode($current_sessions);


        $schoolClubActivitiesData = $this->getSchoolClubActivities();
        $schoolClubActivitiesData = json_encode($schoolClubActivitiesData);
        // dd($schoolClubActivitiesData);
        $mentorData = $this->getMentorRequests();
        $mentorData = json_encode($mentorData);
        $mentorSet = json_decode($mentorData);
        $mentorData = $mentorSet->original;
        $mentorData = json_encode($mentorData);
        // dd($mentorData, $schoolClubActivitiesData, $sessionData, $currentSessionsData);

        $all_sessions = DB::table('sessions')->get();
        // dd($all_sessions);

        if(auth()->user()->hasRole('mentor')){
            //get the school_club_ativities of the mentor in accordance to requests
            $user_id = auth()->user()->id;
            $mentor = \App\Models\Mentor::where('user_id', $user_id)->first();
            // check the accepted requests of the mentor
            $request = \App\Models\Request::where('mentor_id', $mentor->id)->where('accepted', 1)->get();
            // get school_club_activity_ids of the requests
            $school_club_activities = $request->pluck('school_club_activity_id');
            // dd($school_club_activities);
            $school_club_activities = SchoolClubActivity::whereIn('id', $school_club_activities)->orderBy('created_at', 'desc')->get();           
        }
        elseif(auth()->user()->hasRole('matron')){
            //get the school_club_ativities of the matron in accordance to requests
            $user_id = auth()->user()->id;
            $matron = \App\Models\Matron::where('user_id', $user_id)->first();
            
            // check the accepted requests of the matron
            $request = \App\Models\Request::where('school_id', $matron->school_id)->where('accepted', 1)->get();
            // get unique school_club_activities
            $school_club_activities = $request->unique('school_club_activity_id');
            $school_club_activities = SchoolClubActivity::whereIn('id', $school_club_activities)->orderBy('created_at', 'desc')->get();
        }
        else{
            $school_club_activities = SchoolClubActivity::orderBy('created_at', 'desc')->get();
        }
        // dd($top_mentors);
        return view('home', compact('schools', 'clubs', 'users', 'requests', 'resources', 'top_mentors', 'school_club_activities', 'sessionData', 'currentSessionsData', 'schoolClubActivitiesData', 'mentorData', 'all_sessions'));
    }

    //profile route
    public function profile()
    {
        return view('profile');
    }

//     $data = CrudEvents::whereDate('event_start', '>=', $request->start)
//     ->whereDate('event_end',   '<=', $request->end)
//     ->get(['id', 'event_name', 'event_start', 'event_end']);
// return response()->json($data);
    public function Events(Request $request){
        //check if request is ajax
        // if($request->ajax()){
            if(auth()->user()->hasRole('mentor')){
                //get the school_club_ativities of the mentor in accordance to requests
                $user_id = auth()->user()->id;
                $mentor = \App\Models\Mentor::where('user_id', $user_id)->first();
                $schedules = Schedule::where('mentor_id', $mentor->id)->get();  

            }
            else{
                $schedules = Schedule::get(['id', 'event_name', 'event_start', 'event_end']);
            }
            //return events
            return response()->json($schedules);
        // }
        // else return blade file
        // return view('schedules.index');
      
    }


    public function sessions(){
        $sessions_data = [];
        $current_sessions = [];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        //get  the sessions of all the users from the database
        $sessions  = \DB::table('sessions')->get();
        // dd($sessions);
        //group the sessions by month 
        $sessionsByMonth = $sessions->groupBy(function($val) {
            return Carbon::parse($val->last_activity)->format('M');
        });
        $active_users = Active::users()->get();
        // active users are a collection of users, convert it to an array
        $active_users = $active_users->toArray();

        //loop through months
        foreach($months as $month){
            //check if the month is in the sessionsByMonth array
            if(array_key_exists($month, $sessionsByMonth->toArray())){
                //if it is, get the sessions of that month
                $sessions = $sessionsByMonth[$month];
                //loop through the sessions
                foreach($sessions as $session){
                    if (in_array($session->user_id, $active_users)) {
                        $session->active = true;
                        //get the count of the active users
                        $active_users_count = count($active_users);
                        $current_sessions[$month][] = $active_users_count;
                    }
                    //if this is the current month and last_activity is less than 5 minutes ago, add it current sessions, else add it to the sessions_data array
                    // if($month == Carbon::now()->format('M') && Carbon::parse($session->last_activity)->diffInMinutes(Carbon::now()) < 5){
                    //     array_push($current_sessions, $session);
                    // }
                    else{
                        //count the number of sessions for that month
                        $sessions_count = count($sessions);
                        $the_user_id = $session->user_id;
                        // $sessions_data[$month] = [$sessions_count, $the_user_id];
                        // array_push($sessions_data,  $sessions_count
                        $sessions_data[$month][] = $sessions_count;
                    }
                }
            }
            else{
                //if it doesn't, add an empty array to the sessions_data array
                $sessions_data[$month] = [];
                $current_sessions[$month] = [];
            }
        }

        // dd($sessions_data, $current_sessions);
        return response()->json(['sessions_data' => $sessions_data, 'current_sessions' => $current_sessions]);
 
    }
    public function getSchoolClubActivities(){
        $school_club_activities = [];
        if(auth()->user()->hasRole('matron')){
            //get the school_club_ativities of the matron in accordance to requests
            $user_id = auth()->user()->id;
            $matron = \App\Models\Matron::where('user_id', $user_id)->first();
            
            // check the accepted requests of the matron
            $request = \App\Models\Request::where('school_id', $matron->school_id)->where('accepted', 1)->get();
            // get unique school_club_activities
            $school_club_activities = $request->unique('school_club_activity_id');
            $school_club_activities = SchoolClubActivity::whereIn('id', $school_club_activities)->get();
            //order by month
            $school_club_activities_month  = $school_club_activities->groupBy(function($val) {
                return Carbon::parse($val->created_at)->format('M');
            });
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            foreach($months as $month){
                //check if the month is in the sessionsByMonth array
                if(array_key_exists($month, $school_club_activities_month->toArray())){
                    //if it is, get the sessions of that month
                    $school_club_activities = $school_club_activities_month[$month];
                    //loop through the sessions
                    foreach($school_club_activities as $school_club_activity){
                        //count the number of school_club_activities for that month
                        $school_club_activities_count = count($school_club_activities);
                        $school_club_activities_data[$month] = $school_club_activities_count;
                        // $school_club_activities_data[$month][] = $school_club_activity;
                    }
                }
                else{
                    //if it doesn't, add an empty array to the sessions_data array
                    $school_club_activities_data[$month] = [];
                }
            }
            // dd($school_club_activities_data);

            return response()->json($school_club_activities_data);
            
        }
        
    }

    public function getMentorRequests(){
        $request_data = [];
        if(auth()->user()->hasRole('mentor')){
            //get the school_club_ativities of the mentor in accordance to requests
            $user_id = auth()->user()->id;
            $mentor = \App\Models\Mentor::where('user_id', $user_id)->first();
            $request = \App\Models\Request::where('mentor_id', $mentor->id)->where('accepted', 1)->get();
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            //order by month
            $request_month  = $request->groupBy(function($val) {
                return Carbon::parse($val->created_at)->format('M');
            });
            // dd($request_month);
            foreach($months as $month){
                //check if the month is in the sessionsByMonth array
                if(array_key_exists($month, $request_month->toArray())){
                    foreach($request_month as $requesti => $value ){
                        $monthly_request = $value;
                        //count the number of school_club_activities for that month
                        $request_count = count($monthly_request);
                        $request_data[$month] = $request_count;
                        // $school_club_activities_data[$month][] = $school_club_activity;
                    }
                }
                else{
                    //if it doesn't, add an empty array to the sessions_data array
                    $request_data[$month] = [];
                }
            }
        }
        elseif(auth()->user()->hasRole('matron')){
            //get the school_club_ativities of the mentor in accordance to requests
            $user_id = auth()->user()->id;
            $matron = \App\Models\Matron::where('user_id', $user_id)->first();
            $request = \App\Models\Request::where('school_id', $matron->school_id)->where('accepted', 1)->get();
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            //order by month
            $request_month  = $request->groupBy(function($val) {
                return Carbon::parse($val->created_at)->format('M');
            });
            foreach($months as $month){
                //check if the month is in the sessionsByMonth array
                if(array_key_exists($month, $request_month->toArray())){
                    //if it is, get the sessions of that month
                    $request = $request_month[$month];
                    //loop through the sessions
                    foreach($request as $request){
                        //count the number of school_club_activities for that month
                        $request_count = count($request);
                        $request_data[$month] = $request_count;
                        // $school_club_activities_data[$month][] = $school_club_activity;
                    }
                }
                else{
                    //if it doesn't, add an empty array to the sessions_data array
                    $request_data[$month] = [];
                }
            }
        }
        // dd($request_data);

        return response()->json($request_data);

    }


 
}
