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

Route::get('/', 'HomeController@home');

Route::get('/admin/login','LoginController@adminLogin')->name("admin-login");

Route::get('/admin/logout','LoginController@adminLogout')->name("admin-logout");

Route::post('/admin/login/set','LoginController@adminSetLogin')->name("admin-set-login");

Route::get('/admin/dashboard','AdminController@Dashboard')->name("admin-dash");

Route::get('/admin/encryptpass/{pass}','OfficeController@encryptPass');

Route::middleware(['AdminAuth','PreventBack'])->group(function () {
	Route::get('/admin/user/{status?}','AdminController@userView')->name("user-view")->where('status', 'nonactive');

	Route::get('/admin/user/add','AdminController@userAdd')->name("user-add");

	Route::post('/admin/user/save','AdminController@userSave')->name("user-save");

	Route::get('/admin/user/edit/{id}','AdminController@userEdit')->name("user-edit");

	Route::post('/admin/user/update','AdminController@userUpdate')->name("user-update");

	Route::get('/admin/user/status','AdminController@userChangeStat')->name("user-change-stat");

	Route::get('/admin/user/viewajax/{id?}','AdminController@userViewAjax')->name('user-view-ajax');

	Route::get('/admin/reservation/','AdminController@reservasiView')->name("reservasi-view");

	Route::get('/admin/reservation/accept/{id}','AdminController@reservasiTerima')->name("reservasi-terima");
});

Route::middleware(['TransOffAuth','PreventBack'])->group(function () {
	Route::get('/admin/transport/{type}/{status?}','OfficeController@transportView')->name("transport-view")->where(['type' => 'airplane||train','status' => 'nonactive']);

	Route::get('/admin/{type}/add','OfficeController@transportAdd')->name("transport-add")->where('type','airplane||train');

	Route::post('/admin/{type}/save','OfficeController@transportSave')->name("transport-save")->where('type','airplane||train');

	Route::get('/admin/{type}/edit/{id}','OfficeController@transportEdit')->name("transport-edit")->where('type','airplane||train');

	Route::post('/admin/{type}/update','OfficeController@transportUpdate')->name("transport-update")->where('type','airplane||train');

	Route::get('/admin/{type}/status','OfficeController@transportChangeStat')->name("transport-change-stat")->where('type','airplane||train');

	Route::get('/admin/master/class/{status?}','OfficeController@classView')->name("class-view")->where(['status' => 'nonactive']);

	Route::post('/admin/master/class/save','OfficeController@classSave')->name("class-save");

	Route::get('/admin/master/class/edit/{id?}','OfficeController@classEdit')->name("class-edit");

	Route::post('/admin/master/class/update','OfficeController@classUpdate')->name("class-update");

	Route::get('/admin/master/class/status','OfficeController@classChangeStat')->name("class-change-stat");
});

Route::middleware(['SchedOffAuth','PreventBack'])->group(function () {

	Route::get('/admin/schedule/{type}','OfficeController@scheduleView')->name("schedule-view")->where(['type' => 'airplane||train']);

	Route::get('/admin/schedule/{type}/calendar','OfficeController@scheduleCalendar')->name("schedule-calendar")->where(['type' => 'airplane||train']);

	Route::get('/admin/schedule/{type}/detail/{id?}','OfficeController@scheduleDetail')->name("schedule-detail")->where('type','airplane||train');
	
	Route::get('/admin/schedule/{type}/add','OfficeController@scheduleAdd')->name("schedule-add")->where('type','airplane||train');

	Route::post('/admin/schedule/{type}/save','OfficeController@scheduleSave')->name("schedule-save")->where('type','airplane||train');

	Route::get('/admin/schedule/{type}/edit/{id}','OfficeController@scheduleEdit')->name("schedule-edit")->where('type','airplane||train');
	

	Route::post('/admin/schedule/{type}/update','OfficeController@scheduleUpdate')->name("schedule-update")->where('type','airplane||train');

	Route::get('/admin/schedule/{type}/delete/{id}','OfficeController@scheduleDelete')->name("schedule-delete")->where('type','airplane||train');

	Route::get('/admin/master/region/','OfficeController@regionView')->name("region-view");

	Route::post('/admin/master/region/save','OfficeController@regionSave')->name("region-save");

	Route::get('/admin/master/region/edit/{id?}','OfficeController@regionEdit')->name("region-edit");

	Route::post('/admin/master/region/update','OfficeController@regionUpdate')->name("region-update");

	Route::get('/admin/route/','OfficeController@routeView')->name("route-view");

	Route::post('/admin/route/save','OfficeController@routeSave')->name("route-save");

	Route::get('/admin/route/edit/{id?}','OfficeController@routeEdit')->name("route-edit");

	Route::post('/admin/route/update','OfficeController@routeUpdate')->name("route-update");

});

Route::get('/register','CustomerController@customerRegister')->name("customer-register");
Route::get('/login','CustomerController@customerLogin')->name("customer-login");
Route::post('/register/save','CustomerController@customerRegisterSave')->name("customer-register-save");
Route::post('/login/set','LoginController@customerSetLogin')->name("customer-set-login");

Route::get('/reservasi/{id}','CustomerController@customerReservasi')->name("customer-reservasi");

Route::post('/reservasi/save','CustomerController@customerReservasiSave')->name("customer-reservasi-save");
