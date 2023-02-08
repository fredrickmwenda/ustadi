@extends('layouts.auth')

@section('content')
<!--this is the dashboard page-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <!--create a row with 4 columnns, school, clubs, requests and users-->
        <!--if the user has role of admin or coordinator, show the school, clubs, requests and users-->
        <!--if the user has role of matron show the number of students in the school, requests from the school, resources available,  and school_clubs -->
        <!--if the user has role of mentor show the number of school he is assigned to, requests he has received from schools,  his resources and school_clubs -->

        @if (Auth::check())
            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Schools</div>
                            <div class="card-body">
                                <h1>{{ $schools }}</h1>
                                <a href="{{ route('schools.index') }}" class="btn btn-primary">View Schools</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Clubs</div>
                            <div class="card-body">
                                <h1>{{ $clubs }}</h1>
                                <a href="{{ route('clubs.index') }}" class="btn btn-primary">View Clubs</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Requests</div>
                            <div class="card-body">
                                <h1>{{ $requests }}</h1>
                                <a href="{{ route('requests.index') }}" class="btn btn-primary">View Requests</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Users</div>
                            <div class="card-body">
                                <h1>{{ $users }}</h1>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->role_id == 2)
                @php
                    $schools = Auth::user()->schools->count();
                    $requests = Auth::user()->requests->count();
                    $resources = Auth::user()->resources->count();
                    $school_clubs = Auth::user()->school_clubs->count();
                @endphp
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Students</div>
                            <div class="card-body">
                                <h1>{{ $students }}</h1>
                                <a href="{{ route('students.index') }}" class="btn btn-primary">View Students</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Requests</div>
                            <div class="card-body">
                                <h1>{{ $requests }}</h1>
                                <a href="{{ route('requests.index') }}" class="btn btn-primary">View Requests</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Resources</div>
                            <div class="card-body">
                                <h1>{{ $resources }}</h1>
                                <a href="{{ route('resources.index') }}" class="btn btn-primary">View Resources</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of School Clubs</div>
                            <div class="card-body">
                                <h1>{{ $school_clubs }}</h1>
                                <a href="{{ route('school_clubs.index') }}" class="btn btn-primary">View School Clubs</a>
                            </div>
                        </div>
                    </div>

                </div>
            @elseif (Auth::user()->role_id == 4)
                @php
                    $schools = Auth::user()->schools->count();
                    $requests = Auth::user()->requests->count();
                    $resources = Auth::user()->resources->count();
                    $school_clubs = Auth::user()->school_clubs->count();
                @endphp

                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Schools</div>
                            <div class="card-body">
                                <h1>{{ $schools }}</h1>
                                <a href="{{ route('schools.index') }}" class="btn btn-primary">View Schools</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Requests</div>
                            <div class="card-body">
                                <h1>{{ $requests }}</h1>
                                <a href="{{ route('requests.index') }}" class="btn btn-primary">View Requests</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of Resources</div>
                            <div class="card-body">
                                <h1>{{ $resources }}</h1>
                                <a href="{{ route('resources.index') }}" class="btn btn-primary">View Resources</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">No of School Clubs</div>
                            <div class="card-body">
                                <h1>{{ $school_clubs }}</h1>
                                <a href="{{ route('school_clubs.index') }}" class="btn btn-primary">View School Clubs</a>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        @endif

        <!--create 2 columns for graphs-->
        <div class="row">
            <div class="col-md-6">
                <!--if user is admin or coordinator, show sessions graph-->
                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    <div class="card">
                        <div class="card-header">Sessions</div>
                        <div class="card-body">
                            <canvas id="sessions" width="400" height="400"></canvas>
                        </div>
                    </div>
                @endif
                <!--else if user is matron show availability graph-->
                @if (Auth::user()->role_id == 2)
                    <div class="card">
                        <div class="card-header">Availability</div>
                        <div class="card-body">
                            <canvas id="availability" width="400" height="400"></canvas>
                        </div>
                    </div>
                @endif

                <!--if  user is mentor show schedule calendar-->
                @if (Auth::user()->role_id == 4)
                    <div class="card">
                        <div class="card-header">Schedule</div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                @endif
            </div>

            <!--requests column for requests graph-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Requests</div>
                    <div class="card-body">
                        <canvas id="requests" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

                    
    </div>
 