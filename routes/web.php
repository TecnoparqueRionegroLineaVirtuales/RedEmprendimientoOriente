<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\productsPersonalizedController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\menssajeController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\routesController;
use App\Http\Controllers\personaldataController;


//rutas inicio
Route::get('/', [LandingController::class, 'welcome'])->name('/');
Route::get('/welcome', [LandingController::class, 'welcome'])->name('welcome');

//rutas app
Route::get('/app', [LandingController::class, 'app'])->name('app');

//rutas galeria
Route::get('/gallery', [LandingController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{id}', [LandingController::class, 'viewGallery'])->name('viewGallery');


//rutas artistas
Route::get('/Entrepreneur', [LandingController::class, 'viewEntrepreneur'])->name('entrepreneur');

//ruta tienda
Route::get('/storeUser', [LandingController::class, 'store'])->name('storeUser');
Route::get('/product/{id}', [LandingController::class, 'viewProduct'])->name('viewProduct');
Route::get('/buysPersonalized', [productsPersonalizedController::class, 'personalized'])->name('buysPersonalized');
Route::post('/buysPersonalized', [productsPersonalizedController::class, 'store'])->name('buysPersonalized.store');

// Rutas del carrito
Route::get('/cart', [CartController::class, 'viewCart'])->name('viewCart');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('addToCart');
Route::put('/cart/update/{product}', [CartController::class, 'updateCart'])->name('updateCart');
Route::delete('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/response', [CartController::class, 'handlePayuResponse'])->name('response');
Route::post('/handle-payment', [CartController::class, 'handlePayment'])->name('handlePayment');
Route::post('/showWhatsAppContactForm', [CartController::class, 'showWhatsAppContactForm'])->name('showWhatsAppContactForm');

//Ruta de mensaje
Route::post('/contacto', [menssajeController::class, 'store'])->name('contacto.store');
Route::get('/contactoIndex', [menssajeController::class, 'index'])->name('contacto.index');


//Ruta de rutas
Route::get('indexLanding', [routesController::class, 'indexLanding'])->name('indexLanding');
Route::get('/routes/{id}', [routesController::class, 'show'])->name('routes.show');

//ruta info
Route::get('/info', [LandingController::class, 'info'])->name('info');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    
    //rutas de contenido gallery and images
    Route::get('/galleryAdmin', [GalleryController::class, 'gallery'])->name('galleryAdmin');
    Route::get('/imageRegister', [GalleryController::class, 'imageRegister'])->name('imageRegister');
    Route::get('/galleryRegister', [GalleryController::class, 'galleryRegister'])->name('galleryRegister');
    Route::post('/galleryStore', [GalleryController::class, 'galleryStore'])->name('galleryStore');
    Route::post('/imageStore', [GalleryController::class, 'imageStore'])->name('imageStore');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('galleryEdit');
    Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('galleryUpdate');
    Route::delete('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('galleryDelete');
    Route::post('/gallery/toggle-status/{id}', [GalleryController::class, 'toggleStatus'])->name('galleryToggleStatus');
    Route::get('/toggle-image-status/{id}', [GalleryController::class, 'toggleImageStatus'])->name('toggleImageStatus');
    Route::get('/edit-image/{id}', [GalleryController::class, 'editImage'])->name('editImage');
    Route::put('/update-image/{id}', [GalleryController::class, 'updateImage'])->name('updateImage'); // Añade esta línea
    Route::delete('/destroy-image/{id}', [GalleryController::class, 'destroyImage'])->name('destroyImage');

    //rutas de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('usersIndex');
    Route::post('/users/make-entrepreneur/{id}', [UserController::class, 'makeEntrepreneur'])->name('usersMakeEntrepreneur');
    Route::post('/users/make-user/{id}', [UserController::class, 'makeUser'])->name('usersMakeUser');

   // Rutas tienda
    Route::get('/storeNav', [StoreController::class, 'storeNav'])->name('storeNav');
    Route::get('/store', [StoreController::class, 'store'])->name('store');
    Route::get('/registerProduct', [StoreController::class, 'registerProduct'])->name('registerProduct');
    Route::post('/productStore', [StoreController::class, 'productStore'])->name('productStore');
    Route::get('/product/edit/{id}', [StoreController::class, 'editProduct'])->name('products.edit');
    Route::put('/product/update/{id}', [StoreController::class, 'updateProduct'])->name('products.update');
    Route::delete('/product/delete/{id}', [StoreController::class, 'destroyProduct'])->name('products.destroy');
    Route::post('/product/toggle-status/{id}', [StoreController::class, 'toggleProductStatus'])->name('products.toggleStatus');
    Route::get('/orders', [StoreController::class, 'showOrders'])->name('orders');
    Route::get('/bill/{id}', [StoreController::class, 'showBill'])->name('bill.show');
    Route::get('/orders-product', [productsPersonalizedController::class, 'index'])->name('orders.product.index');
    Route::get('/toggle-status/{id}', [ProductsPersonalizedController::class, 'toggleStatus'])->name('toggle.status');
    
    // Rutas mensajes
    Route::get('/indexMessage', [menssajeController::class, 'indexMenssage'])->name('indexMessage');
    Route::delete('/message/delete/{id}', [menssajeController::class, 'destroy'])->name('message.destroy');


    // Rutas de rutas
    Route::get('indexRoute', [routesController::class, 'index'])->name('indexRoute');
    Route::get('registerRoute', [routesController::class, 'registerRoute'])->name('registerRoute');
    Route::post('storeRoute', [routesController::class, 'store'])->name('storeRoute');
    Route::delete('/route/delete/{id}', [routesController::class, 'destroy'])->name('route.destroy');
    Route::post('/route/toggle-status/{id}', [routesController::class, 'toggleStatus'])->name('routeToggleStatus');
    Route::get('/route/edit/{id}', [routesController::class, 'edit'])->name('route.edit');
    Route::put('/route/update/{id}', [routesController::class, 'updateRoute'])->name('route.update');

    // Rutas actualizar datos
    Route::get('/personal/edit/{id}', [personaldataController::class, 'edit'])->name('personal.edit');
    Route::put('/personal/update/{id}', [personaldataController::class, 'update'])->name('personal.update');
});
