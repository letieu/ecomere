<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;
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
Route::get('user', 'UserController@getDetail');
Route::get('logout', 'UserController@logout');

Route::group(['prefix' => '/dasboard'], function () {
  
    Route::get('/',function(){
        return view('welcome');
    })->middleware('role:1');
});
Route::any('{catchall}', function () {
    return view('welcome');
})->where('catchall', '.*');




Route::get('/home', 'HomeController@index')->name('home');
