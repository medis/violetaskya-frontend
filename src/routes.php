<?php

Route::get('/{vue?}', 'VioletaskyaFrontend\Controllers\HomeController@index')->where('vue', '^(?!.*api).*$[\/\w\.-]*');
