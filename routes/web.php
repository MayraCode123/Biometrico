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
    Route::get('/obtener-id-area-personal','area_personal')->name('personal.area');
});
Route::get('/personal/direccion/{id}', 'PersonalController@direccion_personal')->name('personal.direccion');
Route::get('/personal/marketing/{id}', 'PersonalController@marketing_personal')->name('personal.marketing');
Route::get('/personal/academicos/{id}', 'PersonalController@academicos_personal')->name('personal.academicos');
Route::get('/personal/ti/{id}', 'PersonalController@ti_personal')->name('personal.ti');

Route::controller(HorarioController::class)->group(function(){
    Route::get('/horario', 'index')->name('horario');


});

