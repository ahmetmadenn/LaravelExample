<?php

use App\Http\Controllers\IndexController;
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

Route::get("/", [IndexController::class,"getIndex"])->name("index");

Route::post('book/store', [IndexController::class,"postBook"])->name("post_book");

Route::get('book/delete/{id}', [IndexController::class,'bookDelete'])->name('book_delete');

Route::get('book/edit/{id}', [IndexController::class,'getBookEdit'])->name('get_book_edit');

Route::post('book/edit', [IndexController::class, 'postBookEdit'])->name('post_book_edit');
