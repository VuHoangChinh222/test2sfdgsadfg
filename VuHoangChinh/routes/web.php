<?php

use Illuminate\Support\Facades\Route;
//Controller User
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController as SanPhamController;
use App\Http\Controllers\frontend\ContactController as LienHeController;
use App\Http\Controllers\frontend\CartController ;
use App\Http\Controllers\frontend\PostController  as BaiVietController;
use App\Http\Controllers\frontend\SearchController;

//Controller Admin
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\MigrationController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\MenuController;

use App\Http\Controllers\AuthController;


//route site
Route::get('/',[HomeController::class,'index'])->name('site.home');
Route::get('san-pham',[SanPhamController::class,'index'])->name('site.product');
Route::get('danh-muc/{slug}',[SanPhamController::class,'category'])->name('site.product.category');
Route::get('chi-tiet-san-pham/{slug}',[SanPhamController::class,'detail'])->name('site.product.detail');
Route::get('tim-kiem-san-pham',[SanPhamController::class,'search'])->name('site.product.search');
Route::get('thuong-hieu/{slug}',[SanPhamController::class,'brand'])->name('site.product.brand');
Route::get('loc-san-pham',[SanPhamController::class,'filter'])->name('site.product.filter');
Route::get('thuong-hieu-loc-san-pham/{slug}',[SanPhamController::class,'brandFilter'])->name('site.product.brandFilter');
Route::get('danh-muc-loc-san-pham/{slug}',[SanPhamController::class,'categoryFilter'])->name('site.product.categoryFilter');


Route::get('tim-kiem',[SearchController::class,'index'])->name('site.search');
Route::get('ket-qua-tim-kiem',[SearchController::class,'search'])->name('site.search.search');


Route::get('lien-he',[LienHeController::class,'index'])->name('site.contact');
Route::post('lien-he',[LienHeController::class,'create'])->name('site.contact.create');

//Cart 
Route::get('cart/addCart',[CartController::class,'addCart'])->name('site.cart.addCart');
Route::get('gio-hang',[CartController::class,'index'])->name('site.cart.index');
Route::post('cart/update',[CartController::class,'update'])->name('site.cart.update');
Route::get('cart/delete/{id}',[CartController::class,'delete'])->name('site.cart.delete');
Route::get('thanh-toan',[CartController::class,'checkout'])->name('site.cart.checkout');
Route::post('thong-bao',[CartController::class,'docheckout'])->name('site.cart.docheckout');


//Post new
Route::get('posts/{slug}',[BaiVietController::class,'index'])->name('site.post.index');
Route::get('chi-tiet-bai-viet/{slug}',[BaiVietController::class,'detail'])->name('site.post.detail');
Route::get('trang-don/{slug}',[BaiVietController::class,'page'])->name('site.post.page');

//About us
Route::get('ve-chung-toi',[AboutUsController::class,'index'])->name('site.aboutus');


//Dang nhap
Route::get('dang-nhap',[AuthController::class,'getLogin'])->name('website.getLogin');
Route::post('dang-nhap',[AuthController::class,'doLogin'])->name('website.doLogin');
Route::get('dang-xuat',[AuthController::class,'doLogout'])->name('website.doLogout');
Route::get('dang-ky',[AuthController::class,'getRegister'])->name('website.getRegister');
Route::post('dang-ky',[AuthController::class,'doRegister'])->name('website.doRegister');




