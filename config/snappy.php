<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => env('PATH_WKHTMLTOPDF', '/usr/local/bin/wkhtmltopdf'),
        'timeout' => false,
        'options' => array(
            'cache-dir' => storage_path('app')
        ),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary' => env('PATH_WKHTMLTOIMAGE', '/usr/local/bin/wkhtmltoimage'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
