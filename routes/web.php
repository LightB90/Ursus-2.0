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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\PagesController::class, 'index'])->name('home')->middleware('web');

Route::get('/pagina', [App\Http\Controllers\PagesController::class, 'pagina'])->name('pagina')->middleware('web');

Route::get('/navigation', [App\Http\Controllers\PagesController::class, 'navigation'])->name('navigation')->middleware('web');

Route::post('/text_edit', [App\Http\Controllers\PagesController::class, 'text_edit'])->name('text_edit')->middleware('web');

Route::get('/{id}/edit_file', [App\Http\Controllers\PagesController::class, 'edit_file'])->name('edit_file')->middleware('web');
Route::post('/file_up', [App\Http\Controllers\PagesController::class, 'file_up'])->name('file_up')->middleware('web');
