<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\TeacherController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


##
# Layout Routes --> for testing
##

Route::get('/public', function () {
    return view('layouts.public');
});
Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});

##
# Public Routes
##
Route::get('/', function () {
    return view('public.home');
});
Route::get('/about', function () {
    return view('public.about');
});
Route::get('/contact', function () {
    return view('public.contact');
});
Route::get('/admission', function () {
    return view('public.admission');
});



##
# Dashboard routes
##

Route::prefix('dashboard')->group(function () {
    # Admin Routes
    Route::resource('admins', AdminController::class);

    # Teacher Routes
    Route::resource('teachers', TeacherController::class);

    # Field Routes
    Route::resource('fields', FieldController::class);

    # Speciality Routes
    Route::resource('specialities', SpecialityController::class);
});
