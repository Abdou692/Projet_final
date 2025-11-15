<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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

// --- Routes Publiques ---
// Remplacez ceci par vos contrôleurs publics
Route::get('/', function () { return view('welcome'); })->name('accueil');
Route::get('/contact', function() { return 'Page de contact'; })->name('contact.show');
Route::get('/recherche', function() { return 'Page de recherche'; })->name('produit.recherche');


// --- Routes pour l'administration ---

Route::prefix('admin')->name('admin.')->group(function () {

    // Connexion de l'administrateur
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Routes protégées pour les admins connectés
    Route::middleware('auth')->group(function() {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/dashboard', function() { return view('admin.dashboard'); })->name('dashboard');

        // CRUD pour les Catégories
        Route::resource('categories', CategoryController::class);

        // CRUD pour les Produits
        Route::resource('products', ProductController::class);
    });
});