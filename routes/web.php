<?php
Route::get('/', 'StreamersIndex');
Route::get('/badge', 'BadgeShow');

Route::group(['middleware' => 'web'], function () {
    // - Submit form
    Route::get('/submit', 'SubmitController@show')->name('submit');
    Route::post('/submit', 'SubmitController@store');
});
Route::get('/{slug}', 'StreamersShow');
