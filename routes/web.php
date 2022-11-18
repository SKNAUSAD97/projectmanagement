<?php

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

Route::get('/', function () {
    return redirect('/managers/dashboard');
})->name('/');

// Manager Group Routes...
Route::group(['prefix'=>'managers'], function(){

    // Authentication Routes
    Route::get('/dashboard', [App\Http\Controllers\manager\homeController::class, 'index'])->name('/dashboard')->middleware(['auth']);
    Route::get('/login', [App\Http\Controllers\manager\homeController::class, 'login'])->name('/login');
    Route::post('/login', [App\Http\Controllers\manager\homeController::class, 'authentication'])->name('/login');
    Route::get('/logout', [App\Http\Controllers\manager\homeController::class, 'logout'])->name('/logout')->middleware(['auth']);
    
    // Project Routes
    Route::get('/projects', [App\Http\Controllers\manager\homeController::class, 'projects'])->name('/projects')->middleware(['auth']);
    Route::get('/get-projects', [App\Http\Controllers\manager\homeController::class, 'getProjects'])->name('/get-projects')->middleware(['auth']);
    Route::get('/add-projects', [App\Http\Controllers\manager\homeController::class, 'addProjects'])->name('/add-projects')->middleware(['auth']);
    Route::post('/add-projects', [App\Http\Controllers\manager\homeController::class, 'insertProjects'])->name('/add-projects')->middleware(['auth']);
    Route::get('/edit-projects/{id}', [App\Http\Controllers\manager\homeController::class, 'editProjects'])->name('/edit-projects')->middleware(['auth']);
    Route::post('/edit-projects/{id}', [App\Http\Controllers\manager\homeController::class, 'updateProjects'])->name('/edit-projects')->middleware(['auth']);
    Route::get('/delete-projects/{id}', [App\Http\Controllers\manager\homeController::class, 'deleteProjects'])->name('/delete-projects')->middleware(['auth']);
    
    // Milestones Routes
    Route::get('/get-milestones/{id}', [App\Http\Controllers\manager\homeController::class, 'getMilestones'])->name('/get-milestones')->middleware(['auth']);
});


Auth::routes();
