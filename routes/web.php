<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;

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


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('transaksi.billing');
	})->name('billing');

	Route::get('metode-pembayaran-baru', function () {
		return view('transaksi.add-method');
	})->name('add-payment-method');

	Route::get('edit-metode-pembayaran', function () {
		return view('transaksi.edit-method');
	})->name('edit-payment-method');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('tiket', function () {
		return view('ticket.tiket');
	})->name('tiket');

	Route::get('tambahkan-tiket-baru', function () {
		return view('ticket.add-tiket');
	})->name('add-tiket');

	Route::get('edit-tiket', function () {
		return view('ticket.edit-tiket');
	})->name('edit-tiket');

	Route::get('users', [UserController::class, 'index'])->name('users.index');
	Route::get('users/create', [UserController::class, 'create'])->name('users.create');
	Route::post('users/store', [UserController::class, 'store'])->name('users.store');
	Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
	Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
	Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

	Route::resource('events', EventController::class);
	Route::get('/events', [EventController::class, 'index'])->name('events.index');
	Route::get('events/show/{id}', [EventController::class, 'show'])->name('events.show');
	Route::get('events/create', [EventController::class, 'create'])->name('events.create');
	Route::post('events/store', [EventController::class, 'store'])->name('events.store');
	Route::get('events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
	Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
	Route::delete('/events/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');

	Route::resource('venues', VenueController::class);
	Route::get('/venues', [App\Http\Controllers\VenueController::class, 'index'])->name('venues.index');
	Route::get('venues/show/{id}', [VenueController::class, 'show'])->name('venues.show');
	Route::get('venues/show-layout/{id}', [VenueController::class, 'showLayout'])->name('showLayout');
	Route::get('venues/create', [VenueController::class, 'create'])->name('venues.create');
	Route::post('venues/store', [VenueController::class, 'store'])->name('venues.store');
	Route::get('venues/edit/{id}', [VenueController::class, 'edit'])->name('venues.edit');
	Route::put('venues/{id}', [VenueController::class, 'update'])->name('venues.update');
	Route::delete('/venues/destroy/{id}', [VenueController::class, 'destroy'])->name('venues.destroy');

	Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

	Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');

// Event routes
Route::get('/events', [EventController::class, 'index'])->name('event');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{id}/buy', [EventController::class, 'buy'])->name('events.buy');

// User transaction routes
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::post('/transactions/{id}/upload-proof', [TransactionController::class, 'uploadProof'])->name('transactions.upload-proof');

// Admin transaction routes
Route::get('/admin/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
Route::post('/admin/transactions/{id}/confirm', [AdminTransactionController::class, 'confirm'])->name('admin.transactions.confirm');
