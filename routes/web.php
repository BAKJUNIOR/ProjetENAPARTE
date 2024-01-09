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
use App\Http\Controllers\VendeurController;
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

    //Acces user
    Route::get('/user' , [UserGestionController::class , 'index'] )->name('user')->middleware('userAcces:user');
    Route::get('/confirmerRendezVous/{id}',[RendezVousController::class, 'ConfirmationRendezVous'])->name('confirmerRendezVous')->middleware('userAcces:user');
    Route::get('cancelRendezVous/{id}', [RendezVousController::class, 'cancelRendezVous'])->name('cancelRendezVous')->middleware('userAcces:user');
    Route::get('/AllRendezVousUser', [RendezVousController::class, 'AllUserRendezVous'])->name('AllRendezVousUser')->middleware('userAcces:user');



    // end Acces user


    //Acces admin
    Route::get('/admin' , [AdminController::class , 'index'] )->name('admin')->middleware('userAcces:admin');
    Route::get('/AjouterUtilisateur', [UserGestionController::class, 'AjouterUtilisateur'])->name('AjouterUtilisateur')->middleware('userAcces:admin');
    Route::get('/listUsers', [UserGestionController::class, 'listUsers'])->name('listUsers')->middleware('userAcces:admin')->middleware('userAcces:admin');
    Route::post('/AjouterUtilisateur', [UserGestionController::class, 'create'])->middleware('userAcces:admin')->middleware('userAcces:admin');
    Route::get('/editUtilisateur/{id}', [UserGestionController::class, 'editUtilisateur'])->name('editUtilisateur')->middleware('userAcces:admin');
    Route::post('/editUtilisateur', [UserGestionController::class, 'ModifierUser'])->middleware('userAcces:admin');
    Route::post('/deleteUtilisateur/{id}', [UserGestionController::class, 'deleteUtilisateur'])->middleware('userAcces:admin');
    Route::post('/uprole/{id}', [UproleController::class, 'index'])->middleware('userAcces:admin');
    // end Acces admin


    // Acces vendeur
    Route::get('/vendeur' , [VendeurController::class , 'index'] )->name('vendeur')->middleware('userAcces:vendeur');
    Route::get('/addCategorie' , [VendeurController::class , 'addCategorie'] )->name('addCategorie')->middleware('userAcces:vendeur');
    Route::get('/addproduct', [VendeurController::class ,'addproduct'])->name('addproduct')->middleware('userAcces:vendeur');
    Route::get('/addSlider', [VendeurController::class ,'addSlider'])->name('addSlider')->middleware('userAcces:vendeur');
    Route::get('/Categorie', [VendeurController::class ,'Categorie'])->name('Categorie')->middleware('userAcces:vendeur');
    Route::get('/Slider', [VendeurController::class ,'Slider'])->name('Slider')->middleware('userAcces:vendeur');
    Route::get('/product', [VendeurController::class ,'product'])->name('product')->middleware('userAcces:vendeur');
    Route::get('/order', [VendeurController::class ,'order'])->name('order')->middleware('userAcces:vendeur');


    // Categories controller
    Route::post('/SaveCategorie', [CategorieController::class ,'SaveCategorie'])->name('SaveCategorie')->middleware('userAcces:vendeur');  // Savegarder vers la base de donnée
    Route::delete('/deleteCategorie/{id}', [CategorieController::class ,'deleteCategorie'])->name('deleteCategorie')->middleware('userAcces:vendeur');
    Route::get('/editeCategorie/{id}', [CategorieController::class ,'editeCategorie'])->name('editeCategorie')->middleware('userAcces:vendeur');
    Route::put('/UpdateCategorie/{id}', [CategorieController::class ,'UpdateCategorie'])->name('UpdateCategorie')->middleware('userAcces:vendeur');



    // Slider controller
    Route::post('/SaveSlider', [SliderController::class ,'SaveSlider'])->name('SaveSlider')->middleware('userAcces:vendeur');
    Route::delete('/deleteSlider/{id}', [SliderController::class ,'deleteSlider'])->name('deleteSlider')->middleware('userAcces:vendeur');
    Route::get('/editeSlider/{id}', [SliderController::class ,'editeSlider'])->name('editeSlider')->middleware('userAcces:vendeur');
    Route::put('/UpdateSlider/{id}', [SliderController::class ,'UpdateSlider'])->middleware('userAcces:vendeur');
    Route::put('/DesactiverSlider/{id}', [SliderController::class ,'DesactiverSlider'])->middleware('userAcces:vendeur');
    Route::put('/activerSlider/{id}', [SliderController::class ,'activerSlider'])->middleware('userAcces:vendeur');

    // Product controller
    Route::post('/SaveProduct', [ProductController::class ,'SaveProduct'])->name('SaveProduct')->middleware('userAcces:vendeur');
    Route::delete('/deleteProduct/{id}', [ProductController::class ,'deleteProduct'])->middleware('userAcces:vendeur');
    Route::get('/editeProduct/{id}', [ProductController::class ,'editeProduct'])->name('editeProduct')->middleware('userAcces:vendeur');
    Route::put('/UpdateProduct/{id}', [ProductController::class ,'UpdateProduct'])->middleware('userAcces:vendeur');
    Route::put('/DesactiverProduct/{id}', [ProductController::class ,'DesactiverProduct'])->middleware('userAcces:vendeur');
    Route::put('/activerProduct/{id}', [ProductController::class ,'activerProduct'])->middleware('userAcces:vendeur');
    Route::get('/VoirCommande/{id}', [pdfController::class ,'VoirCommande'])->middleware('userAcces:vendeur');

    // End vendeur


    Route::post('/logout' , [AuthenController::class , 'logout'] )->name('logout');
    //pdf controller
});




// Client Controller routes

Route::get('/', [clientController::class ,'Home']); // rédiriger vers la page Home
Route::get('/boutique', [clientController::class ,'boutique'])->name('boutique'); // rédiriger vers la page boutique
Route::get('/panier', [clientController::class ,'panier']); // rédiriger vers la page panier
Route::get('/inscription', [clientController::class ,'inscription']); // rédiriger vers la page inscription
Route::get('/connexion', [clientController::class ,'connexion']); // rédiriger vers la page connexion
Route::get('/AjouterPanier/{id}', [clientController::class ,'AjouterPanier']); // rédiriger vers la page panier
Route::put('/panier/modifierQte/{id}', [clientController::class ,'modifierQte']);
Route::get('/panier/supprimerItem/{id}', [clientController::class ,'supprimerItem']);
Route::post('/createCompte', [clientController::class ,'createCompte']);
Route::post('/connexionCompte', [clientController::class ,'connexionCompte']);
Route::get('/logout', [clientController::class ,'logout']);
Route::get('/checkout', [clientController::class ,'checkout']); // rédiriger vers la page payement
Route::post('/payer', [clientController::class ,'payer']);

Route::get('/PriseRendez-vous', [RendezVousController::class,'PriseRendezVous'])->name('PriseRendez-vous');
Route::post('/AddPriseRendezVous', [RendezVousController::class, 'AddPriseRendezVous']);
