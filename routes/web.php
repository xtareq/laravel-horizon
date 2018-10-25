<?php
use App\Mail\UserRegistered;
use App\Jobs\SomeJob;
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

Route::get('/', function () {
    Mail::to('tareq@gmail.com')->queue(new UserRegistered);
    return view('welcome');
});

Route::get('/jobs/{jobs}',function($jobs){
    $user = App\User::findOrFail(1);
    for($i=0; $i<$jobs; $i++){
        SomeJob::dispatch($user);
    }

    return "done";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
