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


Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index'])->name('front');

Route::get('/all-restaurants', [\App\Http\Controllers\FrontendController::class, 'all_restaurants'])->name('front.all.restaurant');
Route::post('/get-all-restaurants', [\App\Http\Controllers\FrontendController::class, 'get_all_restaurants'])->name('front.get.all.restaurant');
Route::get('/restaurant-details/{id}', [\App\Http\Controllers\FrontendController::class, 'restaurant_details'])->name('front.restaurant.details');


//Route::get('/all-restaurants', [\App\Http\Controllers\FrontendController::class, 'all_restaurants'])->name('front.all.restaurant')->middleware('signed');
//Route::get('/restaurant-details/{id}', [\App\Http\Controllers\FrontendController::class, 'restaurant_details'])->name('front.restaurant.details');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user register
Route::post('/user-register', [\App\Http\Controllers\CustomUserLoginController::class, 'user_register'])->name('user.register.submit');
Route::post('/user-login', [\App\Http\Controllers\CustomUserLoginController::class, 'user_login'])->name('user.login.submit');


Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginform'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

        //general settings
        Route::get('/general-settings', [\App\Http\Controllers\Admin\AdminController::class, 'general_settings'])->name('admin.general.settings');
        Route::post('/general-settings-save', [\App\Http\Controllers\Admin\AdminController::class, 'general_settings_save'])->name('admin.general.settings.save');

        //store type
        Route::get('/store-type', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_type'])->name('admin.store.type')->middleware('signed');
        Route::post('/store-type-update', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_type_update'])->name('admin.store.type.update');

        //main category
        Route::get('/main-category', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'main_category'])->name('admin.main.category');
        Route::get('/main-category-get', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'main_category_get'])->name('admin.get.main.category');
        Route::post('/main-category-save', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'main_category_save'])->name('admin.main.category.save');
        Route::post('/main-category-single', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'main_category_single'])->name('admin.single.main.category');
        Route::post('/main-category-update', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'main_category_update'])->name('admin.main.category.update');
        Route::post('/main-category-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'main_category_delete'])->name('admin.main.category.delete');

        //sub category
        Route::get('/sub-category', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'sub_category'])->name('admin.sub.category');
        Route::get('/sub-category-get', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'sub_category_get'])->name('admin.get.sub.category');
        Route::post('/sub-category-save', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'sub_category_save'])->name('admin.sub.category.save');
        Route::post('/sub-category-single', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'sub_category_single'])->name('admin.single.sub.category');
        Route::post('/sub-category-update', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'sub_category_update'])->name('admin.sub.category.update');
        Route::post('/sub-category-delete', [\App\Http\Controllers\Admin\AdminCategoryController::class, 'sub_category_delete'])->name('admin.sub.category.delete');

        //admin.measurement
        Route::get('/measurement', [\App\Http\Controllers\Admin\AdminMeasurementController::class, 'measurement'])->name('admin.measurement');
        Route::get('/measurement-get', [\App\Http\Controllers\Admin\AdminMeasurementController::class, 'measurement_get'])->name('admin.get.measurement');
        Route::post('/measurement-save', [\App\Http\Controllers\Admin\AdminMeasurementController::class, 'measurement_save'])->name('admin.measurement.save');
        Route::post('/measurement-single', [\App\Http\Controllers\Admin\AdminMeasurementController::class, 'measurement_single'])->name('admin.single.measurement');
        Route::post('/measurement-update', [\App\Http\Controllers\Admin\AdminMeasurementController::class, 'measurement_update'])->name('admin.measurement.update');
        Route::post('/measurement-delete', [\App\Http\Controllers\Admin\AdminMeasurementController::class, 'measurement_delete'])->name('admin.measurement.delete');

        //store
        Route::get('/create-store', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'create_store'])->name('admin.store');
        Route::post('/create-store-save', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'create_store_save'])->name('admin.store.create');
        Route::get('/store-list', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_list'])->name('admin.store.list');
        Route::get('/store-list-get', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_list_get'])->name('admin.get.store');
        Route::get('/store-edit/{id}', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_edit'])->name('admin.store.edit');
        Route::post('/store-update', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_update'])->name('admin.store.update');
        Route::post('/store-delete', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_delete'])->name('admin.store.delete');

        //store gallery
        Route::get('/store-gallery', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_gallery'])->name('admin.store.gallery');
        Route::get('/store-gallery-create', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_gallery_create'])->name('admin.store.gallery.create');
        Route::post('/store-gallery-save', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_gallery_save'])->name('admin.store.gallery.save');
        Route::get('/store-gallery-get', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_gallery_get'])->name('admin.get.store.gallery');
        Route::get('/store-gallery-edit/{id}', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_gallery_edit'])->name('admin.store.gallery.edit');
        Route::post('/store-gallery-update', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_gallery_update'])->name('admin.store.gallery.update');
        Route::post('/store-gallery-delete', [\App\Http\Controllers\Admin\AdminRestaurantController::class, 'store_gallery_delete'])->name('admin.store.gallery.delete');

        //store items
        Route::get('/store-items', [\App\Http\Controllers\Admin\AdminRestaurantItemController::class, 'store_items'])->name('admin.store.items');
        Route::get('/store-items-get-all', [\App\Http\Controllers\Admin\AdminRestaurantItemController::class, 'store_items_get_all'])->name('admin.get.all.items');
        Route::get('/store-item-create', [\App\Http\Controllers\Admin\AdminRestaurantItemController::class, 'store_item_create'])->name('admin.store.items.create');
        Route::post('/store-item-save', [\App\Http\Controllers\Admin\AdminRestaurantItemController::class, 'store_item_save'])->name('admin.store.items.save');
        Route::get('/store-item-edit/{id}', [\App\Http\Controllers\Admin\AdminRestaurantItemController::class, 'store_item_edit'])->name('admin.store.items.edit');
        Route::post('/store-item-update', [\App\Http\Controllers\Admin\AdminRestaurantItemController::class, 'store_item_update'])->name('admin.store.items.update');
        Route::post('/store-item-delete', [\App\Http\Controllers\Admin\AdminRestaurantItemController::class, 'store_item_delete'])->name('admin.store.items.delete');

        //admin delivery boy
        Route::get('/delivery-boy-create', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_create'])->name('admin.delete.boy.create');
        Route::post('/delivery-boy-save', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_save'])->name('admin.delete.boy.save');

        //manage delivery boy
        Route::get('/delivery-boy-list', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_list'])->name('admin.delete.boy.list');
        Route::get('/delivery-boy-list-get', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_list_get'])->name('admin.get.all.deliveryboy');
        Route::get('/delivery-boy-edit/{id}', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_edit'])->name('admin.delete.boy.edit');
        Route::post('/delivery-boy-update', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_update'])->name('admin.delete.boy.update');
        Route::post('/delivery-boy-delete', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_delete'])->name('admin.delete.boy.delete');

        //assign delivery boy
        Route::get('/delivery-boy-assign', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_assign'])->name('admin.assign.delivery.boy');
        Route::post('/delivery-boy-assign-save', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_assign_save'])->name('admin.assign.delivery.boy.save');
        Route::post('/delivery-boy-assign-update', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_assign_update'])->name('admin.assign.delivery.boy.update');
        Route::post('/delivery-boy-assign-delete', [\App\Http\Controllers\Admin\AdminDeliveryBoyController::class, 'delivery_boy_assign_delete'])->name('admin.assign.delivery.boy.delete');

    });
});


Route::prefix('store')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\RestaurantLoginController::class, 'showLoginform'])->name('restaurant.login');
    Route::post('/login', [\App\Http\Controllers\Auth\RestaurantLoginController::class, 'login'])->name('restaurant.login.submit');
    Route::get('/logout', [\App\Http\Controllers\Auth\RestaurantLoginController::class, 'logout'])->name('restaurant.logout');
});

Route::group(['middleware' => ['auth:restaurant']], function () {
    Route::prefix('store')->group(function () {
        Route::get('/', [App\Http\Controllers\Restaurant\RestaurantController::class, 'index'])->name('restaurant.dashboard');

        //item management
        Route::get('/items', [App\Http\Controllers\Restaurant\RestaurantItemController::class, 'items'])->name('restaurant.items');
        Route::get('/item-get-all', [App\Http\Controllers\Restaurant\RestaurantItemController::class, 'items_get_all'])->name('restaurant.get.all.items');
        Route::get('/item-create', [App\Http\Controllers\Restaurant\RestaurantItemController::class, 'items_create'])->name('restaurant.store.items.create');
        Route::post('/item-save', [App\Http\Controllers\Restaurant\RestaurantItemController::class, 'items_save'])->name('restaurant.store.items.save');
        Route::get('/item-edit/{id}', [App\Http\Controllers\Restaurant\RestaurantItemController::class, 'items_edit'])->name('restaurant.store.items.edit');
        Route::post('/item-update', [App\Http\Controllers\Restaurant\RestaurantItemController::class, 'items_update'])->name('restaurant.store.items.update');
        Route::post('/item-delete', [App\Http\Controllers\Restaurant\RestaurantItemController::class, 'items_delete'])->name('restaurant.store.items.delete');

    });
});


