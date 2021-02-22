<?php

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

Route::group(['middleware' => 'guest:candidate'] , function() {
    // candidate login
    Route::get('login' , 'authController@loginCandidateView')->name('candidate.login.view');
    Route::post('login' , 'authController@login')->name('candidate.login');

    // candidate Register
    Route::get('candidate_register' , 'authController@candidateRegisterView')->name('candidate.register.view');
    Route::post('candidate_register' , 'authController@candidateRegister')->name('candidate.register');
});

Route::group(['middleware' => 'auth:candidate'] , function() {
    Route::get('logout' , 'authController@logout')->name('candidate.logout');
    Route::get('dashboard' , 'CandidateControllerDashboard@dashboard')->name('candidate.dashboard');
    // ---------------- //
    Route::get('my_election' , 'CandidateControllerDashboard@myElection')->name('my.election');
    Route::get('all_election' , 'CandidateControllerDashboard@allElection')->name('all.election');
});

