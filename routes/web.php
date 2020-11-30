<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','FolderController@listFolder');

//Folder
Route::post('/createFolder','FolderController@createFolder');
Route::put('/updateFolder/{id}','FolderController@updateFolder');
Route::get('/createFolderView','FolderController@createFolderView');
Route::get('/listFolder','FolderController@listFolder');
Route::get('/listFoldervue','FolderController@listFoldervue');
Route::get('/folderImage/{id}','FolderController@folderImage');
Route::delete('/deleteFolder/{id}','FolderController@deleteFolder');


//Image
Route::post('/createImage','ImageController@createImage');
Route::post('/createImagee','ImageController@createImagee');
Route::get('/createImageView','ImageController@createImageView');
Route::get('/listImage','ImageController@listImage');
Route::delete('/deleteImage/{id}','ImageController@deleteImage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
