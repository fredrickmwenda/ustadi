<?php

namespace App\Http\Controllers;

use App\Helpers\DatesValidator;
use App\Models\Availability;
use App\Models\Mentor;
use App\Models\Schedule;
use App\Models\School;
use App\Models\SchoolClubActivity;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sessionReport(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $res = DatesValidator::validate($from_date, $to_date);
        if ($res != 'success') {
            return redirect()->back()->with('error', $res);
        }
        // select alll sessions, when the session date is between the from_date and to_date
        $sessions = \DB::table('sessions')->join('users', 'sessions.user_id', '=', 'users.id')->select('sessions.*', 'users.name')->get();
        $sesions_count = $sessions->count();
        //dd($sessions);
        if ($request->from_date && $request->to_date) {
            $sessions = \DB::table('sessions')->join('users', 'sessions.user_id', '=', 'users.id')->select('sessions.*', 'users.name')->whereBetween('sessions.date', [$request->from_date, $request->to_date])->get();
            $sesions_count = $sessions->count();
        }
        return view('reports.session', compact('sessions', 'sesions_count'));
    }
    public function availabilityReport(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $res = DatesValidator::validate($from_date, $to_date);
        if ($res != 'success') {
            return redirect()->back()->with('error', $res);
        }
        $availabilities = Mentor::whereNotNull('availability')->select('*')->when($request->from_date && $request->to_date, function ($query) use ($request) {
            return $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        })->get();
        // dd($availabilities);
        $availability_count = $availabilities->count();
        return view('reports.availability', compact('availabilities', 'availability_count'));
    }

    public function schoolReport(Request $request)
    {
        // dd($request->all());
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $res = DatesValidator::validate($from_date, $to_date);
        if ($res != 'success') {
            return redirect()->back()->with('error', $res);
        }
        // order by created_at desc
        //when request is location, filter by location
        $schools = School::select('*')->when($request->from_date && $request->to_date, function ($query) use ($request) {
            return $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        })->when($request->location, function ($query) use ($request) {
            return $query->where('county_id', $request->location);
        })->orderBy('created_at', 'desc')->get();
        $schools_count = $schools->count();

        return view('reports.school', compact('schools', 'schools_count'));
    }

    public function activityReport(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $res = DatesValidator::validate($from_date, $to_date);
        if ($res != 'success') {
            return redirect()->back()->with('error', $res);
        }
        $school_club_activities = SchoolClubActivity::select('*')->when($request->from_date && $request->to_date, function ($query) use ($request) {
            return $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        })->get();
        $school_club_activities_count = $school_club_activities->count();
        return view('reports.activity', compact('school_club_activities', 'school_club_activities_count'));
        
    }

    public function scheduleReport(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $res = DatesValidator::validate($from_date, $to_date);
        if ($res != 'success') {
            return redirect()->back()->with('error', $res);
        }
        $schedules = Schedule::select('*')->when($request->from_date && $request->to_date, function ($query) use ($request) {
            return $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        })->get();
        $schedules_count = $schedules->count();
        return view('reports.schedule', compact('schedules', 'schedules_count'));
        
    }
}
