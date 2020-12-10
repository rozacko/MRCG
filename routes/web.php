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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'MRCG_HomeController@index');

Route::get('/home', 'M_barangController@index');
//master portofolio
Route::get('/portofolio', 'PortofolioController@index');
Route::get('/portofolio/create', 'PortofolioController@create');
Route::get('/portofolio/{portofolio}', 'PortofolioController@show');
Route::post('/portofolio', 'PortofolioController@store');
Route::delete('/portofolio/{portofolio}', 'PortofolioController@destroy');
Route::get('/portofolio/{portofolio}/edit', 'PortofolioController@edit');
Route::patch('/portofolio/{portofolio}', 'PortofolioController@update');
Route::get('/portofolio/search', 'PortofolioController@search');
// Route::resource('portofolio','MbarangController');

//master gallery
Route::get('/gallery', 'GalleryController@index');
Route::get('/gallery/create', 'GalleryController@create');
Route::get('/gallery/{gallery}', 'GalleryController@show');
Route::post('/gallery', 'GalleryController@store');
Route::delete('/gallery/{gallery}', 'GalleryController@destroy');
Route::get('/gallery/{gallery}/edit', 'GalleryController@edit');
Route::patch('/gallery/{gallery}', 'GalleryController@update');
// Route::resource('gallery','GalleryController');

//master barang
Route::get('/m_barang', 'M_barangController@index');
Route::get('/m_barang/create', 'M_barangController@create');
Route::get('/m_barang/{m_barang}', 'M_barangController@show');
Route::post('/m_barang', 'M_barangController@store');
Route::delete('/m_barang/{m_barang}', 'M_barangController@destroy');
Route::get('/m_barang/{m_barang}/edit', 'M_barangController@edit');
Route::patch('/m_barang/{m_barang}', 'M_barangController@update');
// Route::get('/m_barang/search', 'M_barangController@search');
// Route::resource('m_barang','M_barangController');

//master harga
Route::get('/m_harga', 'M_hargaController@index');
Route::get('/m_harga/create', 'M_hargaController@create');
Route::get('/m_harga/{m_harga}', 'M_hargaController@show');
Route::post('/m_harga', 'M_hargaController@store');
Route::delete('/m_harga/{m_harga}', 'M_hargaController@destroy');
Route::get('/m_harga/{m_harga}/edit', 'M_hargaController@edit');
Route::patch('/m_harga/{m_harga}', 'M_hargaController@update');
// Route::resource('m_harga','M_hargaController');

//process
Route::get('/process', 'ProcessController@index');
Route::get('/cart/{id}/{value}', 'ProcessController@cart');
Route::get('/pick_up/{value}', 'ProcessController@pick_up');
Route::get('/check_out', 'ProcessController@check_out');


//profile
Route::get('/set_profile', 'ProfileController@index');
Route::get('/set_profile/create', 'ProfileController@create');
Route::post('/set_profile', 'ProfileController@store');
Route::get('/set_profile/{profile}/edit', 'ProfileController@edit');
Route::patch('/set_profile/{profile}', 'ProfileController@update');
Route::get('/address/{address}/edit', 'ProfileController@edit_address');
Route::patch('/address/{address}', 'ProfileController@update_address');

Route::get('/view_cart', 'ProfileController@view_cart');
Route::get('/view_verivy', 'ProfileController@view_verivy');
Route::get('/view_deliv', 'ProfileController@view_deliv');
Route::get('/view_done', 'ProfileController@view_done');