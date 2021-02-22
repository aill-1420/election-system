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

Route::group(['middleware' => 'guest:admin'] , function() {
    Route::get('login' , 'authController@loginView')->name('admin.login.view');
    Route::post('login' , 'authController@login')->name('admin.login');
    // ------------------------- //
});


Route::group(['middleware' => 'auth:admin'] , function() {
    Route::get('logout' , 'authController@logout')->name('admin.logout');
    Route::get('dashboard' , 'DashboardController@index')->name('admin.dashboard');
    ########
    Route::resource('visitor' , 'VisitorController');
    #Route::get('register' , 'VisitorController@registerVisitor')->name('visitor.register');
    ########
    Route::resource('candidate' , 'CandidateController');
    ########
    Route::resource('election' , 'ElectionController');
    Route::get('election_votes/{id}' , 'ElectionController@AllVotes')->name('election.votes');
});

   // ---------

   // ---------
   // votes
   Route::resource('votes' , 'VotesController');
   // votes
   // ---------
   // admin
   Route::resource('admin' , 'AdminController');
   // admin
   // ---------

