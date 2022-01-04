<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::redirect('/homepage', 'home')->name('homepage');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/car/{id}', [HomeController::class, 'car'])->name('car_detail');
Route::get('/category_cars/{id}', [HomeController::class, 'category_cars'])->name('category_cars');
Route::post('/sendmessage', [HomeController::class, 'sendmessage'])->name('sendmessage');
Route::post('/get_car', [HomeController::class, 'get_car'])->name('get_car');
Route::get('/car_list/{search}', [HomeController::class, 'car_list'])->name('car_list');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/references', [HomeController::class, 'references'])->name('references');


// Admin routes


// prefix adds 'admin/' to the preceding routes, group applies the prefix and the middleware to the whole group of functions so you don't have to add them to each one
Route::middleware('auth')->prefix('admin')->group(function (){

    // Admin role
    Route::middleware('admin')->group(function (){

        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');

        // User
        Route::prefix('user')->group(function (){
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin_user');
            Route::get('create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin_user_add');
            Route::post('store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin_user_store');
            Route::get('edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin_user_edit');
            Route::post('update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin_user_update');
            Route::get('delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin_user_delete');
            Route::get('show/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin_user_show');
            Route::get('userrole/{id}', [App\Http\Controllers\Admin\UserController::class, 'user_roles'])->name('admin_user_roles');
            Route::post('userrolestore/{id}', [App\Http\Controllers\Admin\UserController::class, 'user_roles_store'])->name('admin_user_roles_add');
            Route::get('userroledelete/{userid}/{roleid}', [App\Http\Controllers\Admin\UserController::class, 'user_roles_delete'])->name('admin_user_roles_delete');
        });

        // Category
        Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin_category');
        Route::get('category/add', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('admin_category_add');
        Route::post('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin_category_create');
        Route::get('category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin_category_edit');
        Route::post('category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin_category_update');
        Route::get('category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin_category_delete');
        Route::get('category/show', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin_category_show');

        // Car
        Route::prefix('car')->group(function (){
            Route::get('/', [App\Http\Controllers\Admin\CarController::class, 'index'])->name('admin_car');
            Route::get('create', [App\Http\Controllers\Admin\CarController::class, 'create'])->name('admin_car_add');
            Route::post('store', [App\Http\Controllers\Admin\CarController::class, 'store'])->name('admin_car_store');
            Route::get('edit/{id}', [App\Http\Controllers\Admin\CarController::class, 'edit'])->name('admin_car_edit');
            Route::post('update/{id}', [App\Http\Controllers\Admin\CarController::class, 'update'])->name('admin_car_update');
            Route::get('delete/{id}', [App\Http\Controllers\Admin\CarController::class, 'destroy'])->name('admin_car_delete');
            Route::get('show/{id}', [App\Http\Controllers\Admin\CarController::class, 'show'])->name('admin_car_show');
        });

        // Car Image Gallery
        Route::prefix('image')->group(function (){
            Route::get('create/{car_id}', [App\Http\Controllers\Admin\ImageController::class, 'create'])->name('admin_image_add');
            Route::post('store/{car_id}', [App\Http\Controllers\Admin\ImageController::class, 'store'])->name('admin_image_store');
            Route::get('delete/{id}/{car_id}', [App\Http\Controllers\Admin\ImageController::class, 'destroy'])->name('admin_image_delete');
            Route::get('show', [App\Http\Controllers\Admin\ImageController::class, 'show'])->name('admin_image_show');
        });

        // Settings
        Route::get('setting', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_setting');
        Route::post('setting/update', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');

        // Message
        Route::prefix('message')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin_message');
            Route::get('edit/{id}', [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('admin_message_edit');
            Route::post('update/{id}', [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('admin_message_update');
            Route::get('delete/{id}', [App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin_message_delete');
            Route::get('show', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin_message_show');
        });

        // Comment
        Route::prefix('faq')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('admin_faq');
            Route::get('create', [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('admin_faq_add');
            Route::post('store', [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('admin_faq_store');
            Route::get('edit/{id}', [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('admin_faq_edit');
            Route::post('update/{id}', [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('admin_faq_update');
            Route::get('delete/{id}', [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('admin_faq_delete');
            Route::get('show/{id}', [App\Http\Controllers\Admin\FaqController::class, 'show'])->name('admin_faq_show');
        });

        // Faq
        Route::prefix('comment')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('admin_comment');
            Route::get('delete/{id}', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('admin_comment_delete');
            Route::get('show/{id}', [App\Http\Controllers\Admin\CommentController::class, 'show'])->name('admin_comment_show');
            Route::post('update/{id}', [App\Http\Controllers\Admin\CommentController::class, 'update'])->name('admin_comment_update');
        });

        Route::prefix('reservation')->group(function (){
            Route::get('/', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('admin_all_reservation');
            Route::get('/{status}', [App\Http\Controllers\Admin\ReservationController::class, 'index_w_status'])->name('admin_reservation');
            Route::get('create/{car_id}', [App\Http\Controllers\Admin\ReservationController::class, 'create'])->name('make_reservation');
            Route::post('store/{car_id}', [App\Http\Controllers\Admin\ReservationController::class, 'store'])->name('admin_reservation_store');
            Route::get('edit/{id}/{car_id}', [App\Http\Controllers\Admin\ReservationController::class, 'edit'])->name('admin_reservation_edit');
            Route::post('update/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'update'])->name('admin_reservation_update');
            Route::get('delete/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'destroy'])->name('admin_reservation_delete');
            Route::get('show/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'show'])->name('admin_reservation_show');
        });
    });

});


Route::get('/admin/login', [HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck', [HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// User

Route::middleware('auth')->prefix('user')->namespace('user')->group(function () {

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('userprofile');
    Route::get('/comments', [App\Http\Controllers\UserController::class, 'my_comments'])->name('usercomments');
    Route::get('/delete_comment/{id}', [App\Http\Controllers\UserController::class, 'destroy_comment'])->name('userdestroycomment');
    Route::prefix('car')->group(function (){
        Route::get('/', [App\Http\Controllers\CarController::class, 'index'])->name('user_car');
        Route::get('create', [App\Http\Controllers\CarController::class, 'create'])->name('user_car_add');
        Route::post('store', [App\Http\Controllers\CarController::class, 'store'])->name('user_car_store');
        Route::get('edit/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('user_car_edit');
        Route::post('update/{id}', [App\Http\Controllers\CarController::class, 'update'])->name('user_car_update');
        Route::get('delete/{id}', [App\Http\Controllers\CarController::class, 'destroy'])->name('user_car_delete');
        Route::get('show/{id}', [App\Http\Controllers\CarController::class, 'show'])->name('user_car_show');
    });

    Route::prefix('image')->group(function (){
        Route::get('create/{car_id}', [App\Http\Controllers\ImageController::class, 'create'])->name('user_image_add');
        Route::post('store/{car_id}', [App\Http\Controllers\ImageController::class, 'store'])->name('user_image_store');
        Route::get('delete/{id}/{car_id}', [App\Http\Controllers\ImageController::class, 'destroy'])->name('user_image_delete');
        Route::get('show', [App\Http\Controllers\ImageController::class, 'show'])->name('user_image_show');
    });

    Route::prefix('reservation')->group(function (){
        Route::get('/', [App\Http\Controllers\ReservationController::class, 'index'])->name('user_reservation');
        Route::get('create/{car_id}', [App\Http\Controllers\ReservationController::class, 'create'])->name('make_reservation');
        Route::post('store/{car_id}', [App\Http\Controllers\ReservationController::class, 'store'])->name('user_reservation_store');
        Route::get('edit/{id}/{car_id}', [App\Http\Controllers\ReservationController::class, 'edit'])->name('user_reservation_edit');
        Route::post('update/{id}', [App\Http\Controllers\ReservationController::class, 'update'])->name('user_reservation_update');
        Route::get('delete/{id}', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('user_reservation_delete');
        Route::get('show/{id}', [App\Http\Controllers\ReservationController::class, 'show'])->name('user_reservation_show');
    });
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
