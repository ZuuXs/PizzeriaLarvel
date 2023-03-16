<?php
use App\Http\Controllers\LoggedController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FileController;
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
    return view('main');
})->name('main');

// login
Route::get('/login', [LoggedController::class,'formLogin'])
    ->name('login');
Route::post('/login', [LoggedController::class,'login']);

// logout
Route::get('/logout', [LoggedController::class,'logout'])
    ->name('logout')->middleware('auth');

// register
Route::get('/register', [RegisterUserController::class,'formRegister'])
    ->name('register');
Route::post('/register', [RegisterUserController::class,'register']);

//user home
Route::view('/home','user.home')->middleware('auth')->name('home.user');

//admin home
Route::view('/admin','admin.home')->middleware('auth')
    ->middleware('isAdmin')->name('admin.home');

//chef home
Route::view('/chef','chef.home')
    ->middleware('auth')->middleware('isCook')->name('chef.home');

//1.1 ADMIN : GESTION DES PIZZAS
Route::get('/admin/pizzas',[PizzaController::class,'index'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizzas.index');

Route::get('/admin/pizza/add',[PizzaController::class,'addForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizzas.add');
Route::post('/admin/pizza/add',[PizzaController::class,'add']);

Route::get('admin/pizza/list',[PizzaController::class,'list'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizzas.list');

Route::get('admin/pizza/edit',[PizzaController::class,'editForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizzas.edit');
Route::post('admin/pizza/edit',[PizzaController::class,'edit']);

Route::get('admin/pizza/edit/{id}/index',[PizzaController::class,'indexEditPizza'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizzas.edit.menu');

Route::get('admin/pizza/edit/{id}/name',[PizzaController::class,'editNameForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizza.edit.name');
Route::post('admin/pizza/edit/{id}/name',[PizzaController::class,'editName']);

Route::get('admin/pizza/edit/{id}/desc',[PizzaController::class,'editDescForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizza.edit.desc');
Route::post('admin/pizza/edit/{id}/desc',[PizzaController::class,'editDesc']);

Route::get('admin/pizza/delForm',[PizzaController::class,'delForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizzas.delForm');

Route::get('admin/pizza/del/{pizza_id}',[PizzaController::class,'del'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizza.delete');

Route::get('admin/pizza/add/upload',[FileController::class,'storageUploadForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.pizza.uploadForm');
Route::post('admin/pizza/add/upload',[FileController::class,'storageUpload'])->name('admin.pizza.upload');





//1.2 ADMIN : GESTION DES COMMANDES
Route::view('/admin/commandes','admin.commandes.index')
    ->middleware('auth')->middleware('isAdmin')->name('admin.commandes.index');

Route::get('admin/commandes/date',[CommandeController::class,'dateForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.commandes.date');
Route::post('admin/commandes/date',[CommandeController::class,'date']);

Route::get('admin/commandes/today',[CommandeController::class,'today'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.commandes.today');

Route::get('admin/commandes/all',[CommandeController::class,'all'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.commandes.all');

Route::get('admin/commandes/recette_du_jour',[CommandeController::class,'recette_du_jour'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.commandes.recetteDuJour');





//1.3 ADMIN : GESTION DES UTILISATEURS

Route::view('/admin/users','admin.users.moderation')
    ->middleware('auth')->middleware('isAdmin')->name('admin.users.moderation');

Route::get('/admin/users/create_admin', [RegisterUserController::class,'formRegister'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.users.createAdmin');
Route::post('/admin/users/create_admin',[RegisterUserController::class,'registerAdmin']);

Route::get('/admin/users/create_chef', [RegisterUserController::class,'formRegister'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.users.createChef');
Route::post('/admin/users/create_chef',[RegisterUserController::class,'registerChef']);

Route::get('/admin/users/search_chef_login',[UserController::class,'adminSearchChefLoginForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.users.searchChefLoginForm');
Route::post('/admin/users/search_chef_login',[UserController::class,'adminSearchChefLogin']);

Route::get('admin/users/edit_password_chef/{login}',[UserController::class,'adminEditPassChefForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.users.editPassChefForm');
Route::post('admin/users/edit_password_chef/{login}',[UserController::class,'adminEditPassChef'])->name('admin.users.editPassChef');
 
Route::get('admin/users/delList',[UserController::class,'delForm'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.users.delForm');

Route::get('admin/users/del/{user_id}',[UserController::class,'del'])
    ->middleware('auth')->middleware('isAdmin')->name('admin.users.delete');


//2 CHEF 

Route::get('/chef/commandes',[CommandeController::class,'nonTraitee'])
    ->middleware('auth')->middleware('isCook')->name('chef.commandes.nonTraitee');

Route::get('/chef/detail_commandes/{commande_id}',[CommandeController::class,'detailNonTraitee'])
    ->middleware('auth')->name('chef.commandes.detailNonTraitee');

Route::get('/chef/maj_statut/{statut}',[CommandeController::class,'majStatutPage'])
    ->middleware('auth')->middleware('isCook')->name('chef.commandes.majStatutpage');

Route::get('/chef/maj_statut/{commande_id}/{statut}',[CommandeController::class,'majStatut'])
    ->middleware('auth')->middleware('isCook')->name('chef.commandes.majStatut');


//3.1 Gestion du compte :

Route::get('/user/editPassword',[UserController::class,'editPasswordForm'])
    ->middleware('auth')->name('user.editPassword');
Route::post('user/editPassword',[UserController::class,'editPassword']);

//3.2 USER : Panier

Route::get('/user/commandes/listPizzas',[PizzaController::class,'listPizzas'])->middleware('auth')
    ->name('user.commandes.listPizza');

Route::get('/user/commande_pizza',[PanierController::class,'panierPizza'])
    ->middleware('auth')->name('user.commandes.panier.pizza');

Route::get('/user/commande_pizza/{pizza_id}',[PanierController::class,'panierAdd'])
    ->middleware('auth')->name('user.commandes.panier.ajout');

Route::get('/user/panier',[PanierController::class,'afficherPanier'])
    ->middleware('auth')->name('user.commandes.panier.index');


Route::get('/user/panier/modification_de_quantite/{pizza_id}',[PanierController::class,'modificationQteForm'])
    ->middleware('auth')->name('user.commandes.panier.modificationQte');
Route::post('user/panier/modification_de_quantite/{pizza_id}',[PanierController::class,'modificationQte']);

Route::get('/user/panier/supprimer/{pizza_id}',[PanierController::class,'delPizza'])
    ->middleware('auth')->name('user.commandes.panier.delPizza');

Route::get('/user/panier/affiche_confirmer_panier',[PanierController::class,'confirmation'])
    ->middleware('auth')->name('user.commandes.panier.confirmation');

Route::get('/user/panier/confirmer_panier',[PanierController::class,'confirmer'])
    ->middleware('auth')->name('user.commandes.panier.confirmer');



//3.3 USER : Gestion des commandes
Route::view('/user/historique_commandes','user.commandes.mod.index')
    ->middleware('auth')->name('user.commandes.mod.index');

Route::get('/user/commandes/detail',[CommandeController::class,'historiqueCommandes'])
    ->middleware('auth')->name('user.commandes.mod.detail');

Route::get('/user/commandes_non_recuperees',[CommandeController::class,'failCommandes'])
    ->middleware('auth')->name('user.commandes.mod.fail');



