<?php

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

Auth::routes();

Route::group(['prefix' => 'admin','middleware' =>'admin:admin','namespace' => 'Backend'],function (){
    /*
    |--------------------------------------------------------------------------
    | CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::resource('packages', 'PackagesController', ['except' => ['create']]);
    Route::resource('questions', 'QuestionsController', ['except' => ['create']]);
    Route::resource('posts', 'PostsController', ['except' => ['create']]);
    Route::resource('subjects', 'SubjectsController', ['except' => ['create','show']]);
    Route::resource('countries', 'CountriesController', ['except' => ['create','show']]);
    Route::resource('coupons', 'CouponsController', ['except' => ['create','show']]);
    Route::resource('orders','OrdersController', ['except' => ['create','show']]);
    Route::resource('testimonials','TestimonialsController', ['except' => ['create','show','edit','update','store']]);
    Route::resource('companies','CompaniesController',['except' => ['create','show']]);
    Route::resource('users','UsersController',['except' => ['create','show']]);
    Route::resource('guidelines','GuidelinesController',['except' => ['create','show']]);
    Route::resource('contacts','ContactsController',['except' => ['create','show','store','edit','update']]);
    Route::resource('admins','AdminsController',['except' => ['create','show']]);
    Route::get('/world','CountriesController@world')->name('world.index');
    Route::get('/payments-query','PaymentsController@queryGet')->name('queryGet.index');
    Route::post('/payments-query','PaymentsController@queryPost')->name('payments.query');
    Route::get('/answers/{userId}','UsersController@answers')->name('users.answers.show');
    Route::get('/grades/{userId}','UsersController@grades')->name('users.grades.show');
    Route::get('/world','CountriesController@world')->name('world.index');
    Route::get('/companies-users-{company}','CompaniesController@users')->name('users.company');
    Route::get('/companies-orders-{company}','CompaniesController@orders')->name('orders.company');
    Route::get('/users-orders-{user}','UsersController@orders')->name('orders.users');
    /*
    |--------------------------------------------------------------------------
    | Settings Routes
    |--------------------------------------- v-----------------------------------
    */
    Route::get('/copy','ControlsController@copy')->name('copy.index');
    Route::get('/settings','ControlsController@settings')->name('settings.index');
    Route::get('/permissions','AdminsController@getPermissions')->name('admin.permissions');
    Route::post('/permissions','AdminsController@SavePermissions')->name('save.permissions');
    Route::get('/profile','ControlsController@profile')->name('profile.index');
    Route::post('/profile/update','ControlsController@update')->name('profile.update');
    Route::post('/settings/update','ControlsController@change')->name('settings.update');
    Route::post('logout', 'AdminsController@logout')->name('admin.logout');
});
/*
|--------------------------------------------------------------------------
| Admin Login Routes
|--------------------------------------------------------------------------
*/
Route::get('/pdf', function () {
    //return view('frontend.certifications.index');
    $pdf = PDF::loadView('frontend.certifications.index');
    $pdf->autoScriptToLang = true;
    $pdf->baseScript = 1;
    $pdf->autoVietnamese = true;
    $pdf->autoArabic = true;
    $pdf->autoLangToFont = true;
    $pdf->img_dpi = 96;
    $pdf->showImageErrors = true;
    return $pdf->stream('certifications.pdf');
});
Route::group(['prefix' => 'admin','namespace' => 'Backend'],function () {
    Route::get('login', 'AdminsController@get')->name('admin.index');
    Route::post('login', 'AdminsController@post')->name('admin.login');
});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/','IndexController@index')->name('index');
Route::group(['namespace' => 'Authenticated'],function(){
    Route::get('/company-grades/{orderId}','GuestAuthenticatedController@grade')->name('company.users.grade');
    Route::get('/register','GuestAuthenticatedController@registerGet')->name('register.guest');
    Route::get('/register-type','GuestAuthenticatedController@registerType')->name('register.type');
    Route::post('/register','GuestAuthenticatedController@registerPost')->name('register.post');
    Route::post('/register-user','GuestAuthenticatedController@registerUser')->name('register.user');
    Route::get('/login','GuestAuthenticatedController@loginGet')->name('login.guest');
    Route::post('/login','GuestAuthenticatedController@loginPost')->name('login.post');
});
Route::get('/logout','GuestAuthenticatedController@logout')->name('logout.guest');

Route::group(['middleware' =>   'auth','namespace'    => 'Frontend'],function (){
   Route::get('/company-info','GeneralInfoController@company')->name('company.info');
   Route::get('/user-info','GeneralInfoController@user')->name('user.info');
   Route::get('/order/{package}','OrdersController@place')->name('order.place');
   Route::get('/customize/{package}','OrdersController@customize')->name('order.customize');
   Route::post('/customize-process','OrdersController@customizePost')->name('customize.post');
   Route::resource('employees','EmployeesController');
   Route::get('/order-setup/{orderId}','OrdersController@setup')->name('order.setup');
   Route::get('/order-destroy/{orderId}','OrdersController@destroy')->name('order.destroy');
   Route::get('/start-exam/{orderId}','ExamsController@start')->name('exam.start');
   Route::get('/start-begin/{orderId}','ExamsController@begin')->name('exam.begin');
   Route::get('/grades/{paymentId}','ExamsController@grades')->name('exam.grades');
   Route::post('/store','ExamsController@store')->name('exam.store');
   Route::post('/check','CouponsController@check')->name('coupon.check');
   Route::get('/print/{paymentId}','ExamsController@certification')->name('certification.print');
});
Route::group(['middleware' =>   'auth','namespace'    => 'Payments'],function () {
    Route::get('/checkout/{id}','PaymentController@checkout')->name('checkout.get');
    Route::get('/get-checkout-id','PaymentController@getCheckoutId')->name('offers.checkout');
    Route::get('/status/{id}','PaymentController@status')->name('offers.status');
});
Route::get('/testimonials-front','IndexController@testimonials')->middleware('auth')->name('testimonial.index');
Route::post('/testimonials-front','IndexController@testimonialsPost')->middleware('auth')->name('testimonial.post');

Route::get('/packages','IndexController@packages')->name('guest.packages');
Route::get('/terms','IndexController@terms')->name('guest.terms');
Route::get('/about','IndexController@about')->name('guest.about');
Route::get('/contact','IndexController@contact')->name('guest.contact');
Route::post('/contact','IndexController@contactPost')->name('contacts.post');
Route::get('/blog','IndexController@blog')->name('guest.blog');
Route::get('/post/{id}','IndexController@single')->name('blog.single');
Route::post('/comments-create','IndexController@commentsPost')->name('comments.post');
Route::get('/fqa','IndexController@fqa')->name('guest.fqa');
Route::get('/terms','IndexController@terms')->name('guest.terms');
Route::get('/policy','IndexController@policy')->name('guest.policy');
Route::get('/ahmed-magic','IndexController@magic');
Route::get('/full-magic','IndexController@full');
Route::get('/all-magic','IndexController@all');

/*PayTabs*/
Route::get('/payment', function () {
    return view('payment');
});
Route::post('/callback','IndexController@callback')->name('callback');
Route::get('/tests', function () {

    return \Carbon\Carbon::now();
});

Route::get('{path}', function (){
    return view('frontend.404');
})->where(['path' => '.*']);
