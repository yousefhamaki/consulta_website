<?php
use App\Http\Controllers\team\teams;



Route::get('login', [teams::class, 'login']);
Route::post('login', [teams::class, 'logincheck'])->name('team.login');

Route::group(['middleware' => 'auth:team'], function ()
{
    Route::get('dashboard', [teams::class, 'dashboard']);
    Route::group(['middleware' => 'adminuse'], function ()
    {
        Route::post('posts', [teams::class, 'dashboard']);
        Route::post('law', [teams::class, 'dashboard']);
        Route::post('consult', [teams::class, 'dashboard']);
    });
    Route::get('profile/{id}', [teams::class, 'profile']);
});
