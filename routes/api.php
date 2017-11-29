<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','RegisterController@register');

Route::group(['prefix' => 'items'], function(){
    Route::get('/','ItemController@index');
    Route::get('/{item}','ItemController@show');
    Route::post('/','ItemController@store')->middleware('auth:api');
    Route::patch('/{item}','ItemController@update')->middleware('auth:api');
    Route::delete('/{item}','ItemController@destroy')->middleware('auth:api');
    
});