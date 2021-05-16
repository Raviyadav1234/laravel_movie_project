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

use Illuminate\Http\Request;

Route::get('/', function () {
    prx("<h1> Welcome to  Movei Application</h1>");
});


################################################
//Admin Module Start

Route::prefix('/admin')->group(function(){


#---------------Route Start for Admin Login and Logout--------------#
     Route::get('/',function(){
       return view('login');
     });

  Route::get('/changepass',function(){
       return view('adminchangepass');
     });



Route::post('/login','LoginController@login')->name('admin.login');

Route::post('/','LoginController@logout')->name('admin.logout');

Route::get('/dashboard','LoginController@admindashboard')->name('admin.dashboard');

Route::get('/changepass','LoginController@create')->name('admin.changepass');

Route::post('/changepass/create','LoginController@changepass')->name('admin.change.pass');

Route::get('/session','LoginController@checksession');
#---------------Route End for Admin Login and Logout--------------#


#---------------Route Start for role--------------#
Route::get('/role/add','RoleController@create')->name('admin.addrole');

Route::get('/role/show','RoleController@show')->name('admin.role.show');

Route::post('role/save','RoleController@store')->name('admin.saverole');

Route::get('role/edit/{id}','RoleController@edit')->name('admin.role.edit');

Route::post('role/update/{id}','RoleController@update')->name('admin.role.update');

Route::get('/role/delete/{id}','RoleController@destroy')->name('admin.role.delete');

#---------------Route End Start for role--------------#


#---------------Route Start for Partner --------------#
Route::get('/partner/add','PartnerController@create')->name('admin.addpartner');

Route::get('/partner/show','PartnerController@show')->name('admin.partner.show');

Route::post('partner/dashboard','PartnerController@store')->name('admin.savepartner');

Route::get('partner/edit/{id}','PartnerController@edit')->name('admin.partner.edit');

Route::post('partner/update/{id}','PartnerController@update')->name('admin.partner.update');

Route::get('partner/delete/{id}','PartnerController@destroy')->name('admin.partner.delete');

#---------------Route End for Partner --------------#
});







//Admin Module End
################################################



//route for find path of folder
###################################

Route::get('learn/path',function(){
	prx(storage_path(),false);
	prx(app_path(),false);
	prx(config_path(),false);

	prx(app_path('Helpers'),false);
	$laravel_session = storage_path('framework\session');
	prx($laravel_session);
});


//learn session
Route::get('learn/session/add',function(Request $request){
       
       $request->session()->put('name','ravi');
       $name = $request->session()->get('name',NULL);
       echo "The session data is {$name}";
});

Route::get('learn/session/get',function(Request $request){
       
       $name = $request->session()->get('name',NULL);
       echo "The session data is still available {$name}";
});

Route::get('learn/session/new',function(Request $request){
       
       $name = $request->session()->get('name','LKG');
       echo "The session data is still available {$name}";
});

Route::get('learn/session/2',function(Request $request){
       
       $class = $request->session()->put('class','12th');
       $request->session()->put('marks',array(
          'maths'=>90,
          'science'=>100,
          'english'=>85
       ));
});

Route::get('learn/session/all',function(Request $request){
       
      $data = $request->session()->all();
      prx($data);
});


Route::get('learn/session/hasclass',function(Request $request){
       
      prx($request->session()->has('class'));
});


Route::get('learn/session/addroll',function(Request $request){
       
      $request->session()->put('roll',NULL);
});


Route::get('learn/session/getroll',function(Request $request){
       
      prx($request->session()->get('roll'),false);
      prx($request->session()->exists('roll'));
});


Route::get('learn/session/destroy',function(Request $request){
       
      $request->session()->flush();
});


