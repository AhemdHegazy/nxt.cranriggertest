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
   Route::get('subjects/{loggedId}','SubjectsController@subjects')->name('api.subjects');
   Route::get('capacities/{loggedId}','CapacitiesController@capacities')->name('api.capacities');
   Route::get('testimonials/{loggedId}','TestimonialsController@testimonials')->name('api.testimonials');
   Route::get('posts/{loggedId}','PostsController@posts')->name('api.posts');
   Route::get('questions/{loggedId}','QuestionsController@questions')->name('api.questions');
   Route::get('packages/{loggedId}','PackagesController@packages')->name('api.packages');
   Route::get('countries/{loggedId}','CountriesController@countries')->name('api.countries');
   Route::get('companies/{loggedId}','CompaniesController@companies')->name('api.companies');
   Route::get('companies-users/{companyId}/{loggedId}','CompaniesController@CompanyUsers')->name('api.company_users');
   Route::get('companies-orders/{companyId}/{loggedId}','CompaniesController@ApiOrders')->name('api.company_orders');
   Route::get('users-orders/{userId}/{loggedId}','UsersController@ApiOrders')->name('api.users_orders');
   Route::get('users-answers/{paymentId}/{loggedId}','UsersController@ApiAnswers')->name('api.users_answers');
   Route::get('orders/{loggedId}','OrdersController@orders')->name('api.orders');
   Route::get('users/{loggedId}','UsersController@users')->name('api.users');
   Route::get('admins/{LoggedId}','AdminsController@admins')->name('api.admins');
   Route::get('coupons/{loggedId}', 'CouponsController@coupons')->name('api.coupons');
   Route::get('guidelines/{loggedId}', 'GuidelinesController@guidelines')->name('api.guidelines');
   Route::get('contacts/{loggedId}', 'ContactsController@contacts')->name('api.contacts');
   Route::get('increases/{packageId}/{loggedId}', 'IncreasesController@increases')->name('api.increases');

});
