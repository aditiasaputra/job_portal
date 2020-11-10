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

//! General
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //? General
    Route::get('/dashboard', 'HomeController@index')->middleware('role:admin')->name('dashboard');

    //? Admin
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/manage/users', 'ManageController@users')->name('users');
        Route::post('/admin/manage/users/add', 'ManageController@createUser')->name('add_user');
        Route::get('/admin/manage/employers', 'ManageController@employers')->name('employers');
        Route::get('/admin/manage/jobseekers', 'ManageController@jobseekers')->name('jobseekers');
        Route::get('/admin/job/job-type', 'ManageController@job-type')->name('job-type');
        Route::get('/admin/job/education', 'ManageController@education')->name('education');
        Route::get('/admin/job/employment', 'ManageController@employment')->name('employment');
        Route::get('/admin/jobs', 'JobController@index')->name('jobs');
        Route::get('/admin/industries', 'IndustryController@index')->name('industries');
        Route::get('/admin/categories', 'CategoryController@index')->name('categories');
        Route::get('/admin/settings/general', 'CategoryController@index')->name('general');
        Route::get('/admin/settings/email-templates', 'CategoryController@index')->name('email-templates');
    });

    //? Employer
    Route::get('/dashboard/employer', function(){return 'hello from employer page';})->middleware('role:employer')->name('employer');
    Route::group(['middleware' => ['role:employer']], function () {
        Route::get('/employers', function () {
            return 'employer';
        });
    });

    //? Job Seeker
    Route::get('/dashboard/jobseeker', function () {
        return 'hello from job seeker page';
    })->middleware('role:jobseeker')->name('jobseeker');
    Route::group(['middleware' => ['role:jobseeker']], function () {
        Route::get('/jobseekers', function () {
            return 'jobseeker';
        });
    });
});
