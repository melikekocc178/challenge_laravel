<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtistController;
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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['prefix'=>'artists','middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\ArtistController@index')->name('artists.index');
    Route::get('/artist/{artist:id}', 'App\Http\Controllers\ArtistController@show')->name('artists.show');
});
Route::group(['prefix'=>'admin','middleware' => ['auth', 'auth.admin']], function () {
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('admin.artists.create');
    Route::post('/artists', [ArtistController::class, 'store'])->name('admin.artists.store');
    Route::get('/artists/{artist:id}/edit', [ArtistController::class, 'edit'])->name('admin.artists.edit');
    Route::patch('/artists/{artist:id}/update', [ArtistController::class, 'update'])->name('admin.artists.update');
    Route::delete('/artists/{artist:id}/destroy', [ArtistController::class, 'destroy'])->name('admin.artists.destroy');


});
require __DIR__.'/auth.php';
