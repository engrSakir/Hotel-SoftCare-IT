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



Route::get('/', 'FrontendController@index')->name('index');
Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/blog/{blog_id}', 'FrontendController@blogDetails')->name('blogDetails');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function (){
    return redirect()->route('backend.dashboard.index');
});

Route::get('/panel', function (){
    return redirect()->route('backend.dashboard.index');
});

Route::get('/admin', function (){
    return redirect()->route('backend.dashboard.index');
});

Route::get('/owner', function (){
    return redirect()->route('backend.dashboard.index');
});

Route::get('/customer', function (){
    return redirect()->route('backend.dashboard.index');
});

Route::get('/hotel-registration', 'HotelRegisterController@showPage')->name('hotelRegistration');
Route::post('/hotel-registration', 'HotelRegisterController@submitForm')->name('submitHotelRegistration');


Route::group(['namespace' => 'Backend', 'as' => 'backend.', 'prefix'=>'panel', 'middleware'=>['auth']], function (){
    Route::resource('dashboard', 'DashboardController')->except(['create','store', 'show', 'edit', 'update', 'destroy'])->middleware(['permission:view-dashboard']);

    //Location
    Route::get('/location', 'LocationController@index')->name('location.index')->middleware(['permission:view-location']);
    Route::post('/location', 'LocationController@store')->name('location.store')->middleware(['permission:add-location']);
    Route::post('/location/update', 'LocationController@update')->name('location.update')->middleware(['permission:edit-location']);
    Route::post('/location/delete', 'LocationController@destroy')->name('location.delete')->middleware(['permission:delete-location']);

    //service-category
    Route::get('/service-category', 'ServiceCategoryController@index')->name('service-category.index')->middleware(['permission:view-service-category']);
    Route::post('/service-category', 'ServiceCategoryController@store')->name('service-category.store')->middleware(['permission:add-service-category']);
    Route::post('/service-category/update', 'ServiceCategoryController@update')->name('service-category.update')->middleware(['permission:edit-service-category']);
    Route::post('/service-category/delete', 'ServiceCategoryController@destroy')->name('service-category.delete')->middleware(['permission:delete-service-category']);

    //Hotel
    Route::get('/hotel', 'HotelController@index')->name('hotel.index')->middleware(['permission:view-hotel']);
    Route::get('/hotel/create', 'HotelController@create')->name('hotel.create')->middleware(['permission:add-hotel']);
    Route::post('/hotel', 'HotelController@store')->name('hotel.store')->middleware(['permission:add-hotel']);
    Route::get('/hotel/show/{id}', 'HotelController@show')->name('hotel.show')->middleware(['permission:view-hotel|view-my-hotel']);
    Route::post('/hotel/update/{id}', 'HotelController@edit')->name('hotel.edit')->middleware(['permission:edit-hotel']);
    Route::post('/hotel/update', 'HotelController@update')->name('hotel.update')->middleware(['permission:edit-hotel|edit-my-hotel']);
    Route::post('/hotel/delete', 'HotelController@destroy')->name('hotel.delete')->middleware(['permission:delete-hotel']);

    //Package
    //Route::get('/package', 'PackageController@index')->name('package.index')->middleware(['permission:view-hotel']);
    //Route::get('/package/create', 'PackageController@create')->name('package.create')->middleware(['permission:add-hotel']);
    Route::post('/package', 'PackageController@store')->name('package.store')->middleware(['permission:add-hotel']);
    Route::get('/package/show/{id}', 'PackageController@show')->name('package.show')->middleware(['permission:view-hotel|view-my-hotel']);
    Route::post('/package/update/{id}', 'PackageController@edit')->name('package.edit')->middleware(['permission:edit-hotel']);
    Route::post('/package/update', 'PackageController@update')->name('package.update')->middleware(['permission:edit-hotel|edit-my-hotel']);
    Route::post('/package/delete', 'PackageController@destroy')->name('package.delete')->middleware(['permission:delete-hotel']);

    //blog
    Route::get('/blog', 'BlogController@index')->name('blog.index')->middleware(['permission:view-blog']);
    Route::get('/blog/create', 'BlogController@create')->name('blog.create')->middleware(['permission:add-blog']);
    Route::get('/blog/{id}', 'BlogController@edit')->name('blog.edit')->middleware(['permission:edit-blog']);
    Route::post('/blog', 'BlogController@store')->name('blog.store')->middleware(['permission:add-blog']);
    Route::post('/blog/update', 'BlogController@update')->name('blog.update')->middleware(['permission:edit-blog']);
    Route::post('/blog/delete', 'BlogController@destroy')->name('blog.delete')->middleware(['permission:delete-blog']);

    //frontend
    Route::get('/frontend', 'FrontendController@index')->name('frontend.index')->middleware(['permission:manage-frontend']);
    Route::get('/frontend/create', 'FrontendController@create')->name('frontend.create')->middleware(['permission:manage-frontend']);
    Route::get('/frontend/{id}', 'FrontendController@edit')->name('frontend.edit')->middleware(['permission:manage-frontend']);
    Route::post('/frontend', 'FrontendController@store')->name('frontend.store')->middleware(['permission:manage-frontend']);
    Route::post('/frontend/update', 'FrontendController@update')->name('frontend.update')->middleware(['permission:manage-frontend']);
    Route::post('/frontend/delete', 'FrontendController@destroy')->name('frontend.delete')->middleware(['permission:manage-frontend']);

    //My Hotels
    //Route::get('/me/hotel/{id}', 'MyHotelController@index')->name('myHotel.index')->middleware(['permission:view-my-hotel']);

    //Setting
    Route::get('/setting', 'SettingController@index')->name('setting.index')->middleware(['permission:manage-setting']);
    Route::get('/setting/advance-ownership', 'SettingController@advanceOwnership')->name('setting.advanceOwnership')->middleware(['permission:manage-advance-ownership']);
});
