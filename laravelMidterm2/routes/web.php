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
Route::get('index',[
	'as'=>'trang_chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loaisanpham/{type}',[
	'as'=>'loai_sanpham',
	'uses'=>'PageController@getLoaisanpham'
]);
Route::get('chitiet_sanpham/{id}',[
	'as'=>'chitiet_sanpham',
	'uses'=>'PageController@getChitietsanpham'
]);
Route::get('lienhe',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);
Route::get('gioithieu',[
	'as'=>'about',
	'uses'=>'PageController@getAbout'
]);
Route::get('addtocart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('removefromcart/{id}',[
	'as'=>'removefromcart',
	'uses'=>'PageController@getRemovefromCart'
]);
Route::get('dathang',[				
	'as' =>'dathang',			
	'uses'=>'PageController@getCheckout'			
	]);			
Route::post('dathang',[				
	'as'=>'dathang',			
	'uses'=>'PageController@postCheckout'			
	]);			
Route::post('dathang',[				
	'as'=>'dathang',			
	'uses'=>'PageController@getdathang'			
	]);	
