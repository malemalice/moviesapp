<?php

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/movies', 'PublicMoviesController@index');
Route::get('/movies/data', 'PublicMoviesController@data');
Route::post('/movies/store', 'PublicMoviesController@store');

Route::get('/lending', 'PublicLendingController@index');
Route::get('/lending/data', 'PublicLendingController@data');
Route::post('/lending/store', 'PublicLendingController@store');

// Route::group(['prefix' => 'movies', 'namespace' => 'Movies', 'as' => 'movies::'], function () {
//     Route::get('/', 'PublicMoviesController@index');
//     Route::get('/data', 'PublicMoviesController@data');
// });
/**
 * Register the typical authentication routes for an application.
 * Replacing: Auth::routes();
 */
Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('adminlte.registration_open')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    if (config('adminlte.impersonate')) {
        /**
         * Impersonate User. Requires authentication.
         */
        Route::post('impersonate/{id}', 'ImpersonateController@impersonate')->name('impersonate');
        /**
         * Stop Impersonate. Requires authentication.
         */
        Route::get('impersonate/stop', 'ImpersonateController@stopImpersonate')->name('impersonate.stop');
    }
});

// Redirect to /dashboard
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Requires authentication.
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     * Dashboard. Common access.
     * // Matches The "/dashboard/*" URLs
     */
    Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard::'], function () {
        /**
         * Dashboard Index
         * // Route named "dashboard::index"
         */
        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        /**
         * Profile
         * // Route named "dashboard::profile"
         */
        Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@showProfile']);
        Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@updateProfile']);
    });

    /**
     * // Matches The "/admin/*" URLs
     */
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
        /**
         * Admin Access
         */
        Route::group(['middleware' => 'admin'], function () {
            /**
             * Admin Index
             * // Route named "admin::index"
             */
            Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

            /**
             * Manage Users.
             * // Routes name "admin.users.*"
             */
            Route::resource('users', 'UsersController');

            /**
             * Manage Movies.
             * // Routes name "admin.movies.*"
             */
            Route::resource('movies', 'MoviesController');

            /**
             * Manage Genre.
             * // Routes name "admin.genre.*"
             */
            Route::resource('genre', 'GenreController');

            /**
             * Manage Lending.
             * // Routes name "admin.lending.*"
             */
            Route::resource('lending', 'LendingController');
        });
    });

});
