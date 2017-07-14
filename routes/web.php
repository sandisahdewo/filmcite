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

Route::get('/quote/latest', 'QuoteController@latest')->name('quote.latest');

Route::get('/', 'FilmController@index')->name('film.index');
Route::get('/search', 'FilmController@search')->name('film.search');
Route::get('/random', 'FilmController@random')->name('film.random');
Route::get('/latest', 'FilmController@latest')->name('film.latest');
Route::get('/total', 'FilmController@total')->name('film.total');
Route::get('/film/{id}', 'FilmController@show')->name('film.show');
Route::get('/{slug}', 'FilmController@view')->name('film.search');
