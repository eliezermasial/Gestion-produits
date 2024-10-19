<?php

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
    return view('dashboard.index');
})->name('dashboard');

// Ces routes gerent l'authentification de l'application
Route::delete('/login', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'dologin'])->name('connexion');
Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login')->middleware('guest');

// Ces routes gerent la partie profil de l'utilisateur
Route::get('/profil', [\App\Http\Controllers\Profil\MyProfilController::class, 'edit'])->name('profil.edit')->middleware('auth');
Route::put('/profil', [\App\Http\Controllers\Profil\MyProfilController::class, 'update'])->name('profil.update');

// Ces routes gereent la gestion de l'application
Route::prefix('/admin')->name('admin.')->group(function () {

    //Application de middleware pour la protection des routes create, edit et delete
    Route::resource('/produit', \App\Http\Controllers\Admin\ProduitController::class)->except('show')->
    middleware('auth')->only(['create','edit','delete']);

    // Les autres routes de resource ne seront pas affectées par le middleware
    Route::resource('/produit', \App\Http\Controllers\Admin\ProduitController::class)->except('show','edit','create','delete');

});
