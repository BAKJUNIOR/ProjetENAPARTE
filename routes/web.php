<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ListeEtudiantsController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UproleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGestionController;
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

Route::get('/loginPage' , [AuthenController::class , 'index'] )->name('auth');
Route::post('/loginPage' , [AuthenController::class , 'login'] ); // page de login
Route::get('/regPage' , [AuthenController::class , 'create'] )->name('inscription');
Route::post('/regPage' , [AuthenController::class , 'register'] ); // page d'inscription
Route::get('/verify/{verify_key}' , [AuthenController::class , 'verify'] );; // page d'inscription


Route::middleware(['auth'])->group(function (){

    Route::redirect('/home' , '/');
    Route::get('/admin' , [AdminController::class , 'index'] )->name('admin')->middleware('userAcces:admin');
    Route::get('/user' , [UserGestionController::class , 'index'] )->name('user')->middleware('userAcces:user'); // page d'inscription


    //gestion des utilisateurs
    Route::get('/AjouterUtilisateur', [UserGestionController::class, 'AjouterUtilisateur'])->name('AjouterUtilisateur');
    Route::post('/AjouterUtilisateur', [UserGestionController::class, 'create']);
    Route::get('/editUtilisateur/{id}', [UserGestionController::class, 'editUtilisateur'])->name('editUtilisateur');
    Route::post('/editUtilisateur', [UserGestionController::class, 'ModifierUser']);
    Route::post('/deleteUtilisateur/{id}', [UserGestionController::class, 'deleteUtilisateur']);
    Route::post('/uprole/{id}', [UproleController::class, 'index']);
    Route::get('/userGestion' , [UserGestionController::class, 'index'] )->name('userGestion');


    // Admin Controller routes
    Route::get('/addCategorie' , [AdminController::class , 'addCategorie'] )->name('addCategorie');
    Route::get('/addproduct', [AdminController::class ,'addproduct'])->name('addproduct');
    Route::get('/addSlider', [AdminController::class ,'addSlider'])->name('addSlider');
    Route::get('/Categorie', [AdminController::class ,'Categorie'])->name('Categorie');
    Route::get('/Slider', [AdminController::class ,'Slider'])->name('Slider');
    Route::get('/product', [AdminController::class ,'product'])->name('product');
    Route::get('/order', [AdminController::class ,'order'])->name('order');;


    // Categories controller
    Route::post('/SaveCategorie', [CategorieController::class ,'SaveCategorie'])->name('SaveCategorie');  // Savegarder vers la base de donnée
    Route::delete('/deleteCategorie/{id}', [CategorieController::class ,'deleteCategorie'])->name('deleteCategorie');
    Route::get('/editeCategorie/{id}', [CategorieController::class ,'editeCategorie'])->name('editeCategorie');
    Route::put('/UpdateCategorie/{id}', [CategorieController::class ,'UpdateCategorie'])->name('UpdateCategorie');



    // Slider controller
    Route::post('/SaveSlider', [SliderController::class ,'SaveSlider'])->name('SaveSlider');
    Route::delete('/deleteSlider/{id}', [SliderController::class ,'deleteSlider'])->name('deleteSlider');
    Route::get('/editeSlider/{id}', [SliderController::class ,'editeSlider'])->name('editeSlider');
    Route::put('/UpdateSlider/{id}', [SliderController::class ,'UpdateSlider']);
    Route::put('/DesactiverSlider/{id}', [SliderController::class ,'DesactiverSlider']);
    Route::put('/activerSlider/{id}', [SliderController::class ,'activerSlider']);

    // Product controller
    Route::post('/SaveProduct', [ProductController::class ,'SaveProduct'])->name('SaveProduct');
    Route::delete('/deleteProduct/{id}', [ProductController::class ,'deleteProduct']);
    Route::get('/editeProduct/{id}', [ProductController::class ,'editeProduct']);
    Route::put('/UpdateProduct/{id}', [ProductController::class ,'UpdateProduct']);
    Route::put('/DesactiverProduct/{id}', [ProductController::class ,'DesactiverProduct']);
    Route::put('/activerProduct/{id}', [ProductController::class ,'activerProduct']);



    Route::post('/logout' , [AuthenController::class , 'logout'] )->name('logout');
    //pdf controller
    Route::get('/VoirCommande/{id}', [pdfController::class ,'VoirCommande']);
});




// Client Controller routes

Route::get('/', [clientController::class ,'Home']); // rédiriger vers la page Home
Route::get('/boutique', [clientController::class ,'boutique'])->name('boutique'); // rédiriger vers la page boutique
Route::get('/panier', [clientController::class ,'panier']); // rédiriger vers la page panier
Route::get('/checkout', [clientController::class ,'checkout']); // rédiriger vers la page payement
Route::get('/inscription', [clientController::class ,'inscription']); // rédiriger vers la page inscription
Route::get('/connexion', [clientController::class ,'connexion']); // rédiriger vers la page connexion
Route::get('/AjouterPanier/{id}', [clientController::class ,'AjouterPanier']); // rédiriger vers la page panier
Route::put('/panier/modifierQte/{id}', [clientController::class ,'modifierQte']);
Route::get('/panier/supprimerItem/{id}', [clientController::class ,'supprimerItem']);
Route::post('/createCompte', [clientController::class ,'createCompte']);
Route::post('/connexionCompte', [clientController::class ,'connexionCompte']);
Route::get('/logout', [clientController::class ,'logout']);
Route::post('/payer', [clientController::class ,'payer']);

Route::get('/PriseRendez-vous', [RendezVousController::class,'PriseRendezVous'])->name('PriseRendez-vous');
Route::post('/rendezvous', [RendezVousController::class, 'AddPriseRendezVous'])->name('AddPriseRendezVous');
