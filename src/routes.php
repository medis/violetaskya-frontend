<?php

Route::get('/{vue?}', 'VioletaskyaFrontend\Controllers\HomeController@index')
    ->where('vue', '^(?!.*api|.*login|.*logout|.*dashboard).*$[\/\w\.-]*')
    ->name('vueroute');