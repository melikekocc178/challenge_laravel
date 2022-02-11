<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix'=>'artists','middleware' => 'auth'], function () {
    Route::get('/artist', [ArtistController::class, 'index'])->name('artists.index');
    Route::get('/artist/{artist:id}', [ArtistController::class, 'show'])->name('artists.show');
});
require __DIR__.'/auth.php';
