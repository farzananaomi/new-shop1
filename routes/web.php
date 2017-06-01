

<?php
Route::get('/', ['as' => 'auth.login', 'uses' => function () {
    if (auth()->guard('web')->check()) {

    }

    return view('auth.login');
}]);

Route::post('auth/login', ['as' => 'auth.check', 'uses' => 'AuthController@postLogin']);
Route::group(['middleware' => 'auth:web',], function () {

    Route::resource('stocks', StockController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);


    Route::get('ajax/category', ['as' => 'ajax.category', 'uses' => 'AjaxController@getCategory']);
    Route::get('ajax/sub_category/{id?}', ['as' => 'ajax.sub_category', 'uses' => 'AjaxController@getSubCategory']);
    Route::get('ajax/entity', ['as' => 'ajax.entity', 'uses' => 'AjaxController@getEntity']);
    Route::get('ajax/supplier', ['as' => 'ajax.supplier', 'uses' => 'AjaxController@getSupplier']);
    Route::put('items/{id}', ['as' => 'itemList', 'uses' => 'ItemController@itemList']);

    Route::any('auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);
    Route::get('error_logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('images/{template}/{filename}', [
        'uses' => '\Intervention\Image\ImageCacheController@getResponse',
        'as' => 'imagecache'])->where(['filename' => '[ \w\\.\\/\\-\\@]+']);
    Route::get('pdfview', array('as' => 'pdfview', 'uses' => 'InvoiceController@pdfview'));
});
