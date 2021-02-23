<?php

use Illuminate\Support\Facades\Route;







Route::group(['middleware' => 'guest:visitor'] , function() {
    Route::get('login' , 'authVisitorController@loginView')->name('login.visitor.view');
    Route::post('login' , 'authVisitorController@login')->name('login.visitor');
    Route::get('register' , 'authVisitorController@registerView')->name('visitor.register.view');
    Route::post('register' , 'authVisitorController@register')->name('visitor.register');
});


Route::group(['middleware' => 'auth:visitor'] , function() {
   Route::get('logout' , 'authVisitorController@logout')->name('visitor.logout');
   Route::get('dashboard' , 'DashboardVisitorController@dashboard')->name('visitor.dashboard');
   // --------------------------- //
   Route::get('all_candidate/{id}' , 'DashboardVisitorController@nomination')->name('all_candidate');
   Route::get('nomination_candidate/{id}/election/{election}' , 'DashboardVisitorController@nominationToCandidate')->name('nomination_candidate');
   Route::post('nomination_candidate' , 'DashboardVisitorController@nominationSave')->name('nomination_save');
});
