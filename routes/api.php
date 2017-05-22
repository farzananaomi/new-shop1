<?php
Route::group(['prefix' => 'v1', 'as' => 'api.v1.'], function(){
    Route::post('stocks', ['uses' => 'API\V1\StockController@stock']);
});

