<?php

use App\Category;
use App\Destination;
use Illuminate\Support\Facades\Auth;
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
    return redirect('index');
});

Route::resource('accounts', 'AccountsController');


Auth::routes();

//Route::resource('admin_tour', 'TourController')->middleware('ad');

Route::post('searchDes','DestinationController@search')->name('searchDes');
Route::post('searchTour','TourController@search')->name('searchTour');
Route::resource('category', 'CategoryController');
Route::post('ckeditor/image_upload',
    'CKEditorController@upload')->name('upload');
Route::get('/home',function (){
        return redirect('index');
    }
);
//Route::get('/admin', 'AccountsController@index')->name('admin')->middleware('ad');



Route::get('/index', 'HomeController@index')->name('index');
Route::resource('/tour', 'FrontTourController');
Route::get('/des','HomeController@listDestination')->name('des');
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



Route::get('/addT',function(){
    $lsDes = Destination::all();
    $lsCat = Category::all();
    return view('admin/tour/add') -> with(['lsDes' => $lsDes, 'lsCat' => $lsCat]);
});
Route::post('/addT','Tourcontroller@save')->name('addT');



Route::group(['middleware'=>'auth'],function (){
    Route::get('/info/{id}', 'HomeController@userInfo')->name('info');
    Route::post('/booktour/accept','BooktourController@booked');
    Route::get('/booktour/{id}','BookTourController@showData')->name('booktour');
    Route::post('/payment/{id}/{time}','BookTourController@create');
    Route::get('/return-vnpay/{id}/{time}','BookTourController@return');
});
Route::group(['middleware'=>'ad'],function(){
    Route::resource('destination', 'DestinationController');
    Route::post('/update-des/{id}','DestinationController@update')->name('destination.update');
    Route::get('/destination_detail/{id}','HomeController@detailDes')->name('destination_detail');
    Route::resource('admin_tour', 'TourController');
    Route::get('/admin', 'AccountsController@index')->name('admin');
    Route::get('delete/{id}','AccountsController@destroy')->name('delete');
    Route::get('active/{id}','AccountsController@active')->name('active');
    Route::get('/searchUser','AccountsController@search')->name('search');
});

