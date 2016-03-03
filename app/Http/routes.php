<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => ['web', 'admin']], function () {
    // Authentication Routes...
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
    $this->get('register', 'Auth\AuthController@showRegistrationForm');
    $this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/home', 'HomeController@index');
});


Route::group(['namespace' => 'Admin', 'as' => 'admin::', 'prefix' => 'admin'], function() {

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@home']);

});



Route::match(['get', 'post'], '/', function()
{
    return 'Hello World';
});
Route::any('foo', function()
{
    return 'Hello World';
});
//optional parametr
Route::get('user/{name?}', function($name = null)
{
    return $name;
});
//Route::group(['namespace' => 'Admin'], function()
//{
//    // Controllers Within The "App\Http\Controllers\Admin" Namespace
//
//    Route::group(['namespace' => 'User'], function()
//    {
//        // Controllers Within The "App\Http\Controllers\Admin\User" Namespace
//    });
//});
//Route::group(['domain' => '{account}.myapp.com'], function()
//{
//
//    Route::get('user/{id}', function($account, $id)
//    {
//        //
//    });
//
//});


//depency inject
//Route::get('profile/{user}', function(App\User $user)
//{
//    //
//});
//Route::bind('user', function($value)
//{
//    return User::where('name', $value)->first();
//});
//to zamieni parametr user na model User
//RouteServiceProvider::boot
//        public function boot(Router $router)
//{
//    parent::boot($router);
//
//    $router->model('user', 'App\User');
//}