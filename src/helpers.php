<?php

use Illuminate\Support\Facades\Route;
use Vortechron\RPManager\Controllers\RPController;

if (! function_exists('rpmanager_routes')) {
    function rpmanager_routes($controller)
    {
        Route::resource('roles', $controller);
        Route::post('roles/{role}/delete', $controller . '@destroy')->name('roles.delete');
    }
}