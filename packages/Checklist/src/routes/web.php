<?php
$namespace = "Checklist\Http\Controllers";


Route::group(['namespace' => $namespace], function () {
	Route::get('/', "ChecklistController@index");
});	