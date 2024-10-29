<?php

use App\Http\Requests\ProduitRequest;
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
})->name('dashboard')->middleware('auth');

// Ces routes gerent l'authentification de l'application
Route::delete('/login', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'dologin'])->name('connexion');
Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login')->middleware('guest');


Route::middleware('auth')->group(function() {
    // Ces routes gerent la partie profil de l'utilisateur
    Route::get('/profil', [\App\Http\Controllers\Profil\MyProfilController::class, 'displayProfil'])->name('profil.edit');
    Route::put('/profil', [\App\Http\Controllers\Profil\MyProfilController::class, 'update'])->name('profil.update');
    Route::delete('/profil', [\App\Http\Controllers\Profil\MyProfilController::class, 'delete'])->name('profil.delete');
});

//gerer le systeme de filtrage listing
Route::get('/produit', [\App\Http\Controllers\Admin\ProduitController::class, 'listing'])->name('admin.produit.listing');

// Ces routes gereent la gestion de l'application
Route::prefix('/admin')->name('admin.')->group(function () {

    //Application de middleware pour la protection des routes create, edit et delete
    Route::resource('/produit', \App\Http\Controllers\Admin\ProduitController::class)->except('show')->middleware('auth');
});
