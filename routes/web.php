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

Auth::routes();

Route::get('/', function () {
    return view('public_index');
});

Route::get('/dump_user', function () {
	dd(Illuminate\Support\Facades\Auth::user());
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
	
	Route::get('/', function () {
		
		/*
		$user = App\User::find(1);
		$permissions = $user->permissions;
		dd($permissions);
		*/
		return view('admin/index');
	});
	
});
