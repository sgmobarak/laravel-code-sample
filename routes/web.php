<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', [
    'as' => 'get.site', 'uses' => 'Site@getHome'
]);

Route::get('json/products', [
    'as' => 'get.json.products', 'uses' => 'Json@getProducts'
]);

Route::post('json/save/product', [
    'as' => 'post.json.save.product', 'uses' => 'Json@getSaveProduct'
]);
