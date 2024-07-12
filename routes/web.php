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
use App\Http\Controllers\IndexUserController;
use App\Http\Controllers\BuyTicketController;
use App\Http\Controllers\SessionUserController;

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

	Route::get('/', [HomeController::class, 'home'])->middleware('userAkses:admin');
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('userAkses:admin');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile')->middleware('userAkses:admin');

	Route::get('tiket', function () {
		return view('ticket.tiket');
	})->name('tiket')->middleware('userAkses:admin');

	Route::get('tambahkan-tiket-baru', function () {
		return view('ticket.add-tiket');
	})->name('add-tiket')->middleware('userAkses:admin');

	Route::get('edit-tiket', function () {
		return view('ticket.edit-tiket');
	})->name('edit-tiket')->middleware('userAkses:admin');

	Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware('userAkses:admin');
	Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware('userAkses:admin');
	Route::post('users/store', [UserController::class, 'store'])->name('users.store')->middleware('userAkses:admin');
	Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->middleware('userAkses:admin');
	Route::put('users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('userAkses:admin');
	Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('userAkses:admin');

	Route::resource('events', EventController::class);
	Route::get('events', [EventController::class, 'index'])->name('events.index')->middleware('userAkses:admin');
	Route::get('events/show/{id}', [EventController::class, 'show'])->name('events.show')->middleware('userAkses:admin');
	Route::get('events/create', [EventController::class, 'create'])->name('events.create')->middleware('userAkses:admin');
	Route::post('events/store', [EventController::class, 'store'])->name('events.store')->middleware('userAkses:admin');
	Route::get('events/edit/{id}', [EventController::class, 'edit'])->name('events.edit')->middleware('userAkses:admin');
	Route::put('events/{id}', [EventController::class, 'update'])->name('events.update')->middleware('userAkses:admin');
	Route::delete('/events/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy')->middleware('userAkses:admin');

	Route::resource('venues', VenueController::class);
	Route::get('/venues', [App\Http\Controllers\VenueController::class, 'index'])->name('venues.index')->middleware('userAkses:admin');
	Route::get('venues/show/{id}', [VenueController::class, 'show'])->name('venues.show')->middleware('userAkses:admin');
	Route::get('venues/show-layout/{id}', [VenueController::class, 'showLayout'])->name('showLayout')->middleware('userAkses:admin');
	Route::get('venues/create', [VenueController::class, 'create'])->name('venues.create')->middleware('userAkses:admin');
	Route::post('venues/store', [VenueController::class, 'store'])->name('venues.store')->middleware('userAkses:admin');
	Route::get('venues/edit/{id}', [VenueController::class, 'edit'])->name('venues.edit')->middleware('userAkses:admin');
	Route::put('venues/{id}', [VenueController::class, 'update'])->name('venues.update')->middleware('userAkses:admin');
	Route::delete('/venues/destroy/{id}', [VenueController::class, 'destroy'])->name('venues.destroy')->middleware('userAkses:admin');

	Route::get('billings', [PaymentMethodController::class, 'index'])->name('billings')->middleware('userAkses:admin');
	Route::get('billings/create', [PaymentMethodController::class, 'create'])->name('billings.create')->middleware('userAkses:admin');
	Route::post('billings/store', [PaymentMethodController::class, 'store'])->name('billings.store')->middleware('userAkses:admin');
	Route::get('billings/edit/{id}', [PaymentMethodController::class, 'edit'])->name('billings.edit')->middleware('userAkses:admin');
	Route::put('billings/update/{id}', [PaymentMethodController::class, 'update'])->name('billings.update')->middleware('userAkses:admin');
	Route::delete('billings/destroy/{id}', [PaymentMethodController::class, 'destroy'])->name('billings.destroy')->middleware('userAkses:admin');

	Route::post('transactions/{transaction}/confirm', [TransactionController::class, 'confirm'])->name('transactions.confirm')->middleware('userAkses:admin');
	Route::post('transactions/{transaction}/reject', [TransactionController::class, 'reject'])->name('transactions.reject')->middleware('userAkses:admin');

	Route::resource('tickets', TicketController::class);
	Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index')->middleware('userAkses:admin');
	Route::get('tickets/show/{id}', [TicketController::class, 'show'])->name('tickets.show')->middleware('userAkses:admin');
	Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create')->middleware('userAkses:admin');
	Route::post('tickets/store', [TicketController::class, 'store'])->name('tickets.store')->middleware('userAkses:admin');
	Route::get('tickets/edit/{id}', [TicketController::class, 'edit'])->name('tickets.edit')->middleware('userAkses:admin');
	Route::put('tickets/{id}', [TicketController::class, 'update'])->name('tickets.update')->middleware('userAkses:admin');
	Route::delete('/tickets/destroy/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy')->middleware('userAkses:admin');

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
	Route::post('/register', [RegisterController::class, 'store'])->name('register');
	Route::get('/login', [SessionsController::class, 'create'])->name('login');
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/sign-up', function () {
	return view('session/register');
})->name('sign-up');

Route::group(['middleware' => 'guest'], function () {
	// Routes untuk signup
	Route::get('signup-user', [SessionUserController::class, 'showSignupForm'])->name('signup-user');
	Route::post('users', [SessionUserController::class, 'register']);	
});


Route::group(['middleware' => 'auth'], function () {	
	Route::get('index-user', [IndexUserController::class, 'index'])->name('index-user')->middleware('userAkses:user');
	Route::post('logout-user', [SessionUserController::class, 'logout'])->name('logout-user')->middleware('userAkses:user');
	Route::get('events-user/{id}', [IndexUserController::class, 'show'])->name('events-user.show')->middleware('userAkses:user');
	Route::get('/buy-ticket/{event_id}', [BuyTicketController::class, 'showBuyTicketForm'])->name('show-buy-ticket')->middleware('userAkses:user');
	Route::post('/buy-ticket/{event_id}', [BuyTicketController::class, 'storeBuyTicketForm'])->name('store-buy-ticket')->middleware('userAkses:user');
});
	
