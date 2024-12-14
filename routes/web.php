<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MachineController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\SellerController;
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

Route::get('/', [HomeController::class, 'list'])->name('main');
Route::get('/machine/{id}', [HomeController::class, 'home'])->name('home');

Route::get('/product/{id}', [CartController::class, 'index'])->name('all-products');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('promotions', [PromotionController::class, 'index'])->name('promotions-list');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


Route::get('/admin', function () {
    return view('admin/login');
})->name('login');

Route::get('/seller', function () {
    return view('admin/login');
})->name('login');

Route::post('/admin', [AdminController::class, 'login'])->name('adminLogIn');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashBoard'])->name('dasboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin-logout');
    Route::get('/user', [AdminController::class, 'createUser'])->name('create-user');
    Route::post('/user', [AdminController::class, 'addUser'])->name('add-user');
    Route::get('/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');

    Route::get('/machines', [MachineController::class, 'listing'])->name('machines');
    Route::get('/machines/create', [MachineController::class, 'create'])->name('create-machine');
    Route::post('/machines/create', [MachineController::class, 'addMachine'])->name('add-machine');
    Route::get('/machines/delete/{id}', [MachineController::class, 'delete'])->name('delete-machine');

    Route::get('/machines/assign/{machineId}', [MachineController::class, 'assign'])->name('assign-machine');
    Route::post('/machines/assign/{machineId}', [MachineController::class, 'assignUser'])->name('assign-machines-user');

    Route::get('/machines/slots/{machineId}', [MachineController::class, 'slots'])->name('slots');
    Route::get('/machines/slots/create/{machineId}', [MachineController::class, 'createSlot'])->name('create-machine-slot');
    Route::get('/machines/slots/delete/{id}', [MachineController::class, 'deleteSlot'])->name('delete-machine-slot');
    Route::post('/machines/slots/create', [MachineController::class, 'addSlot'])->name('add-machine-slot');

    Route::get('/machines/slots/item/{slotId}', [MachineController::class, 'slotItems'])->name('slot-item');
    Route::get('/machines/slots/item/create/{slotId}', [MachineController::class, 'createSlotItem'])->name('create-machine-slot-item');
    Route::post('/machines/slots/item/create/{slotId}', [MachineController::class, 'addSlotItem'])->name('add-machine-slot-item');
    Route::post('/machines/slots/item/delete/{id}', [MachineController::class, 'addSlotItem'])->name('delete-machine-slot-item');


    Route::get('/promotions', [PromotionController::class, 'listing'])->name('promotions');
    Route::get('/promotions/create', [PromotionController::class, 'create'])->name('create-promotions');
    Route::get('/promotions/edit/{id}', [PromotionController::class, 'edit'])->name('edit-promotions');
    Route::post('/promotions/update/{id}', [PromotionController::class, 'update'])->name('update-promotions');
    Route::post('/promotions/create', [PromotionController::class, 'add'])->name('add-promotions');
    Route::get('/promotions/delete/{id}', [PromotionController::class, 'delete'])->name('delete-promotions');
});

Route::middleware(['auth'])->prefix('seller')->group(function () {
    Route::get('/machines', [SellerController::class, 'sellerMachines'])->name('seller-machines');
    Route::get('/machines/slots/{machineId}', [SellerController::class, 'slots'])->name('seller-slots');

    Route::get('/machines/slots/item/{slotId}', [SellerController::class, 'slotItems'])->name('seller-slot-item');
    Route::get('/machines/slots/item/create/{slotId}', [SellerController::class, 'createSlotItem'])->name('create-machine-slot-item-seller');
    Route::post('/machines/slots/item/create/{slotId}', [SellerController::class, 'addSlotItem'])->name('add-machine-slot-item-seller');
    Route::get('/machines/slots/item/edit/{slotId}', [SellerController::class, 'slots'])->name('edit-slot-item');
    Route::post('/machines/slots/item/edit/{slotId}', [SellerController::class, 'slots'])->name('update-slot-item');
    Route::post('/machines/slots/item/delete/{slotId}', [SellerController::class, 'deleteSlotItem'])->name('delete-slot-item');

});
