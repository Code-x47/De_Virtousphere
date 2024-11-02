<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\userController;
use App\Http\Controllers\projectController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.login');
});

Route::GROUP(["middleware"=>"auth"], function(){

Route::Post("/newProject",[projectController::class,"newProject"]);
Route::get("index",[mainController::class,"index"]);
Route::POST("task_create/{id}",[mainController::class,"task_create"]);
Route::get("task/{id}",[mainController::class,"assign"]);
Route::get("view/{id}",[projectController::class,"viewTask"]);
Route::get("delete/{id}",[projectController::class,"delete"]);
Route::get("edit/{id}",[projectController::class,"edit"]);

});
//Route::get("index",[projectController::class,"back"]),


Route::Post("/login",[userController::class,"login"]);
Route::get("/logout",[userController::class,"logout"]);



Route::get("download/{file}",[projectController::class,"download"]);

//FILTER BY PRIORITY
Route::get("search",[projectController::class,"task_filter"]);


