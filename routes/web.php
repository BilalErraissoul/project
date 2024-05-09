<?php
  
  use Illuminate\Support\Facades\Route;
  
  use App\Http\Controllers\SliderController;
  use App\Http\Controllers\EventController;
  use App\Http\Controllers\ArticleController;
  use App\Http\Controllers\AnnonceController;
  use App\Http\Controllers\AdminController;
  use App\Http\Controllers\ServiceController;
  use App\Http\Controllers\DepartementController;
  use App\Http\Controllers\DoyenController;
  use App\Http\Controllers\FormationController;
  use App\Http\Controllers\RechercheController;
  

  
  Route::get('/events/listeEvents', [EventController::class, 'events'])->name('events');
  Route::resource('events', EventController::class);
  Route::get('/articles/listeArticles', [ArticleController::class, 'articles'])->name('articles');
  Route::get('/annonces/listeAnnonces', [AnnonceController::class, 'annonces'])->name('annonces');
  Route::get('/departements/listeDepartements', [DepartementController::class, 'departements'])->name('departements');
  Route::get('/services/listeServices', [ServiceController::class, 'services'])->name('services');
  Route::get('/doyens/listeDoyens', [DoyenController::class, 'index'])->name('doyens');
  Route::get('/formations/listeFormations', [FormationController::class, 'formations'])->name('formations');
  Route::get('/recherches/listeRecherches', [RechercheController::class, 'recherches'])->name('recherches');

// routes/web.php

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login',[AdminController::class, 'login'] )->name('login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register'); 
Route::post('/admin/register', [AdminController::class, 'store'])->name('register');

// Protected routes, accessible only after authentication
Route::middleware('auth')->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
    // Define other admin routes here...
});




  Route::resource('annonces', AnnonceController::class);
  Route::resource('articles', ArticleController::class);
  Route::resource('services', ServiceController::class);
  Route::resource('departements', DepartementController::class);
  Route::resource('doyens', DoyenController::class);
  Route::resource('formations', FormationController::class);
  Route::resource('recherches', RechercheController::class);
  Route::get('/recherches/{recherche}', [RechercheController::class, 'show'])->name('recherches.show');


  Route::get('sliders', [SliderController::class, 'index'])->name('sliders');
  
  Route::middleware(['auth'])->group(function () {
    // Routes that require authentication
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/articles', [AdminController::class, 'articles'])->name('admin.articles');
    Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');
    Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');
    Route::get('/admin/formations', [AdminController::class, 'formations'])->name('admin.formations');
    Route::get('/admin/recherches', [AdminController::class, 'recherches'])->name('admin.recherches');
    Route::get('/admin/departements', [AdminController::class, 'departements'])->name('admin.departements');
});

  Route::post('/update-checkboxAnonce', [AnnonceController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxArticle', [ArticleController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxDepartement', [DepartementController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxEvent', [EventController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxService', [ServiceController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxFormation', [FormationController::class, 'updateCheckbox'])->name('update.formations.checkbox');
  Route::post('/update-checkboxRecherche', [RechercheController::class, 'updateCheckbox'])->name('update.recherches.checkbox');



  