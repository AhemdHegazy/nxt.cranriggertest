<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Backend'],function(){
   Route::get('subjects','SubjectsController@subjects')->name('api.subjects');
   Route::get('testimonials','TestimonialsController@testimonials')->name('api.testimonials');
   Route::get('posts','PostsController@posts')->name('api.posts');
   Route::get('questions','QuestionsController@questions')->name('api.questions');
   Route::get('packages','PackagesController@packages')->name('api.packages');
   Route::get('countries','CountriesController@countries')->name('api.countries');
   Route::get('companies','CompaniesController@companies')->name('api.companies');
   Route::get('companies-users/{companyId}','CompaniesController@CompanyUsers')->name('api.company_users');
   Route::get('companies-orders/{companyId}','CompaniesController@ApiOrders')->name('api.company_orders');
   Route::get('users-orders/{userId}','UsersController@ApiOrders')->name('api.users_orders');
   Route::get('users-answers/{paymentId}','UsersController@ApiAnswers')->name('api.users_answers');
   Route::get('orders','OrdersController@orders')->name('api.orders');
   Route::get('users','UsersController@users')->name('api.users');
   Route::get('admins','AdminsController@admins')->name('api.admins');
   Route::get('coupons', 'CouponsController@coupons')->name('api.coupons');
   Route::get('guidelines', 'GuidelinesController@guidelines')->name('api.guidelines');
   Route::get('contacts', 'ContactsController@contacts')->name('api.contacts');

});
