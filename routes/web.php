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
//AUTH
Route::group(['namespace' => 'BB\Modules'], function () {
    Auth::routes();
});

//COMPANY CONTROLLER
Route::group(['prefix' => 'panel','middleware' => 'auth','namespace' => 'BB\Modules\Companies\\'], function () {

    Route::resource('company', CompaniesController::class ,  ['only' => [
        'create','store','update'
    ]]);
    Route::get('/company/edit', CompaniesController::class . "@editCompany")->name('company.edit');
    Route::get('/company/profile', CompaniesController::class . "@profile")->name('company.profile');


    //non members
    Route::group(['middleware' => 'company.not'],function(){

        Route::get('/companies/list/', CompaniesController::class . "@index")->name('company.index');
        Route::get('/company/{id}/join/', CompaniesController::class . "@joinCompany")->name('company.join');
        Route::get('/company/choose-option', CompaniesController::class . "@chooseOption")->name('company.choose');

    });






});

//USR CONTROLLER
Route::group(['prefix' => 'panel','middleware' => ['auth','company'],'namespace' => 'BB\Modules\Users\\'], function () {

    Route::get('user/{id}/manage', UserController::class. "@userManage")->name("user.manage");
    Route::get('/user/profile', UserController::class . "@profile")->name("user.profile");
    Route::patch('/user/profile', UserController::class . "@profileUpdate")->name("user.profile.update");
    Route::resource('users', UserController::class);
    Route::post('users/{id}/remove', UserController::class. "@removeFromCompany")->name("users.remove");

});

//PRODUCTS CONTROLLER
Route::group(['prefix' => 'panel','middleware' => 'auth','namespace' => 'BB\Modules\Products\\'], function () {

    Route::resource('products', ProductsController::class);

});

//PRODUCT IMAGS CONTROLLER
Route::group(['prefix' => 'panel','middleware' => 'auth','namespace' => 'BB\Modules\ProductImages\\'], function () {

    Route::post('product/{id}/upload-image', ProductImagesController::class . "@upload")->name("product.image.upload");
    Route::delete('product/image/{id}/delete', ProductImagesController::class . "@destroy")->name("product.image.destroy");
});

//HOME
Route::get('/', ['middleware' => 'auth', function(){
    return redirect('/panel/company/profile');
}]);

