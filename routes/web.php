<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

// Auth
Route::middleware('guest')
    ->group(function (Router $router) {
        $router->get('/', 'HomeController@home')->name('home');
        $router->post('/sign-in', 'AuthController@signIn')->name('guest.sign_in');
        $router->post('/sign-up', 'AuthController@signUp')->name('guest.sign_up');
    });

Route::middleware('auth')
    ->group(function (Router $router) {
        $router->get('/logout', 'AuthController@logout')->name('user.logout');
    });

// Tenant Routes
Route::name('tenant.')
    ->middleware(['auth', 'tenant'])
    ->namespace('Tenant')
    ->group(function (Router $router) {
        $router->resource('movies', 'MoviesController');
    });
