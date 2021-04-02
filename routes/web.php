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

Route::get('/admin', function () {
    return view('welcome');
})->name('admin');

Auth::routes(['reset'=>false,'verify'=>false]);

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('home')->middleware('web');

Route::get('/offline', [App\Http\Controllers\PagesController::class, 'offline'])->name('offline')->middleware('web');

Route::get('/pagina/{id}', [App\Http\Controllers\PagesController::class, 'pagina'])->name('pagina')->middleware('web');

Route::post('/text_edit', [App\Http\Controllers\PagesController::class, 'text_edit'])->name('text_edit')->middleware('web');

Route::get('/edit_file/{id}', [App\Http\Controllers\PagesController::class, 'edit_file'])->name('edit_file')->middleware('web');

Route::post('/file_up', [App\Http\Controllers\PagesController::class, 'file_up'])->name('file_up')->middleware('web');

Route::get('/image_full/{id}', [App\Http\Controllers\PagesController::class, 'image_full'])->name('image_full')->middleware('web');

Route::get('/generate_json', [App\Http\Controllers\PagesController::class, 'generate_json'])->name('generate_json')->middleware('web');


