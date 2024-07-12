<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LandingPagesController;
use App\Http\Controllers\AdminCriteriaController;
use App\Http\Controllers\DashboardRankController;
use App\Http\Controllers\AdminAlternativeController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\AdminTourismObjectController;
use App\Http\Controllers\DashboardCriteriaComparisonController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [LandingPagesController::class, 'index'])->name('home');


 
//verifikasi email user
Auth::routes(['verify' => true]);
Route::get('/password/reset', function () {
  return view('home'); // Ganti 'custom-reset-password' dengan nama view yang diinginkan
})->middleware('guest')->name('password.request');

Route::middleware('guest')->group(function () {
  Route::get('/signin', [AuthController::class, 'index'])->name('login');
  Route::post('/signin', [AuthController::class, 'authenticate'])->name('storeLogin');
  Route::get('/signup', [AuthController::class, 'signUp']);
  Route::post('/signup', [AuthController::class, 'store']);
  
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('signin.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
  Route::get('/signout', [AuthController::class, 'signOut']);

  Route::get('/dashboard', function () {
    return view('dashboard.index', [
      'title' => 'Dashboard'
    ]);
  });

  Route::get('dashboard/profile', [DashboardProfileController::class, 'index']);
  Route::put('dashboard/profile/{user}', [DashboardProfileController::class, 'update']);

  Route::get('dashboard/criteria-comparisons', [DashboardCriteriaComparisonController::class, 'index']);
  Route::post('dashboard/criteria-comparisons', [DashboardCriteriaComparisonController::class, 'store']);

  Route::get('dashboard/criteria-comparisons/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'show']);

  Route::put('dashboard/criteria-comparisons/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'updateValue']);

  Route::delete('dashboard/criteria-comparisons/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'destroy']);

  Route::get('dashboard/criteria-comparisons/result/{criteria_analysis}', [DashboardCriteriaComparisonController::class, 'result']);

  Route::get('dashboard/final-ranking', [DashboardRankController::class, 'index']);
  Route::get('dashboard/final-ranking/{criteria_analysis}', [DashboardRankController::class, 'show']);

  Route::resources([
    'dashboard/tourism-objects' => AdminTourismObjectController::class,
    'dashboard/criterias'       => AdminCriteriaController::class,
    'dashboard/users'           => AdminUserController::class,
    'dashboard/alternatives'    => AdminAlternativeController::class
  ], ['except' => 'show']);
});
Route::get('/admin/alternatives/eigen-vectors', [AdminAlternativeController::class, 'showEigenVectors']);
// Testing
Route::get('/testing', function () {
  return view('layouts.main2');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
