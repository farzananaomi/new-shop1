<?php
Route::group(['prefix' => 'v1', 'as' => 'api.v1.'], function(){
    Route::post('Items', ['uses' => 'API\V1\StockController@stock']);
});

