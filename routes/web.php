<?php

Route::group(['middleware' => ['web']], function (){
    Route::group(['prefix' => 'auth'], function(){
        Route::get('login', 'Auth\AuthController@login');
        Route::post('login', 'Auth\AuthController@attempt');

        Route::get('register', 'Auth\AuthController@register');
        Route::post('register', 'Auth\AuthController@create');

        Route::get('logout', 'Auth\AuthController@logout');
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
        Route::get('/', 'Dashboard\DashboardController@index');
    });
});
