<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Front\Home;
use App\Http\Controllers\Front\Law\LawController;
use App\Http\Controllers\Front\Menu\MenuController;
use App\Http\Controllers\Front\we\We;
use App\Http\Controllers\Front\ajax\Ajax;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\Admin\Posts;
use App\Http\Controllers\chat\Chat;

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

Route::get("", [Home::class, "home"]);

Route::get("search/law", [LawController::class, "search"]);

Route::get("login", [Home::class, "login"])->name("login");
Route::post("login", [Home::class, "login_accept"]);

Route::get("register", [Home::class, "register"])->name("register");
Route::post("register", [Home::class, "register_user"]);
Route::get("check_email/{email}", [Home::class, "user_check"]);

Route::post("logout", [Home::class, "logout"])->name("logout");


Route::group(['prefix' => 'menu'], function(){

    Route::get("{id}", [MenuController::class, "menu_show"])->middleware("auth");
    Route::get("fork/{id}", [MenuController::class, "fork"]);
});

Route::get("partition/{id}", [MenuController::class, "partition_show"]);

Route::group(['prefix' => 'law'], function(){

    Route::get("", [LawController::class, "index"]);
    Route::get("{id}", [LawController::class, "show"]);
});


Route::get("post/{id}", [Posts::class, "post_show"]);

Route::group(['middleware' => 'auth', 'prefix' => 'chat'], function(){

    Route::get("", [Chat::class, "index"]);
    Route::get("{room}", [Chat::class, "get_room_info"]);
    Route::post("send_message/{room}", [Chat::class, "send_message"])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    Route::post("get_new_messages/{room}", [Chat::class, "get_new_messages"])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

});


//test
Route::get("test", [Home::class, "test"]);

Route::get("paypal", [PaypalController::class, "index"]);

Route::get("paypal_return", [PaypalController::class, "paypalReturn"])->name("paypal_return");

Route::get("paypal_cancel", [PaypalController::class, "paypalCancel"])->name("paypal_cancel");


//we

Route::get("report/add", [We::class, "make_report"]);
Route::get("report/save", [We::class, "make_report"]);
Route::get("privacy", [We::class, "privacy"]);


//ajax

//consulta ajax
Route::get("get_option_of_consulta/option/{option}", [Ajax::class, "consulta_option"]);
Route::post("add_consulta", [Ajax::class, "add_consulta"]);



//google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);


// Facebook Login URL
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});