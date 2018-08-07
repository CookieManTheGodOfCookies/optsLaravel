<?php

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
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

// that logs user in
Route::post('/login', 'LoginController@login');

// this redirects to registration page
Route::get('/register', function () {
    return view('register');
});

// this registers users
Route::post('/register', 'RegisterController@register');

Route::get('/students', 'StudentsController@index');


Route::get('/add-company', 'CompaniesController@addForm');

Route::get('/companies', 'CompaniesController@index');
Route::post('/companies', 'CompaniesController@store');
// Route::delete('/companies', 'CompaniesController@delete'); эта штука пока не работает
Route::get('/companies/{company}', 'CompaniesController@show');
Route::post('/companies/{company}', 'CompaniesController@update');
Route::get('/companies/{company}/edit', 'CompaniesController@editForm');


//TODO : здесь демонстрируется самая запутанная и трудная для понимания логика RESTful. Наслаждайтесь.

Route::post('/contracts', 'ContractController@store');
Route::get('/contracts/{contract}/edit', 'ContractController@editForm');
Route::post('/contracts/{contract}', 'ContractController@update');
Route::get('/contracts/{contract}', 'ContractController@show');
Route::get('/add-contract/{company}', 'ContractController@addForm');

Route::get('/add-annex/{contract}', 'AnnexController@addForm');
Route::post('/annexes', 'AnnexController@store');