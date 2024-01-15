<?php

use App\Http\Controllers\Editor;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;

// Main Page Route
Route::get('/', [Editor::class, 'list'])->name('home');

/* main app routing */
// auth
Route::get('/user/login', [User::class, 'show'])->name('login');
Route::post('/user/login', [User::class, 'login'])->name('login');
Route::get('/user/logout', [User::class, 'logout'])->name('logout');

// no need to auth to preview the cv
Route::get('/preview/{id}', [Editor::class, 'preview'])->name('cv.view');
Route::get('/download/{id}', [Editor::class, 'download'])->name('cv.download');
Route::get('/editor/list', [Editor::class, 'list'])->name('cv.list');

// auth middleware routes
Route::group(['middleware' => ['auth']], function () {
    // editor routes
    Route::group(['prefix' => 'editor'], function () {
        Route::get('/create', [Editor::class, 'create'])->name('cv.create');
		Route::post('/create', [Editor::class, 'create'])->name('cv.store');
        Route::get('/edit/{id}', [Editor::class, 'index'])->name('cv.edit');
		Route::post('/edit/{id}', [Editor::class, 'index'])->name('cv.submit');
		Route::get('/destroy/{id}', [Editor::class, 'destroy'])->name('cv.destroy');
    });
});


