<?php

use App\Http\Controllers\MovieController;
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
    return view('welcome');
});
Route::get('/task3', [MovieController::class,'task3'])->name('task3');
Route::get('/task3c/{id}', [MovieController::class,'task3c'])->name('task3c');


Route::get('/task4', [MovieController::class,'task4'])->name('task4');


Route::get('/movie', [MovieController::class,'publicIndex'])->name('movies');
Route::get('/movie/{movie:slug}', [MovieController::class,'view'])->name('movies.details');
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('manager/movies',[MovieController::class,'index'])->name('manager.movies.index');  
    Route::prefix('manager')->middleware(['auth'])->name('manager.')->group(function(){
        
        Route::get('movies/create',[MovieController::class,'create'])->name('movies.create');   
        Route::post('movies',[MovieController::class,'store'])->name('movies.store'); 
    });

});