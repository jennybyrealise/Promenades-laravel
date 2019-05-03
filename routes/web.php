<?php

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

/* Route::get('/', function () {
    return view('index');
}); */

Route::resource('/','PostController');
// Route::get => on met le nom qu'on veut qui apparaisse dans l'URL ex: Route::get('post'..... 
// Donc dans pour l'URL on aura localhost/post
// return view => on met la vue qu'on veut qui apparaisse
/* 
Route::get('promenades',function()
{

    return view('posts/index')->withSpots($posts);
});

 */
Route::resource('promenades','PostController');

/* Route::get('promenades','PostController@index');
Route::get('creer','PostController@index'); */
