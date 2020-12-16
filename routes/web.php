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

Route::view('/', 'welcome')->name('welcome');

use Laravel\Fortify\Features as Fortify;

Route::middleware('auth', 'verified')->group(function () {
    Route::view('home', 'home')->name('home');
    Route::prefix('user')->group(function () {
        if((Fortify::enabled(Fortify::updateProfileInformation()))) {
            Route::view('profile', 'auth.informations')->name('profile.edit');
        }
        if((Fortify::enabled(Fortify::updatePasswords()))) {
            Route::view('password', 'auth.passwords.edit')->name('password.edit');
        }        
        Route::middleware('password.confirm')->group(function () {
            if(Fortify::canManageTwoFactorAuthentication()) {
                Route::view('twofactors', 'auth.twofactors')->name('twofactors');
            }
            if(config('app.settings.deletaccount')) { 
                Route::view('deleteaccount', 'auth.delete')->name('deleteAccount.view');
                Route::put('deleteaccount', App\Http\Controllers\DeleteAccount::class)->name('deleteAccount.delete');
            }
        });
    });
});