//route admin
Route::prefix('admin')->middleware("middleauth")->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard.index');

    // 1.Banner
    Route::prefix("banner")->group(function(){
        Route::get('/',[BannerController::class,'index'])->name('admin.banner.index');
        Route::get('trash',[BannerController::class,'trash'])->name('admin.banner.trash');//r
        Route::get('show/{id}',[BannerController::class,'show'])->name('admin.banner.show');//r
        Route::get('create',[BannerController::class,'create'])->name('admin.banner.create');//form them
        Route::post('store',[BannerController::class,'store'])->name('admin.banner.store');//xu li them//c
        Route::get('edit/{id}',[BannerController::class,'edit'])->name('admin.banner.edit');//form them
        Route::put('update/{id}',[BannerController::class,'update'])->name('admin.banner.update');//xu li them//u
        Route::get('status/{id}',[BannerController::class,'status'])->name('admin.banner.status');//cap nhat status1-2,2-1
        Route::get('delete/{id}',[BannerController::class,'delete'])->name('admin.banner.delete');//cap nhat status=0
        Route::get('restore/{id}',[BannerController::class,'restore'])->name('admin.banner.restore');//cap nhat status=2
        Route::delete('destroy/{id}',[BannerController::class,'destroy'])->name('admin.banner.destroy');//xu li them//d curo
    });


    //2.brand
    Route::prefix("brand")->group(function(){
        Route::get('/',[BrandController::class,'index'])->name('admin.brand.index');
        Route::get('trash',[BrandController::class,'trash'])->name('admin.brand.trash');//r
        Route::get('show/{id}',[BrandController::class,'show'])->name('admin.brand.show');//r
        Route::get('create',[BrandController::class,'create'])->name('admin.brand.create');//form them
        Route::post('store',[BrandController::class,'store'])->name('admin.brand.store');//xu li them//c
        Route::get('edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');//form them
        Route::put('update/{id}',[BrandController::class,'update'])->name('admin.brand.update');//xu li them//u
        Route::get('status/{id}',[BrandController::class,'status'])->name('admin.brand.status');//cap nhat status1-2,2-1
        Route::get('delete/{id}',[BrandController::class,'delete'])->name('admin.brand.delete');//cap nhat status=0
        Route::get('restore/{id}',[BrandController::class,'restore'])->name('admin.brand.restore');//cap nhat status=2
        Route::delete('destroy/{id}',[BrandController::class,'destroy'])->name('admin.brand.destroy');//xu li them//d curo
    });

    // 3.Category
    Route::prefix("category")->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('trash',[CategoryController::class,'trash'])->name('admin.category.trash');//r
        Route::get('show/{id}',[CategoryController::class,'show'])->name('admin.category.show');//r
        Route::get('create',[CategoryController::class,'create'])->name('admin.category.create');//form them
        Route::post('store',[CategoryController::class,'store'])->name('admin.category.store');//xu li them//c
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');//form them
        Route::put('update/{id}',[CategoryController::class,'update'])->name('admin.category.update');//xu li them//u
        Route::get('status/{id}',[CategoryController::class,'status'])->name('admin.category.status');//cap nhat status1-2,2-1
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');//cap nhat status=0
        Route::get('restore/{id}',[CategoryController::class,'restore'])->name('admin.category.restore');//cap nhat status=2
        Route::delete('destroy/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');//xu li them//d curo
    });

    //4.Contact
    Route::prefix("contact")->group(function(){
        Route::get('/',[ContactController::class,'index'])->name('admin.contact.index');
        Route::get('trash',[ContactController::class,'trash'])->name('admin.contact.trash');//r
        Route::get('show/{id}',[ContactController::class,'show'])->name('admin.contact.show');//r
        Route::get('create',[ContactController::class,'create'])->name('admin.contact.create');//form them
        Route::post('store',[ContactController::class,'store'])->name('admin.contact.store');//xu li them//c
        Route::get('edit/{id}',[ContactController::class,'edit'])->name('admin.contact.edit');//form them
        Route::put('update/{id}',[ContactController::class,'update'])->name('admin.contact.update');//xu li them//u
        Route::get('status/{id}',[ContactController::class,'status'])->name('admin.contact.status');//cap nhat status1-2,2-1
        Route::get('delete/{id}',[ContactController::class,'delete'])->name('admin.contact.delete');//cap nhat status=0
        Route::get('restore/{id}',[ContactController::class,'restore'])->name('admin.contact.restore');//cap nhat status=2
        Route::delete('destroy/{id}',[ContactController::class,'destroy'])->name('admin.contact.destroy');//xu li them//d curo
    });

    // 5. Migrations
    Route::prefix('migration')->group(function(){
        Route::get('/',[MigrationController::class,'index'])->name('admin.migration.index');
        Route::get('trash',[MigrationController::class,'trash'])->name('admin.migration.trash');
        Route::get('show/{id}',[MigrationController::class,'show'])->name('admin.migration.show');
        Route::get('create',[MigrationController::class,'create'])->name('admin.migration.create');
        Route::get('store',[MigrationController::class,'store'])->name('admin.migration.store');
        Route::get('edit/{id}',[MigrationController::class,'edit'])->name('admin.migration.edit');
        Route::get('update',[MigrationController::class,'update'])->name('admin.migration.update');
        Route::get('status/{id}',[MigrationController::class,'status'])->name('admin.migration.status');//Cap nhat status 1-2,2-1
        Route::get('delete/{id}',[MigrationController::class,'delete'])->name('admin.migration.delete');//Cap nhat status =0
        Route::get('destroy/{id}',[MigrationController::class,'destroy'])->name('admin.migration.destroy');
    });

    

    //6.Order
    Route::prefix("order")->group(function(){
        Route::get('/',[OrderController::class,'index'])->name('admin.order.index');
        Route::get('trash',[OrderController::class,'trash'])->name('admin.order.trash');//r
        Route::get('show/{id}',[OrderController::class,'show'])->name('admin.order.show');//r
        Route::get('edit/{id}',[OrderController::class,'edit'])->name('admin.order.edit');//form them
        Route::put('update/{id}',[OrderController::class,'update'])->name('admin.order.update');//xu li them//u
        Route::get('status/{id}',[OrderController::class,'status'])->name('admin.order.status');//cap nhat status1-2,2-1
        Route::get('delete/{id}',[OrderController::class,'delete'])->name('admin.order.delete');//cap nhat status=0
        Route::get('restore/{id}',[OrderController::class,'restore'])->name('admin.order.restore');//cap nhat status=2
        Route::delete('destroy/{id}',[OrderController::class,'destroy'])->name('admin.order.destroy');//xu li them//d curo

    });


    //7.post
    Route::prefix("post")->group(function(){
        Route::get('/',[PostController::class,'index'])->name('admin.post.index');
        Route::get('trash',[PostController::class,'trash'])->name('admin.post.trash');//r
        Route::get('show/{id}',[PostController::class,'show'])->name('admin.post.show');//r
        
        Route::get('create',[PostController::class,'create'])->name('admin.post.create');//form them
        Route::post('store',[PostController::class,'store'])->name('admin.post.store');//xu li them//c
        
        Route::get('edit/{id}',[PostController::class,'edit'])->name('admin.post.edit');//form them
        Route::put('update/{id}',[PostController::class,'update'])->name('admin.post.update');//xu li them//u
        
        Route::get('status/{id}',[PostController::class,'status'])->name('admin.post.status');//cap nhat status1-2,2-1
        Route::get('delete/{id}',[PostController::class,'delete'])->name('admin.post.delete');//cap nhat status=0
        Route::get('restore/{id}',[PostController::class,'restore'])->name('admin.post.restore');//cap nhat status=2
        
        Route::delete('destroy/{id}',[PostController::class,'destroy'])->name('admin.post.destroy');//xu li them//d curo

    });

    // 8.Product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('trash', [ProductController::class, 'trash'])->name('admin.product.trash');
        Route::get('them', [ProductController::class, 'them'])->name('admin.product.them');
        Route::get('show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('status/{id}', [ProductController::class, 'status'])->name('admin.product.status');
        Route::get('restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    });

    // 9.Topic
        Route::prefix("topic")->group(function(){
        Route::get('/',[TopicController::class,'index'])->name('admin.topic.index');
        Route::get('trash',[TopicController::class,'trash'])->name('admin.topic.trash');
        Route::get('show/{id}',[TopicController::class,'show'])->name('admin.topic.show');
        Route::get('create',[TopicController::class,'create'])->name('admin.topic.create');//form them
        Route::post('store',[TopicController::class,'store'])->name('admin.topic.store');//xu ly them
        Route::get('edit/{id}',[TopicController::class,'edit'])->name('admin.topic.edit');//form cap nhat
        Route::put('update/{id}',[TopicController::class,'update'])->name('admin.topic.update');//xu ly cap nhat
        Route::get('status/{id}',[TopicController::class,'status'])->name('admin.topic.status');//1->2, 2->1
        Route::get('delete/{id}',[TopicController::class,'delete'])->name('admin.topic.delete');//=0
        Route::get('restore/{id}',[TopicController::class,'restore'])->name('admin.topic.restore');//
        Route::delete('destroy/{id}',[TopicController::class,'destroy'])->name('admin.topic.destroy');
    });

    // 10.User
    Route::prefix("user")->group(function(){
        Route::get('/',[UserController::class,'index'])->name('admin.user.index');
        Route::get('trash',[UserController::class,'trash'])->name('admin.user.trash');
        Route::get('show/{id}',[UserController::class,'show'])->name('admin.user.show');
        Route::get('create',[UserController::class,'create'])->name('admin.user.create');//form them
        Route::post('store',[UserController::class,'store'])->name('admin.user.store');
        Route::get('edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
        Route::put('update/{id}',[UserController::class,'update'])->name('admin.user.update');
        Route::get('status/{id}',[UserController::class,'status'])->name('admin.user.status');
        Route::get('delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');
        Route::get('restore/{id}',[UserController::class,'restore'])->name('admin.user.restore');
        Route::delete('destroy/{id}',[UserController::class,'destroy'])->name('admin.user.destroy');
    });

    //11.Menu
    Route::prefix("menu")->group(function(){
        Route::get('/',[MenuController::class,'index'])->name('admin.menu.index');
        Route::get('trash',[MenuController::class,'trash'])->name('admin.menu.trash');//r
        Route::get('show/{id}',[MenuController::class,'show'])->name('admin.menu.show');//r
        
        Route::get('create',[MenuController::class,'create'])->name('admin.menu.create');//form them
        Route::post('store',[MenuController::class,'store'])->name('admin.menu.store');//xu li them//c
        Route::get('edit/{id}',[MenuController::class,'edit'])->name('admin.menu.edit');//form them
        Route::put('update/{id}',[MenuController::class,'update'])->name('admin.menu.update');//xu li them//u
        Route::get('status/{id}',[MenuController::class,'status'])->name('admin.menu.status');//cap nhat status1-2,2-1
        Route::get('delete/{id}',[MenuController::class,'delete'])->name('admin.menu.delete');//cap nhat status=0
        Route::get('restore/{id}',[MenuController::class,'restore'])->name('admin.menu.restore');//cap nhat status=2
        Route::delete('destroy/{id}',[MenuController::class,'destroy'])->name('admin.menu.destroy');//xu li them//d curo

    });
});