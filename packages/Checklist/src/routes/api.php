<?php

$namespace = 'Checklist\Http\Controllers\api';

Route::group(['namespace' => $namespace, 'middleware' => 'api', 'prefix' => 'api/v1'], function () {

   Route::get('checklist/{id}','ChecklistApiController@show');
   Route::post('checklist', 'ChecklistApiController@store');
   Route::post('checklist/update/{id}','ChecklistApiController@update');
   Route::delete('checklist/delete/{id}','ChecklistApiController@destroy');

   Route::get('item','ItemsApiController@getItems');
   Route::post('item', 'ItemsApiController@create');
});
