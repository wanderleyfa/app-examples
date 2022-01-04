<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/todos/{todo}', 'App\Http\Controllers\TodoController@show');
Route::post('/todos', 'App\Http\Controllers\TodoController@create');
Route::put('/todos/{todo}', 'App\Http\Controllers\TodoController@update');
Route::delete('/todos/{todo}', 'App\Http\Controllers\TodoController@delete');