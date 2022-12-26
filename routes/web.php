<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/operator/home', [HomeController::class, 'index'])->name('operator.home');


//rotta chat
Route::get('/chat', [ChatsController::class, 'index'])->name('chat');
Route::get('/chat/create{id}', [ChatsController::class, 'create'])->name('chat.create');
Route::post('/chat',[ChatsController::class, 'store'])->name('chat.store');
Route::get('/chat/{id}', [ChatsController::class, 'show'])->name('chat.show');
Route::get('chat/{id}/edit', [ChatsController::class, 'edit'])->name('chat.edit');
 //

//rotte per il crud del ticket
Route::resource('tickets', TicketController::class);

//rotte per operatori
Route::get('admin/operatore', [OperatorController::class, 'index'])->name('admin.operatore.index');
Route::get('admin/operatore/create', [OperatorController::class, 'create'])->name('admin.operatore.create');
Route::post('admin/operatore', [OperatorController::class, 'store'])->name('admin.operatore.store');
Route::get('admin/operatore/{id}', [OperatorController::class, 'show'])->name('admin.operatore.show');
Route::get('admin/operatore/{id}/edit', [OperatorController::class, 'edit'])->name('admin.operatore.edit');
Route::put('admin/operatore/{id}', [OperatorController::class, 'update'])->name('admin.operatore.update');
Route::delete('admin/operatore/{id}',[ OperatorController::class, 'destroy'])->name('admin.operatore.destroy');


////rotte per User
//Route::resource('users', \App\Models\User::class)->only('create','index');
//Route::resource('users', \App\Models\User::class)->except('edit', 'store', 'destroy');

//vecchie rotte
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
