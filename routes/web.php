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
use App\Models\Transaction;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;

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
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
	Route::get('events', [EventController::class, 'index'])->name('events.index');
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

	Route::get('billings', [PaymentMethodController::class, 'index'])->name('billings');
	Route::get('billings/create', [PaymentMethodController::class, 'create'])->name('billings.create');
	Route::post('billings/store', [PaymentMethodController::class, 'store'])->name('billings.store');
	Route::get('billings/edit/{id}', [PaymentMethodController::class, 'edit'])->name('billings.edit');
	Route::post('billings/update/{id}', [PaymentMethodController::class, 'update'])->name('billings.update');
	Route::delete('billings/destroy/{id}', [PaymentMethodController::class, 'destroy'])->name('billings.destroy');
	Route::post('transactions/{transaction}/confirm', [TransactionController::class, 'confirm'])->name('transactions.confirm');
	Route::post('transactions/{transaction}/reject', [TransactionController::class, 'reject'])->name('transactions.reject');

	Route::resource('tickets', TicketController::class);
	Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
	Route::get('tickets/show/{id}', [TicketController::class, 'show'])->name('tickets.show');
	Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
	Route::post('tickets/store', [TicketController::class, 'store'])->name('tickets.store');
	Route::get('tickets/edit/{id}', [TicketController::class, 'edit'])->name('tickets.edit');
	Route::put('tickets/{id}', [TicketController::class, 'update'])->name('tickets.update');
	Route::delete('/tickets/destroy/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');

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

Route::get('login-user', function () {
	return view('tampilanuser/login/login');
})->name('login-user');

Route::get('signup-user', function () {
	return view('tampilanuser/login/signup');
})->name('signup-user');