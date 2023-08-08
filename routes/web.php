<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
use Laravel\Sail\Console\PublishCommand;

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

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/category/{category}', [PublicController::class, 'categoryShow'])->name('category.show');
Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');

// Start rotte revisore
Route::middleware(['isRevisor'])->group(function(){
    Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
    Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
    Route::patch('/annulla/annuncio/{announcement}', [RevisorController::class, 'nullAnnouncement'])->name('revisor.null_announcement');
});
// End rotte revisore

Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');



Route::middleware(['auth'])->group(function(){
    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
});

Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

Route::get('/chiSiamo', [PublicController::class, 'chiSiamo'])->name('chiSiamo');
