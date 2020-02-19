<?php

Route::get('/',           'ProductController@index');

Route::get('/product/{id}', 'ProductController@show');

Route::get('/filter', 'ProductController@filter');