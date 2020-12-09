<?php

use App\Http\Controllers\HelloController;
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

// Route::get('hello', function () {
//     return '<html><body><h1>Hello</h1><p>This is sample page.</p></body></html>';
// });

// $html = <<<EOF
// <html>
// <head>
// <title>Hello</title>
// <style>
// body {font-size:16pt; color:#999; }
// h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
// </style>
// </head>
// <body>
//     <h1>Hello</h1>
//     <p>This is sample page.</p>
//     <p>これは、サンプルで作ったページです。</p>
// </body>
// </html>
// EOF;

// Route::get('hello',function () use ($html) {
//     return $html;
// });

// Route::get('hello/{msg?}/{mm?}', function ($msg='no mes', $mm='no mm') {

// $html = <<<EOF
// <html>
// <head>
// <title>Hello</title>
// <style>
// body {font-size:16pt; color:#999; }
// h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
// </style>
// </head>
// <body>
//     <h1>hello</h1>
//     <p>{$msg}</p>
//     <p>これは、サンプルで作ったページです。</p>
//     <p>{$mm}</p>
// </body>
// </html>
// EOF;

//     return $html;
// });

// Route::get('index/{id?}/{pass?}', 'HelloController@index');

// Route::get('index', 'HelloController@index');
// Route::get('index/other', 'HelloController@other');

Route::get('index', 'HelloController@index');
Route::post('index', 'HelloController@post');
Route::get('sample', 'HelloController@sample');
// Route::get('inhe', 'HelloController@inhe');
Route::get('add', 'HelloController@add');
Route::post('add', 'HelloController@create');
Route::get('edit', 'HelloController@edit');
Route::post('edit', 'HelloController@update');
Route::get('del', 'HelloController@del');
Route::post('del', 'HelloController@remove');
// use App\Http\Middleware\HelloMiddleware;
Route::get('inhe', 'HelloController@inhe'); 
Route::get('form', 'HelloController@form');
Route::post('form', 'HelloController@post');
Route::get('cockie', 'HelloController@cockie');
Route::post('cockie', 'HelloController@cpost');
Route::get('show', 'HelloController@show');
Route::get('person', 'PersonController@index');
Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');
// ->middleware('helo');
//  -> middleware(HelloMiddleware::class);

// Route::get('hello', function() {
//     return view('hello.index');
// });
