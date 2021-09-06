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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);

//Testing routes not using in production
Route::get('/path',function (){
    dump('in path fun');
    try {
        $path = public_path().'/upload/settings/';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true); //creates directory
            dd('in if');
        }else{
            dump('in else');
            dd('Path exists',$path);
        }
    }catch (\Exception $exception){
     dd($exception->getMessage());
    }
});

Route::get('/check-config',function (){
   dd(config()->all());
});

