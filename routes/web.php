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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PlayerController;

Auth::routes(['verify' => True]);
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Route::get('/', function() {
//     return view('welcome');
// });
Route::get('/', function () {
    if (auth()->user()){
        $users = Auth::user();
        $players = $users->players;

        return view('player.index')->with('players', $players)
                                    ->with('users', $users);
    }else{
        return view('welcome');
    }
});


Route::get('/admin', 'AdminController@admin')->name('admin')
    ->middleware ('is_admin');

    Route::post('/games/', 'GamesController@destroy')->name('games.destroy')
->middleware ('is_admin');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/players/{id}/maj', 'PlayersController@maj')->name('gamemaj');

Route::get('/gamestt', 'GamesController@score')->name('score');
// Route::get('/games', 'PlayerController@index1')->name('pscoreindex');


Route::resource('users', 'UsersController')
    ->middleware ('is_admin');

Route::resource('players', 'PlayersController')
    ->middleware ('is_admin');
Route::resource('levels', 'LevelsController')
    ->middleware ('is_admin');



Route::resource('games', 'GamesController')
    ->middleware ('is_admin');

Route::get('/pindex', 'PlayerController@index1')->name('pindex');
// Route::get('/pindex', 'GamesController@score')->name('score');
// Route::get('/var', 'UserController@vor');

Route::get('/pedit', 'PlayerController@list');
Route::post('/pedit', 'PlayerController@up');


Route::get('/pdelete', 'PlayerController@liste');

Route::get('/padd', 'PlayerController@index3');
Route::post('/padd', 'PlayerController@add');

Route::get('/pselect', 'PlayerController@index2');
Route::get('/pscore', 'PlayerController@score');

Route::get('games', 'PlayerController@select')->name('games');
// Route::post('games', 'PlayerController@select');

Route::get('/pscore', 'PlayerController@score')->name('pscore');

Route::get('/presume', 'PlayerController@resume')->name('presume');
Route::get('/pmsg', 'UsersController@msg2players')->name('msg2players');
Route::get('/pnewsletter', 'UsersController@newsletter')->name('newsletter');

Route::get('/pmail', 'UsersController@liste');
Route::post('/pmail', 'UsersController@up');

Route::get('/adds', 'PlayerController@index4');
Route::post('/adds', 'PlayerController@adds');


Route::get('/rules', function() {
    return view('rules');
})->name('rules');

Route::get('/help', 'HelpController@index')->name('help');


Route::get('/games-admin', 'GamesController@index1')->name('games.index1')
->middleware ('is_admin');


