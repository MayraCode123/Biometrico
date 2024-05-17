<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

// data
Route::get('/datos_biometrico','DataController@index')->name('data');
// personal
Route::controller(PersonalController::class)->group(function(){
    Route::get('/personal/', 'index')->name('personal');
    Route::get('/personal/listalista_personal_area', 'lista_personal_area')->name('personal.lista_personal_area');
    Route::post('/store','store')->name('personal.store');
    Route::get('/personal_lista/{id}','lista')->name('personal.lista');
});
Route::controller(HorarioController::class)->group(function(){
    Route::get('/horario', 'index')->name('horario');


});

