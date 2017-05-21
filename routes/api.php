<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'as' => 'api.v1.', 'namespace' => 'API\V1'], function () {
    Route::post('auth/login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::resource('surveys', FormSubmissionController::class);
        Route::get('tutorials', ['uses' => 'DataController@getTutorials']);
    });
});
