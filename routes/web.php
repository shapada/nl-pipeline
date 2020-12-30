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

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;


// Route::group(['middleware' => 'web'], function () {
//     Route::get(env('NL_PIPELINE_PATH'), 'LaravueController@index')->where('any', '.*')->name('laravue');
// });

Auth::routes(['register'=>false]);

Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', 'App\Http\Controllers\Admin\HomeController@index' )->name('home');

    // Permissions
    Route::delete('permissions/destroy', [ PermissionsController::class, 'massDestroy' ])->name('permissions.massDestroy');
    Route::resource('permissions', 'App\Http\Controllers\Admin\PermissionsController' );

    // Roles
    Route::delete('roles/destroy',[ RolesController::class ], 'massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'App\Http\Controllers\Admin\RolesController');

    // Users
    Route::delete('users/destroy', [ UsersController::class, 'massDestroy' ])->name('users.massDestroy');
    Route::resource('users', 'App\Http\Controllers\Admin\UsersController');

    // Loans
    Route::delete('loans/destroy', [ LoanController::class, 'massDestroy' ])->name('loans.massDestroy');
    Route::resource('loans', 'App\Http\Controllers\Admin\LoanController' );

    // Products
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', 'ChangePasswordController@update')->name('password.update');
            Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
            Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        }
    });