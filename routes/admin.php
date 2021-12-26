<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Posts;
use App\Http\Controllers\Admin\Ajax\AjaxController;
use App\Http\Controllers\Admin\Contract\Contracts;
use App\Http\Controllers\Admin\Contract\ContractGet;
use App\Http\Controllers\Admin\Contract\ContractPost;
use App\Http\Controllers\Admin\Law\Laws;
use App\Http\Controllers\Admin\Law\Openings;
use App\Http\Controllers\Admin\Orders;
use App\Http\Controllers\Admin\Menu\MenuController;
use App\Http\Controllers\Admin\partitions\Partitions;
use App\Http\Controllers\Admin\Events\Events;
use App\Http\Controllers\Admin\consulta\Consulta;

//team
use App\Http\Controllers\Admin\team\TeamGet;


define('ADMIN_PAGINATE', 15);
define('MANAGE', "$2y$10KzYrXJ5fAbKzgZhPwpVpVbrsi9xxXckqebZCaCCVZH0UgYEYOuTe");


Route::group(['middleware' => 'auth:admin'], function (){
    Route::get('dashboard', [Admin::class, 'index']);

    Route::get('users', [Admin::class, 'users']);

    //menu
    Route::group(['prefix' => 'menu'], function (){

        Route::get('/', [MenuController::class, 'index']);
        Route::get('/fork', [MenuController::class, 'getfork']);
        Route::get('forks/fork', [MenuController::class, 'forks_fork']);
        Route::get('forks/forks/fork', [MenuController::class, 'forks_forks_fork']);

        //add
        Route::group(['prefix' => 'add'], function (){
            Route::get('/', [MenuController::class, 'add']);
            Route::get('/fork', [MenuController::class, 'add_fork']);
            Route::get('forks/fork', [MenuController::class, 'add_forks_fork']);
            Route::get('forks/forks/fork', [MenuController::class, 'add_forks_forks_fork']);
        });

        //add post
        Route::group(['prefix' => 'add'], function (){
            Route::post('{table}', [MenuController::class, 'add_data']);
        });
    });

    //partitions
    Route::group(['prefix' => 'partitions'], function (){
        Route::get('/', [Partitions::class, 'index']);
        Route::get('/connect/{id}', [Partitions::class, 'connect']);
        Route::get('/add', [Partitions::class, 'add']);
        Route::get('/edit/{id}', [Partitions::class, 'edit']);

        Route::post('/add', [Partitions::class, 'add_data']);
        Route::post('/connect', [Partitions::class, 'connect_post']);
        Route::post('/edit/{id}', [Partitions::class, 'edit_data']);
        
    });

    //events
    Route::group(['prefix' => 'event'], function (){
        //remove or verify or stop to any row in the table
        Route::post('{event}/{table}/{id}', [Events::class, 'status']);
    });

    //offers
    Route::group(['prefix' => 'offers'], function (){
        Route::get('/', [AjaxController::class, 'getoffers']);
        Route::get('add', [AjaxController::class, 'create']);
        Route::get('get', 'Offers@getoffers');
        Route::get('edit/{id}', 'Offers@edit');
        Route::get('delete/{id}', 'Offers@remove');
        // Route::get('insert', 'Offers@insert');
    });

    //reports
    Route::get('/reports', [Admin::class, "reports"]);
    Route::get('reports/answer/{id}', [Admin::class, 'reportAnswer']);
    
    //posts
    Route::group(['prefix' => 'posts'], function (){
        Route::get('', [Posts::class, "posts"]);
        Route::get('add', [Posts::class, "createPost"]);
        Route::post('insert', [Posts::class, "insertPost"]);
    });
    
    //law
    Route::group(['prefix' => 'law'], function (){
        Route::get('', [Laws::class, "index"]);
        Route::get('add', [Laws::class, "add"]);
        Route::post('add', [Laws::class, "addLaw"]);
        Route::get('opening/add', [Openings::class, "addForm"]);
        Route::post('opening/add', [Openings::class, "Add"]);

        Route::get('edit/{id}', [Laws::class, "edit"]);
    });
    
    //contracts
    Route::group(['prefix' => 'contracts'], function (){
        Route::group(['prefix' => 'branches'], function (){
            Route::get('', [Contracts::class, "branch"]);
            Route::get('add', [ContractGet::class, "addBranch"]);
            Route::post('add', [ContractPost::class, "addBranch_data"]);
            Route::get('delete/{id}', [ContractPost::class, "deleteBranch"]);
        });
        Route::group(['prefix' => 'sections'], function (){
            Route::get('/', [Contracts::class, "section"]);
            Route::get('add', [ContractGet::class, "addSection"]);
            Route::post('add', [ContractPost::class, "addSection_data"]);
            Route::get('delete//{id}', [ContractPost::class, "deleteSection"]);
        });
        Route::get('', [Contracts::class, "index"]);
        Route::get('add', [ContractGet::class, "addContract"]);
        Route::post('add', [ContractPost::class, "addContract_data"]);   
        Route::get('delete/{id}', [ContractPost::class, "deleteContract"]);         
    });
    
    //orders
    Route::group(['prefix' => 'orders'], function (){
        Route::get('', [Orders::class, "index"]);
        Route::get('chats', [Orders::class, "chat"]);
        Route::get('chat/{id}', [Orders::class, "show_chat"]);
        Route::post('chat/send_message/admin_send/{room}', [Orders::class, "send_messsage"]);

    });
    
    //admins
    Route::group(['prefix' => 'admin'], function (){
        Route::get('', [TeamGet::class, "index"]);
        Route::get('add', [TeamGet::class, "register"]);
        Route::post('add', [TeamGet::class, "registerpost"]);
    });

    //Consulta_options
    Route::group(['prefix' => 'consulta_options'], function (){
        Route::get('add', [Consulta::class, "add_option"]);
        Route::post('add', [Consulta::class, "add_option_post"]);
    });
});

Route::get('login', [Admin::class, 'login']);
Route::post('manage/login', [Admin::class, 'logincheck'])->name('admin.login');
Route::get('profile/{id}', [Admin::class, 'profile']);