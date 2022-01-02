<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CourseController;
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
Route::get('/',[CourseController::class,'index']);
Route::get('/render',[CourseController::class,'render']);

Route::group([
    'middleware' => ['web'],
    'namespace' => 'App\Http\Controllers\Backend',], function () {
    // ########################### Auth Routes ##############################
    Route::get('auth/login', 'AuthController@login')->name('login');
    Route::post('auth/auth', 'AuthController@auth')->name('auth.auth');
    Route::group([
        'middleware' => ['auth'], 'prefix' => 'backend'], function () {
        Route::get('/', function() {
            return view('backend.dashboard');
        })->name('backend');
        /////////////////////////////////////////////////////////////////////////////////
        //Categories
        ////////////////////////////////////////////////////////////////////////////////
        Route::get('categories/active/{category}', 'CategoryController@active')->name('categories.active');
        Route::resource('categories', 'CategoryController');
        /////////////////////////////////////////////////////////////////////////////
        //Courses
        ////////////////////////////////////////////////////////////////////////////
        Route::get('courses/active/{course}', 'CourseController@active')->name('courses.active');
        Route::resource('courses', 'CourseController');

        //logout
        Route::get('logout', function () {
            auth()->logout();
            return redirect('/')->name('backend.logout');
        })->name('backend.logout');
    });
});
$active_cases = [
    'Deactive', 'Active'
];
define('active_cases', $active_cases);
$levels = [
    'beginner', 'immediat', 'high'
];
define('levels', $levels);
