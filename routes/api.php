<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/projects', 'ProjectController@create');
    Route::get('/projects', 'ProjectController@index');
    Route::get('/projects/{project}', 'ProjectController@show');
    Route::get('/projects/{project}/issues', 'ProjectController@issues');

    Route::get('/issue_types', 'IssueTypeController@index');


    Route::post('/issue', 'IssueController@store');
    Route::get('/issue/{issue}', 'IssueController@show');
    Route::get('/issues', 'IssueController@index');





});


