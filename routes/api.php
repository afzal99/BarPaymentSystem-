<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register','RegisterController@register');
Route::post('/sale','SaleController@store')->middleware('auth:api');


Route::group(['prefix' => 'itemgroups'], function(){
    Route::get('/','ItemGroupController@index');
    Route::get('/{itemgroup}','ItemGroupController@show');
    Route::post('/','ItemGroupController@store')->middleware('auth:api');
    Route::patch('/{itemgroup}','ItemGroupController@update')->middleware('auth:api'); //controller remains
    Route::delete('/{itemgroup}','ItemGroupController@destroy')->middleware('auth:api'); //controller remains
    
});

Route::group(['prefix' => 'items'], function(){
    Route::get('/','ItemController@index');
    Route::get('/{item}','ItemController@show');
    Route::post('/','ItemController@store')->middleware('auth:api');
    Route::patch('/{item}','ItemController@update')->middleware('auth:api');
    Route::delete('/{item}','ItemController@destroy')->middleware('auth:api');
    
});

Route::group(['prefix' => 'groups'], function(){
    Route::get('/','GroupController@index')->middleware('auth:api');
    Route::get('/{group}','GroupController@show')->middleware('auth:api');
    Route::post('/','GroupController@store')->middleware('auth:api');
    Route::patch('/{group}','GroupController@update')->middleware('auth:api');
    Route::delete('/{group}','GroupController@destroy')->middleware('auth:api');
    
});



