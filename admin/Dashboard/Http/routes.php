<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Admin\Dashboard\Http\Controllers'], function()
{
    Route::resource('dashboard', DashboardController::class);
});
