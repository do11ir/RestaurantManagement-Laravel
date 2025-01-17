<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\basketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*-----------------------------------Home Routes---------------------------------------*/
Route::get('/', [HomeController::class,'user'])->name('user');


/*-----------------------------------User Routes---------------------------------------*/
Route::middleware(['auth'])->group(function(){
Route::get('/profile', [HomeController::class,'profile'])->name('profile');
Route::get('/profile/editUserInfo', [HomeController::class,'editUserInfo'])->name('editUserInfo');
Route::post('/profile/updateUserInfo', [HomeController::class,'updateUserInfo'])->name('updateUserInfo');

Route::get('/singleCategory/{id}', [HomeController::class,'singleCategory'])->name('singleCategory');
Route::get('/singleFood/{id}', [HomeController::class,'singleFood'])->name('singleFood');

Route::get('/basket/add/{foods_id}', [basketController::class,'add'])->name('basket.add');
Route::get('/foodBasket', [basketController::class,'foodBasket'])->name('foodBasket');
Route::get('/foodBasket/deleteOrder/{id}', [basketController::class,'deleteOrder'])->name('deleteOrder');

Route::get('/singleRestaurant/{id}', [HomeController::class,'singleRestaurant'])->name('singleRestaurant');

Route::post('/profile/updateUserInfo/newAddress', [HomeController::class,'newAddress'])->name('newAddress');
Route::get('/profile/deleteAddress/{id}', [HomeController::class,'deleteAddress'])->name('deleteAddress');

Route::post('/foodBasket/insertFactors', [basketController::class,'insertFactors'])->name('insertFactors');

});

/*--------------------------------------Master Routes--------------------------------*/
Route::middleware(['auth' ,'auth.role.admin'])->group(function(){

    
    Route::get('/profile/editRestaurant/', [RestaurantController::class,'editRestaurant'])->name('editRestaurant');
    Route::post('/profile/editRestaurant/insertRestaurant/', [RestaurantController::class,'insertRestaurant'])->name('insertRestaurant');

    Route::get('/profile/addFood/', [RestaurantController::class,'addFood'])->name('addFood');
    Route::post('/profile/insertFood/', [RestaurantController::class,'insertFood'])->name('insertFood');
    Route::get('/profile/deleteFood/{id}', [RestaurantController::class,'deleteFood'])->name('deleteFood');
    Route::get('/profile/editFood/{id}', [RestaurantController::class,'editFood'])->name('editFood');
    Route::post('/profile/updateFood', [RestaurantController::class,'updateFood'])->name('updateFood');

    Route::get('/profile/addCategory/', [RestaurantController::class,'addCategory'])->name('addCategory');
    Route::post('/profile/insertCategory/', [RestaurantController::class,'insertCategory'])->name('insertCategory');
    Route::get('/profile/deleteCategory/{id}', [RestaurantController::class,'deleteCategory'])->name('deleteCategory');
    Route::get('/profile/editCategory/{id}', [RestaurantController::class,'editCategory'])->name('editCategory');
    Route::post('/profile/updateCategory', [RestaurantController::class,'updateCategory'])->name('updateCategory');

    Route::post('/profile/editUserInfo/updateRestaurantInfo', [RestaurantController::class,'updateRestaurantInfo'])->name('updateRestaurantInfo');
 
    Route::get('/profile/reataurantFactors/', [RestaurantController::class,'reataurantFactors'])->name('reataurantFactors');
    Route::get('/profile/reataurantFactors/orderDetails/{id}', [RestaurantController::class,'orderDetails'])->name('orderDetails');


});
/*-----------------------------------Admin Routes---------------------------------------*/

route::get('/logout',[LogOutController::class, 'logout'])->name('logout');
Auth::routes();

Route::middleware(['auth','can:is-admin','auth.role.admin'])->group(function(){

    Route::get('/admin', [AdminController::class,'admin'])->name('admin');

    Route::get('/admin/restaurantManage', [AdminController::class,'restaurantManage'])->name('restaurantManage');

    Route::post('/admin/restaurantManage/insertRestaurants/', [AdminController::class,'insertRestaurants'])->name('insertRestaurants');
    Route::get('/admin/restaurantManage/deleteRestaurants/{id}', [AdminController::class,'deleteRestaurants'])->name('deleteRestaurants');
    Route::get('/admin/restaurantManage/editRestaurants/{id}', [AdminController::class,'editRestaurants'])->name('editRestaurants');
    Route::post('/admin/restaurantManage/updateRestaurants', [AdminController::class,'updateRestaurants'])->name('updateRestaurants');
    
    Route::get('/admin/foodManage', [AdminController::class,'foodManage'])->name('foodManage');

    Route::post('/admin/foodManage/insertFoodAdmin', [AdminController::class,'insertFoodAdmin'])->name('insertFoodAdmin');
    Route::get('/admin/foodManage/deleteFoodAdmin{id}', [AdminController::class,'deleteFoodAdmin'])->name('deleteFoodAdmin');
    Route::get('/admin/foodManage/editFoodAdmin{id}', [AdminController::class,'editFoodAdmin'])->name('editFoodAdmin');
    Route::post('/admin/foodManage/updateFoodAdmin', [AdminController::class,'updateFoodAdmin'])->name('updateFoodAdmin');

    Route::get('/admin/userManage', [AdminController::class,'userManage'])->name('userManage');

    Route::post('/admin/userManage/insertUser', [AdminController::class,'insertUser'])->name('insertUser');
    Route::get('/admin/userManage/deleteUser{id}', [AdminController::class,'deleteUser'])->name('deleteUser');
    Route::get('/admin/userManage/editUser{id}', [AdminController::class,'editUser'])->name('editUser');
    Route::post('/admin/foodManage/updateUser', [AdminController::class,'updateUser'])->name('updateUser');

    Route::get('/admin/categoryManage', [AdminController::class,'categoryManage'])->name('categoryManage');

    Route::post('/admin/CategoryManage/insertCategoryAdmin', [AdminController::class,'insertCategoryAdmin'])->name('insertCategoryAdmin');
    Route::get('/admin/CategoryManage/deleteCategoryAdmin/{id}', [AdminController::class,'deleteCategoryAdmin'])->name('deleteCategoryAdmin');
    Route::get('/admin/CategoryManage/editCategoryAdmin/{id}', [AdminController::class,'editCategoryAdmin'])->name('editCategoryAdmin');
    Route::post('/admin/CategoryManage/updateCategoryAdmin', [AdminController::class,'updateCategoryAdmin'])->name('updateCategoryAdmin');
 
    Route::get('/admin/factorManage', [AdminController::class,'factorManage'])->name('factorManage');

    Route::get('/admin/factorManage/deleteFactorAdmin/{id}', [AdminController::class,'deleteFactorAdmin'])->name('deleteFactorAdmin');
   

});




