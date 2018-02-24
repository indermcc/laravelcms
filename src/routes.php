<?php


// Route::get('testing',function() {
//   echo 'here here here';
// });
//
// Route::get('testing1','Mcc\Cms\Controllers\CmsController@index');

Route::get('/{slug}','Mcc\Cms\Controllers\CmsController@test');
