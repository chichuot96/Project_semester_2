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
Route::get('/searchUser','AccountsController@search')->name('search');
Route::resource('accounts', 'AccountsController');
Route::get('delete/{id}','AccountsController@destroy')->name('delete');
Route::get('active/{id}','AccountsController@active')->name('active');

Auth::routes();

Route::resource('tour', 'TourController');
Route::post('ckeditor/image_upload',
    'CKEditorController@upload')->name('upload');
//Route::group(['middleware' => 'auth'], function() {
//    Route::resource('tour', 'TourController');
//    Route::post('ckeditor/image_upload',
//        'CKEditorController@upload')->name('upload');
//});


Route::get('/home',function (){
    if(Auth::check()){
        return redirect('index');
    }else{
        return view('index');
    }
});
Route::get('/admin', 'AccountsController@index')->name('admin');
Route::get('/getCurrentUser', function() {
    return Auth::user()->load('roles');
});


Route::get('/thong-tin-ca-nhan', 'ThongTinCaNhanController@thongtincanhan');


Route::get('/index', 'HomeController@index')->name('index');
Route::get('/tour',function (){
    return view('tour');
})->name('tour');
Route::get('/hotel',function (){
    return view('hotel');
})->name('hotel');
Route::get('/blog',function (){
    return view('blog');
})->name('blog');
Route::get('/contact',function (){
    return view('contact');
})->name('contact');
Route::get('/about',function (){
    return view('about');
})->name('about');
Route::get('/service',function (){
    return view('service');
})->name('service');
Route::get('mail/send', 'MailController@send');
Route::match(['get', 'post'], '/logout', 'Auth\LoginController@logout')->name('logout');


