<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', function () {
    return view('home');
});


Route::post('/admin/check',[MainController::class, 'check'])->name('admin.check');
Route::get('/admin/logout',[MainController::class, 'logout'])->name('admin.logout');


Route::post('/user/save', [MainController::class, 'saveUser'])->name('user.save');
Route::post('/user/check',[MainController::class, 'checkUser'])->name('user.check');
Route::get('/user/logout',[MainController::class, 'userlogout'])->name('user.logout');



Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/admin/login', [MainController::class, 'login'])->name('admin.login');
    Route::get('/admin/dashboard',[MainController::class, 'dashboard']);
    Route::get('/admin/addfood',[MainController::class, 'addfood']);
    Route::get('/admin/foodlist',[MainController::class, 'getFoodList'])->name('admin.foodlist');
    Route::get('/admin/newcustomer',[MainController::class, 'getNewCustomersList'])->name('admin.newcustomer');
    Route::get('/admin/customerslist',[MainController::class, 'getCustomersList'])->name('admin.customerslist');
    Route::post('/admin/savefood',[MainController::class, 'saveFood'])->name('admin.savefood');
    Route::post('/admin/verified/',[MainController::class, 'updateApproval']);
    Route::get('/admin/editfood/{food_id}',[MainController::class, 'getFood']);
    Route::post('/admin/editfood',[MainController::class, 'updateFood']);
    Route::get('/admin/deletefood/{food_id}',[MainController::class, 'deleteFood']);
    Route::get('/admin/addbalance/{username}',[MainController::class, 'loadaddbalance']);
    Route::post('/admin/addbalance',[MainController::class, 'addbalance']);
    Route::get('/admin/orders',[MainController::class, 'loadallorders']);
    Route::get('/admin/ordercompleted/{id}',[MainController::class, 'completedorder']);
    Route::get('/admin/orderremove/{id}',[MainController::class, 'removedorder']);
});

Route::group(['middleware'=>['UserAuthCheck']], function(){
    Route::get('/user/login', [MainController::class, 'userlogin'])->name('user.login');
    Route::get('/user/register', [MainController::class, 'register'])->name('user.register');
    Route::get('/user/dashboard',[MainController::class, 'userdashboard']);
    Route::get('/user/breakfast',[MainController::class, 'getBreakFastListUser'])->name('user.breakfast');
    Route::get('/user/lunch',[MainController::class, 'getLunchListUser'])->name('user.lunch');
    Route::get('/user/dinner',[MainController::class, 'getDinnerListUser'])->name('user.dinner');
    Route::post('/user/addtocart',[MainController::class, 'addtocart'])->name('user.addtocart');
    Route::get('/user/ordercart', [MainController::class, 'loadordercartlgotoorderist'])->name('user.ordercart');
    Route::get('/user/cartdelete/{id}',[MainController::class, 'removefromcart']);
    Route::post('/user/submitorder',[MainController::class, 'submitorder']);
    Route::get('/user/myorders',[MainController::class, 'loadmyorderslist']);


});
