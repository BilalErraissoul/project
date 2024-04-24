<?php
  
  use Illuminate\Support\Facades\Route;
  
  use App\Http\Controllers\SliderController;
  use App\Http\Controllers\EventController;
  use App\Http\Controllers\ArticleController;
  use App\Http\Controllers\AnnonceController;
  use App\Http\Controllers\AdminController;
  use App\Http\Controllers\ServiceController;
  use App\Http\Controllers\DepartementController;
  
  Route::get('/events/listeEvents', [EventController::class, 'events'])->name('events');
  Route::resource('events', EventController::class);
  Route::get('/articles/listeArticles', [ArticleController::class, 'articles'])->name('articles');
  Route::get('/annonces/listeAnnonces', [AnnonceController::class, 'annonces'])->name('annonces');
  Route::get('/departements/listeDepartements', [DepartementController::class, 'departements'])->name('departements');
  Route::get('/services/listeServices', [ServiceController::class, 'services'])->name('services');



  Route::resource('annonces', AnnonceController::class);
  Route::resource('articles', ArticleController::class);
  Route::resource('services', ServiceController::class);
  Route::resource('departements', DepartementController::class);
  
  Route::get('sliders', [SliderController::class, 'index'])->name('sliders');
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/admin/articles', [AdminController::class, 'articles'])->name('admin.articles');
  Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');
  Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');
  Route::get('/admin/departements', [AdminController::class, 'departements'])->name('admin.departements');
  Route::post('/update-checkboxAnonce', [AnnonceController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxArticle', [ArticleController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxDepartement', [DepartementController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxEvent', [EventController::class,'updateCheckbox'])->name('update.annonces.checkbox');
  Route::post('/update-checkboxService', [ServiceController::class,'updateCheckbox'])->name('update.annonces.checkbox');

  