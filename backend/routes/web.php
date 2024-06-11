<?php

use App\Models\User;
use App\Livewire\Auth\Login;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\User\ManageUser;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;


Route::get('/', [HomeController::class, 'home']);
Route::get('/login', Login::class)->name('login');

Route::group(['middleware'=> ['auth']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/users', ManageUser::class)->name('user.manage');

    Route::get('/logout', [HomeController::class, 'doLogout'])->name('logout');
    Route::post('/logout', [HomeController::class, 'doLogout'])->name('logout');

    Route::get('/profile', ManageUser::class)->name('profile');
    Route::get('/categories', ManageUser::class)->name('manage.category');
});



// Route::get('registration', [AuthController::class, 'registrationView'])->name('auth.registration_view');
// Route::post('registration', [AuthController::class, 'registration'])->name('auth.registration');
// Route::get('login', [AuthController::class, 'loginView'])->name('auth.login_view');
// Route::post('login', [AuthController::class, 'login'])->name('auth.login');
// Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

// // Login with Google
// Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
// Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('auth.google_callback');

// // Route::get('/', [AuthController::class, 'home'])->name('auth.home');
// Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');



// Route::get('/users', ManageUser::class);
// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);




