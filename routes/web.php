<?php
//

Route::get('order','OrderController@ShowAdd');

//Route::get('getdone', array('as' => 'getdone','uses' => 'OrderController@getdone',));
//Route::get('getcalneled', array('as' => 'getcalneled','uses' => 'OrderController@getcalneled',));



Route::post('AddNewOrder','OrderController@AddNewOrder');


Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));

Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'OrderController@getPaymentStatus',));
Route::get('getcalneled', array('as' => 'getcalneled','uses' => 'OrderController@getcalneled',));


Route::get('send','mailController@send');

Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'PostController@ajaxImageUploadPost']);


Route::post('addPost','PostController@addPost');
Route::post('uploadmedia','PostController@uploadmedia');
Route::get('add','PostController@ShowAdd');
Route::post('addadd','PostController@addadd');

Route::post('logout',
function(){  Auth::logout();
}
);

Route::get('addFavorites','PostController@addFavorites');


// Route::get('jquery-loadmore',['as'=>'jquery-loadmore','uses'=>'PostController@loadMore']);
Route::get('/',['as'=>'jquery-loadmore','uses'=>'PostController@loadMore']);

Route::get('ShowOrderBox','PostController@ShowOrderBox');

Route::get('chefs','UserController@Chefs');

Route::get('ConfirmOrder','PostController@ConfirmOrder');

Route::get('chef/{id}','UserController@ChefById');
Route::get('getalluser','PostController@getalluser');
Route::get('meals/{id}','PostController@PostById');

Route::get('ajax','PostController@Ajaxshow');
Route::get('Ajaxreq','PostController@Ajax');
Route::get('getrequest','PostController@aaa');

Route::get('CancelMyOrder','UserController@CancelMyOrder');



Route::get('show', 'PostController@show' );



Route::get('posts', 'PostController@index');



Route::get('/adminpanel/user/index','UserController@index' );
Route::get('/adminpanel/users/data',[  'as'=>'adminpanel.users.data', 'uses' =>'UserController@dataTable'] ) ;
Route::get('/adminpanel','AdminController@index' )->middleware('web', 'admin');





            

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


 


// 
Route::get('/myorders','UserController@myOrders' );

//