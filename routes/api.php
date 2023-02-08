<?php

use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\AvailabilitiesController;
use App\Http\Controllers\ActivityTypesController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\ClubActivitiesController;

use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('schools', SchoolsController::class);
// Route::resource('matrons', MatronssController::class);
// Route::resource('mentors', MentorsController::class);
// Route::resource('cordinators', CordinatorsController::class);
// Route::resource('requests', RequestsController::class);
// Route::resource('schedules', SchedulesController::class);
// Route::resource('availabilities', AvailabilitiesController::class);
// Route::resource('users', UsersController::class);
// Route::resource('clubs', ClubsController::class);
// Route::resource('resources', ResourcesController::class);
// Route::resource('books', BooksController::class);
// Route::resource('links', LinksController::class);
// Route::resource('videos', VideosController::class);
// Route::resource('availabilities', AvailabilitiesController::class);
// Route::resource('activities', ClubActivitiesController::class);
// Route::resource('activity-types', ActivityTypesController::class);


