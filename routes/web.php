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


Route::get('/', 'IndexController@show');

Route::get('/product', function () {
    return view('product');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::post('contact', 'ContactController@add');

Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');


Auth::routes();



Route::group(['middleware' => ['auth']], function () {

	// Filters
    Route::post('data/listorder', ['as'=> 'data.listorder','uses'=>'ListOrderController@getDataWithFilters']);
	Route::post('data/paket', ['as'=> 'data.paket','uses'=>'PacketController@getDataWithFilters']);
    Route::post('data/subpaket', ['as'=> 'data.subpaket','uses'=>'SubPacketController@getDataWithFilters']);
    Route::post('data/bandwidth', ['as'=> 'data.bandwidth','uses'=>'BandwidthController@getDataWithFilters']);
    Route::post('data/operatingsystem', ['as'=> 'data.operatingsystem','uses'=>'OperatingSystemController@getDataWithFilters']);
    Route::post('listorder', 'ListOrderController@add');
    
    Route::get('/pdf/output', 'ListOrderController@generate_pdf'
    	// function() {
	    // $html = view('pdfs.example')->render();

	    // return PDF::load($html)
	    // // ->download();
	    //     ->filename('/pdf/example1.pdf')
	    //     ->output();

	    // return 'PDF saved';
	// }
	);

	Route::get('/pdf/display', 
    	function() {
		    return view('pdfs.example');
		}
	);

	Route::group(['middleware' => ['newuser']], function () {
		Route::get('/thanks', function () {
		    return view('thanks');
		});
	});

	Route::group(['middleware' => ['user']], function () {
		Route::get('order', 'ListOrderController@create');
		Route::get('/user-home', 'HomeController@userIndex');
		Route::get('/user-service', 'ListOrderController@userServiceIndex');
		
		Route::get('/user-order', 'ListOrderController@userOrderIndex');
		Route::get('/user-order-cart/{id}', 'ListOrderController@userOrder2');
		Route::post('/user-order-review', 'ListOrderController@userOrder3');
		Route::post('/user-order-end', 'ListOrderController@add');

		Route::get('/user-invoice', 'InvoiceController@userIndex');
		Route::get('/user-profile', 'UserController@userIndex');
		Route::patch('/user-profile-update/{param}', 'UserController@update');
		
	});

	Route::group(['middleware' => ['master']], function () {

		Route::get('/home', 'HomeController@index')->name('home');
		
		Route::get('listorder', 'ListOrderController@index');
		Route::get('listorder-create', 'ListOrderController@create');
		Route::get('listorder/edit/{id}', 'ListOrderController@edit');
	    Route::patch('listorder/{id}', 'ListOrderController@update');
	    Route::get('listorder/delete/{id}', 'ListOrderController@destroy');

		Route::get('paket', 'PacketController@index');
		Route::get('paket-create', 'PacketController@create');
		Route::post('paket-add', 'PacketController@add');
	    Route::get('paket/edit/{id}', 'PacketController@edit');
	    Route::patch('paket-add/{id}', 'PacketController@update');
	    Route::get('paket/delete/{id}', 'PacketController@destroy');
	    
	    
		Route::get('subpaket', 'SubPacketController@index');
		Route::get('sub-paket-create', 'SubPacketController@create');
		Route::post('subpaket', 'SubPacketController@add');
		Route::get('subpaket/edit/{id}', 'SubPacketController@edit');
	    Route::patch('subpaket/{id}', 'SubPacketController@update');
	    Route::get('subpaket/delete/{id}', 'SubPacketController@destroy');

	    Route::get('bandwidth', 'BandwidthController@index');
		Route::get('bandwidth-create', 'BandwidthController@create');
		Route::post('bandwidth', 'BandwidthController@add');
		Route::get('bandwidth/edit/{id}', 'BandwidthController@edit');
	    Route::patch('bandwidth/{id}', 'BandwidthController@update');
	    Route::get('bandwidth/delete/{id}', 'BandwidthController@destroy');

	    Route::get('operatingsystem', 'OperatingSystemController@index');
		Route::get('operatingsystem-create', 'OperatingSystemController@create');
		Route::post('operatingsystem', 'OperatingSystemController@add');
		Route::get('operatingsystem/edit/{id}', 'OperatingSystemController@edit');
	    Route::patch('operatingsystem/{id}', 'OperatingSystemController@update');
	    Route::get('operatingsystem/delete/{id}', 'OperatingSystemController@destroy');

	    Route::get('contacts', 'ContactController@index');
	    Route::get('contacts/delete/{id}', 'ContactController@destroy');

	    Route::get('slider', 'SliderController@index');
		Route::get('slider-create', 'SliderController@create');
		Route::post('slider', 'SliderController@add');
		Route::get('slider/edit/{id}', 'SliderController@edit');
	    Route::patch('slider/{id}', 'SliderController@update');
	    Route::get('slider/delete/{id}', 'SliderController@destroy');

		Route::get('user', 'UserController@index');
		Route::get('user-create', 'UserController@create');
		Route::post('user-add', 'UserController@add');
	    Route::get('user/edit/{id}', 'UserController@edit');
	    Route::patch('user-add1/{id}', 'UserController@update');
	    Route::get('user/delete/{id}', 'UserController@destroy');
	    Route::get('user/approve/{id}', 'UserController@approve');
	    Route::get('user/reject/{id}', 'UserController@reject');

		Route::get('invoice', 'InvoiceController@index');


		// Datatables
		Route::post('datatable/listorder', ['as'=> 'datatable.listorder','uses'=>'ListOrderController@masterDataTable']);
		Route::post('datatable/listpacket', ['as'=> 'datatable.listpacket','uses'=>'PacketController@masterDataTable']);
		Route::post('datatable/listsubpacket', ['as'=> 'datatable.listsubpacket','uses'=>'SubPacketController@masterDataTable']);
		Route::post('datatable/invoice', ['as'=> 'datatable.invoice','uses'=>'InvoiceController@masterDataTable']);
		Route::post('datatable/bandwidth', ['as'=> 'datatable.bandwidth','uses'=>'BandwidthController@masterDataTable']);
		Route::post('datatable/operatingsystem', ['as'=> 'datatable.operatingsystem','uses'=>'OperatingSystemController@masterDataTable']);
		Route::post('datatable/slider', ['as'=> 'datatable.slider','uses'=>'SliderController@masterDataTable']);
		Route::post('datatable/contact', ['as'=> 'datatable.contact','uses'=>'ContactController@masterDataTable']);
		Route::post('datatable/listuser', ['as'=> 'datatable.listuser','uses'=>'UserController@masterDataTable']);
	});
});