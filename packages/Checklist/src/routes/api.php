<?php

$namespace = 'Checklist\Http\Controllers';

Route::group(['namespace' => $namespace, 'middleware' => 'api', 'prefix' => 'api/v1'], function () {
   Route::get('checklist/{id}','ChecklistApiController@show');
   Route::post('checklist', 'ChecklistApiController@store');
   Route::put('checklist/{id}','ChecklistApiController@update');
   Route::delete('checklist/{id}','ChecklistApiController@destroy');
});

Route::group(['namespace' => $namespace, 'middleware' => 'api', 'prefix' => 'api/v1'], function () {
    Route::get('checklist/{id}','ItemsApiController@show');
    Route::post('checklist', 'ItemsApiController@create');
});