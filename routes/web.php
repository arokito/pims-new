<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParishionerController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ContributionController;

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

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/parishioners',ParishionerController::class);
    Route::resource('/contributions',ContributionController::class);
    Route::resource('/zones',ZoneController::class);
    Route::resource('/families',FamilyController::class);
    Route::resource('/communities',CommunityController::class);
    Route::resource('/expenses',ExpenseController::class);
    Route::resource('/announcements',AnnouncementController::class);
    Route::get('/make-payment',[FrontController::class,'loadPayment']);
    Route::get('/payment-status',[PaymentController::class,'getStatus']);
    Route::post('/make-payment',[PaymentController::class,'verifyPayNumber']);
    Route::post('/load-page', [PesaplController::class, 'sendRequest']);
    
    Route::resource('/roles',RoleController::class);
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    
    
    Route::get('/payment-form/{id}', [PaymentController::class, 'loadForm']);
    Route::post('/loadPesapalIframe', [PaymentController::class, 'sendRequest']);
    
    Route::post('/self-reg', [PaymentController::class, 'selfReg']);
    Route::get('/reg-index',[PaymentController::class, 'selfRegIndex']);
});








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
