<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //if the user is logged in, redirect to dashboard
    if (Auth::check()) {
        // dd('here');
        return redirect()->route('dashboard');
    }
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//protech home route with auth middleware
Route::group(['middleware' => 'auth'], function () {
    //home route
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('user.logout');
    //events  for calendar in HomeController
    Route::get('/events', [App\Http\Controllers\HomeController::class, 'Events'])->name('events');
    Route::get('notifications', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications.index');
    Route::get('notifications/{id}/show', [App\Http\Controllers\NotificationsController::class, 'show'])->name('notifications.show');
    Route::get('notifications/{id}/destroy', [App\Http\Controllers\NotificationsController::class, 'destroy'])->name('notifications.destroy');
    Route::get('notifications/mark-all-as-read', [App\Http\Controllers\NotificationsController::class, 'markAllAsRead'])->name('notifications.mark_all_as_read');
    Route::get('notifications/mark-as-read/{id}', [App\Http\Controllers\NotificationsController::class, 'markAsRead'])->name('notifications.mark_as_read');
    Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

    //activity types routes
    Route::get('activity-types', [App\Http\Controllers\ActivityTypesController::class, 'index'])->name('activities-types.index');
    Route::get('activity-types/create', [App\Http\Controllers\ActivityTypesController::class, 'create'])->name('activities-types.create');
    Route::post('activity-types/store', [App\Http\Controllers\ActivityTypesController::class, 'store'])->name('activities-types.store');
    Route::get('activity-types/{id}/show', [App\Http\Controllers\ActivityTypesController::class, 'show'])->name('activities-types.show');
    Route::get('activity-types/{id}/edit', [App\Http\Controllers\ActivityTypesController::class, 'edit'])->name('activities-types.edit');
    Route::post('activity-types/{id}/update', [App\Http\Controllers\ActivityTypesController::class, 'update'])->name('activities-types.update');
    Route::get('activity-types/{id}/destroy', [App\Http\Controllers\ActivityTypesController::class, 'destroy'])->name('activities-types.destroy');

    //clubs routes
    Route::get('clubs', [App\Http\Controllers\ClubsController::class, 'index'])->name('clubs.index');
    Route::get('clubs/create', [App\Http\Controllers\ClubsController::class, 'create'])->name('clubs.create');
    Route::post('clubs/store', [App\Http\Controllers\ClubsController::class, 'store'])->name('clubs.store');
    Route::get('clubs/{id}/show', [App\Http\Controllers\ClubsController::class, 'show'])->name('clubs.show');
    Route::get('clubs/{id}/edit', [App\Http\Controllers\ClubsController::class, 'edit'])->name('clubs.edit');
    Route::post('clubs/{id}/update', [App\Http\Controllers\ClubsController::class, 'update'])->name('clubs.update');
    Route::get('clubs/{id}/destroy', [App\Http\Controllers\ClubsController::class, 'destroy'])->name('clubs.destroy');
    Route::get('/search-requests', [App\Http\Controllers\ClubsController::class, 'search'])->name('clubs.search');
    //activate & deactivate club
    Route::post('clubs/{id}/activate', [App\Http\Controllers\ClubsController::class, 'activateClub'])->name('clubs.activate');
    Route::post('clubs/{id}/deactivate', [App\Http\Controllers\ClubsController::class, 'deactivateClub'])->name('clubs.deactivate');
    // assign club to user
    Route::get('clubs/{id}/assign', [App\Http\Controllers\ClubsController::class, 'assignClub'])->name('clubs.assign');
    //clubs activities routes
    Route::get('clubs-activities', [App\Http\Controllers\ClubActivitiesController::class, 'index'])->name('clubs-activities.index');
    Route::get('clubs-activities/create', [App\Http\Controllers\ClubActivitiesController::class, 'create'])->name('clubs-activities.create');
    Route::post('clubs-activities/store', [App\Http\Controllers\ClubActivitiesController::class, 'store'])->name('clubs-activities.store');
    Route::get('clubs-activities/{id}/show', [App\Http\Controllers\ClubActivitiesController::class, 'show'])->name('clubs-activities.show');
    Route::get('clubs-activities/{id}/edit', [App\Http\Controllers\ClubActivitiesController::class, 'edit'])->name('clubs-activities.edit');
    Route::post('clubs-activities/{id}/update', [App\Http\Controllers\ClubActivitiesController::class, 'update'])->name('clubs-activities.update');
    Route::get('clubs-activities/{id}/destroy', [App\Http\Controllers\ClubActivitiesController::class, 'destroy'])->name('clubs-activities.destroy');

    //school clubs routes
    Route::get('school-clubs', [App\Http\Controllers\SchoolClubsController::class, 'index'])->name('school-clubs.index');
    Route::get('school-clubs/create', [App\Http\Controllers\SchoolClubsController::class, 'create'])->name('school-clubs.create');
    Route::post('school-clubs/store', [App\Http\Controllers\SchoolClubsController::class, 'store'])->name('school-clubs.store');
    Route::get('school-clubs/{id}/show', [App\Http\Controllers\SchoolClubsController::class, 'show'])->name('school-clubs.show');
    Route::get('school-clubs/{id}/edit', [App\Http\Controllers\SchoolClubsController::class, 'edit'])->name('school-clubs.edit');
    Route::post('school-clubs/{id}/update', [App\Http\Controllers\SchoolClubsController::class, 'update'])->name('school-clubs.update');
    Route::get('school-clubs/{id}/destroy', [App\Http\Controllers\SchoolClubsController::class, 'destroy'])->name('school-clubs.destroy');

    //school club activities routes
    Route::get('school-club-activities', [App\Http\Controllers\SchoolClubActivityController::class, 'index'])->name('school-club-activities.index');
    Route::get('school-club-activities/create', [App\Http\Controllers\SchoolClubActivityController::class, 'create'])->name('school-club-activities.create');
    Route::post('school-club-activities/store', [App\Http\Controllers\SchoolClubActivityController::class, 'store'])->name('school-club-activities.store');
    Route::get('school-club-activities/{id}/show', [App\Http\Controllers\SchoolClubActivityController::class, 'show'])->name('school-club-activities.show');
    Route::get('school-club-activities/{id}/edit', [App\Http\Controllers\SchoolClubActivityController::class, 'edit'])->name('school-club-activities.edit');
    Route::post('school-club-activities/{id}/update', [App\Http\Controllers\SchoolClubActivityController::class, 'update'])->name('school-club-activities.update');
    Route::get('school-club-activities/{id}/destroy', [App\Http\Controllers\SchoolClubActivityController::class, 'destroy'])->name('school-club-activities.destroy');
    // get proposed_date_time from school club activity
    Route::get('school-club-activities/{id}/get-proposed-date-time', [App\Http\Controllers\SchoolClubActivityController::class, 'getProposedDateTime'])->name('school-club-activities.getProposedDateTime');

    //schools routes
    Route::get('schools', [App\Http\Controllers\SchoolsController::class, 'index'])->name('schools.index');
    Route::get('schools/create', [App\Http\Controllers\SchoolsController::class, 'create'])->name('schools.create');
    Route::post('schools/store', [App\Http\Controllers\SchoolsController::class, 'store'])->name('schools.store');
    Route::get('schools/{id}/show', [App\Http\Controllers\SchoolsController::class, 'show'])->name('schools.show');
    Route::get('schools/{id}/edit', [App\Http\Controllers\SchoolsController::class, 'edit'])->name('schools.edit');
    Route::post('schools/{id}/update', [App\Http\Controllers\SchoolsController::class, 'update'])->name('schools.update');
    Route::get('schools/{id}/destroy', [App\Http\Controllers\SchoolsController::class, 'destroy'])->name('schools.destroy');
    //approve school
    Route::get('schools/{id}/approve', [App\Http\Controllers\SchoolsController::class, 'approveSchool'])->name('schools.approve');
    //school club activities routes
    //resources routes
    Route::get('resources', [App\Http\Controllers\ResourcesController::class, 'index'])->name('resources.index');
    Route::get('resources/create', [App\Http\Controllers\ResourcesController::class, 'create'])->name('resources.create');
    Route::post('resources/store', [App\Http\Controllers\ResourcesController::class, 'store'])->name('resources.store');
    Route::get('resources/{id}/show', [App\Http\Controllers\ResourcesController::class, 'show'])->name('resources.show');
    Route::get('resources/{id}/edit', [App\Http\Controllers\ResourcesController::class, 'edit'])->name('resources.edit');
    Route::post('resources/{id}/update', [App\Http\Controllers\ResourcesController::class, 'update'])->name('resources.update');
    Route::get('resources/{id}/destroy', [App\Http\Controllers\ResourcesController::class, 'destroy'])->name('resources.destroy');
    //requests routes
    Route::get('requests', [App\Http\Controllers\RequestsController::class, 'index'])->name('requests.index');
    Route::get('requests/create', [App\Http\Controllers\RequestsController::class, 'create'])->name('requests.create');
    Route::post('requests/store', [App\Http\Controllers\RequestsController::class, 'store'])->name('requests.store');
    Route::get('requests/{id}/show', [App\Http\Controllers\RequestsController::class, 'show'])->name('requests.show');
    Route::get('requests/{id}/edit', [App\Http\Controllers\RequestsController::class, 'edit'])->name('requests.edit');
    Route::post('requests/{id}/update', [App\Http\Controllers\RequestsController::class, 'update'])->name('requests.update');
    Route::get('requests/{id}/destroy', [App\Http\Controllers\RequestsController::class, 'destroy'])->name('requests.destroy');
    //acceptReject request page
    Route::get('requests/{id}/acceptReject', [App\Http\Controllers\RequestsController::class, 'acceptReject'])->name('requests.acceptReject');
    //acceptReject request
    Route::post('requests/{id}/acceptRejectRequest', [App\Http\Controllers\RequestsController::class, 'acceptRejectRequest'])->name('requests.acceptRejectRequest');
    Route::get('requests/{id}/get-proposed-date-time', [App\Http\Controllers\RequestsController::class, 'getProposedDateTime'])->name('requests.getProposedDateTime');
    //schedules routes
    Route::get('schedules', [App\Http\Controllers\SchedulesController::class, 'index'])->name('schedules.index');
    Route::get('schedules/create', [App\Http\Controllers\SchedulesController::class, 'create'])->name('schedules.create');
    Route::post('schedules/store', [App\Http\Controllers\SchedulesController::class, 'store'])->name('schedules.store');
    Route::get('schedules/{id}/show', [App\Http\Controllers\SchedulesController::class, 'show'])->name('schedules.show');
    Route::get('schedules/{id}/edit', [App\Http\Controllers\SchedulesController::class, 'edit'])->name('schedules.edit');
    Route::post('schedules/{id}/update', [App\Http\Controllers\SchedulesController::class, 'update'])->name('schedules.update');
    Route::get('schedules/{id}/destroy', [App\Http\Controllers\SchedulesController::class, 'destroy'])->name('schedules.destroy');

    //users routes
    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/show', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    //profile
    Route::post('change/password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change.password');
    Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('profile', [App\Http\Controllers\UserController::class, 'update_profile'])->name('profile.update');
    //matron routes
    Route::get('matrons', [App\Http\Controllers\MatronsController::class, 'index'])->name('matrons.index');
    Route::get('matrons/create', [App\Http\Controllers\MatronsController::class, 'create'])->name('matrons.create');
    Route::post('matrons/store', [App\Http\Controllers\MatronsController::class, 'store'])->name('matrons.store');
    Route::get('matrons/{id}/show', [App\Http\Controllers\MatronsController::class, 'show'])->name('matrons.show');
    Route::get('matrons/{id}/edit', [App\Http\Controllers\MatronsController::class, 'edit'])->name('matrons.edit');
    Route::post('matrons/{id}/update', [App\Http\Controllers\MatronsController::class, 'update'])->name('matrons.update');
    Route::get('matrons/{id}/destroy', [App\Http\Controllers\MatronsController::class, 'destroy'])->name('matrons.destroy');
    //mentor routes
    Route::get('mentors', [App\Http\Controllers\MentorsController::class, 'index'])->name('mentors.index');
    Route::get('mentors/create', [App\Http\Controllers\MentorsController::class, 'create'])->name('mentors.create');
    Route::post('mentors/store', [App\Http\Controllers\MentorsController::class, 'store'])->name('mentors.store');
    Route::get('mentors/{id}/show', [App\Http\Controllers\MentorsController::class, 'show'])->name('mentors.show');
    Route::get('mentors/{id}/edit', [App\Http\Controllers\MentorsController::class, 'edit'])->name('mentors.edit');
    Route::post('mentors/{id}/update', [App\Http\Controllers\MentorsController::class, 'update'])->name('mentors.update');
    Route::get('mentors/{id}/destroy', [App\Http\Controllers\MentorsController::class, 'destroy'])->name('mentors.destroy');
    //reject or approve mentors
    Route::post('mentors/{id}/approve', [App\Http\Controllers\MentorsController::class, 'approve'])->name('mentors.approve');
    Route::get('mentors/{id}/reject', [App\Http\Controllers\MentorsController::class, 'reject'])->name('mentors.reject');
    //update Mentor Profile
    Route::post('mentors/{id}/profile', [App\Http\Controllers\MentorsController::class,'updateMentorProfile'])->name('mentors.profile');
    //coordinator routes
    Route::get('coordinators', [App\Http\Controllers\CordinatorsController::class, 'index'])->name('coordinators.index');
    Route::get('coordinators/create', [App\Http\Controllers\CordinatorsController::class, 'create'])->name('coordinators.create');
    Route::post('coordinators/store', [App\Http\Controllers\CordinatorsController::class, 'store'])->name('coordinators.store');
    Route::get('coordinators/{id}/show', [App\Http\Controllers\CordinatorsController::class, 'show'])->name('coordinators.show');
    Route::get('coordinators/{id}/edit', [App\Http\Controllers\CordinatorsController::class, 'edit'])->name('coordinators.edit');
    Route::post('coordinators/{id}/update', [App\Http\Controllers\CordinatorsController::class, 'update'])->name('coordinators.update');
    Route::get('coordinators/{id}/destroy', [App\Http\Controllers\CordinatorsController::class, 'destroy'])->name('coordinators.destroy');
    //availability routes
    Route::get('availabilities', [App\Http\Controllers\AvailabilitiesController::class, 'index'])->name('availabilities.index');
    Route::get('availabilities/create', [App\Http\Controllers\AvailabilitiesController::class, 'create'])->name('availabilities.create');
    Route::post('availabilities/store', [App\Http\Controllers\AvailabilitiesController::class, 'store'])->name('availabilities.store');
    Route::get('availabilities/{id}/show', [App\Http\Controllers\AvailabilitiesController::class, 'show'])->name('availabilities.show');
    Route::get('availabilities/{id}/edit', [App\Http\Controllers\AvailabilitiesController::class, 'edit'])->name('availabilities.edit');
    Route::post('availabilities/{id}/update', [App\Http\Controllers\AvailabilitiesController::class, 'update'])->name('availabilities.update');
    Route::get('availabilities/{id}/destroy', [App\Http\Controllers\AvailabilitiesController::class, 'destroy'])->name('availabilities.destroy');

    //roles routes
    Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/show', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::post('roles/{id}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::get('roles/{id}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');

    //permissions routes
    Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/show', [App\Http\Controllers\PermissionController::class, 'show'])->name('permissions.show');
    Route::get('permissions/{id}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('permissions/{id}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
    Route::get('permissions/{id}/destroy', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');

    //locations routes
    Route::get('locations', [App\Http\Controllers\LocationController::class, 'index'])->name('locations.index');
    Route::get('locations/create', [App\Http\Controllers\LocationController::class, 'create'])->name('locations.create');
    Route::post('locations/store', [App\Http\Controllers\LocationController::class, 'store'])->name('locations.store');
    Route::get('locations/{id}/show', [App\Http\Controllers\LocationController::class, 'show'])->name('locations.show');
    Route::get('locations/{id}/edit', [App\Http\Controllers\LocationController::class, 'edit'])->name('locations.edit');
    Route::post('locations/{id}/update', [App\Http\Controllers\LocationController::class, 'update'])->name('locations.update');
    Route::get('locations/{id}/destroy', [App\Http\Controllers\LocationController::class, 'destroy'])->name('locations.destroy');

    //reports routes :sessions,availability,school, activity, schedule
    Route::get('reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/sessions', [App\Http\Controllers\ReportController::class, 'sessionReport'])->name('reports.sessions');
    Route::get('reports/availability', [App\Http\Controllers\ReportController::class, 'availabilityReport'])->name('reports.availability');
    Route::get('reports/school', [App\Http\Controllers\ReportController::class, 'schoolReport'])->name('reports.school');
    Route::get('reports/activity', [App\Http\Controllers\ReportController::class, 'activityReport'])->name('reports.activity');
    Route::get('reports/schedule', [App\Http\Controllers\ReportController::class, 'scheduleReport'])->name('reports.schedule');



});