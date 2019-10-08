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

// Route::get('/', function () {
//     return view('reg/index');
// });
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/signup', 'RegistersController@create');
Route::post('/userRgis', 'RegistersController@insert');
Route::post('/userRgis', 'RegistersController@store');
Route::get('/userProf/{id}', 'RegistersController@Profiledit');
Route::post('/userProf', 'RegistersController@Profileupdate');
Route::post('/userProf', 'RegistersController@validateProfile');

Route::get('/signin', 'LoginsController@signin');
Route::post('/userLogin', 'LoginsController@view');
//Route::post('/userLogin', 'LoginsController@validateLogin');

Route::get('userForgs', 'ForgotsController@createProfile');
//Route::post('reg/userForgs', 'ForgotsController@store');

Route::get('/logout', 'LoginsController@logout');
Route::get('/reg/dashboard', 'VideosController@dashboard');

Route::get('/userVideos', 'VideosController@create');
Route::post('/userVideos', 'VideosController@insert');
//Route::post('/userVideos', 'VideosController@validation');

Route::get('/reg/video_list', 'VideosController@videolist');
Route::get('/userVideos/{id}', 'VideosController@edit');
Route::get('/', 'IndexsController@videoInsert');
//Route::get('storage/{filename}', 'IndexsController@displayVideos')->name('storage.displayVideos');


Route::get('storage/{filename}', function ($filename)
{
   $path = storage_path('uploaded_videos/' . $filename);
   if (!File::exists($path)) {
       abort(404);
   }
   $file = File::get($path);
   $type = File::mimeType($path);
   $response = Response::make($file, 200);
   $response->header("Content-Type", $type);
   return $response;
});

//Route::get('/userForgs', 'PaypalController@createProfile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
