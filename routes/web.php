<?php

use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\UserController as NguoiDungController;
use App\Http\Controllers\frontend\HomeController;
// use App\Http\Controllers\SearchController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
// use App\Http\Controllers\frontend\CategoryController as DanhmucController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\PostController as BaiVietController;
use App\Http\Controllers\frontend\FilterProductsController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\OrderController as DonhangController;
use App\Http\Controllers\frontend\AddressController;
use App\Http\Controllers\frontend\CheckoutController;

use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\MyAccount;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\components\PolicyController;

use App\Http\Controllers\AuthController;





//backend
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\InformationController;
use App\Http\Controllers\backend\WarningController;
use App\Http\Controllers\backend\ImportantController;



Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('product', [SanPhamController::class, 'index'])->name('product');
Route::get('product_detail', [SanPhamController::class, 'product_detail'])->name('product_detail');

Route::get('my_account', [MyAccount::class, 'index'])->name('my_account');

Route::middleware('auth')->group(function () {
    Route::get('wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist');
    Route::post('wishlist/add/{id}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::post('wishlist/update', [WishlistController::class, 'updateQuantity'])->name('wishlist.update');
});

Route::get('post', [BaiVietController::class, 'index'])->name('post');

Route::get('product_news', [SanPhamController::class, 'product_news'])->name('product_news');
Route::get('post_news', [BaiVietController::class, 'post_news'])->name('post_news');

Route::get('product_sale', [SanPhamController::class, 'product_sale'])->name('product_sale');

Route::get('/product/{id}', [SanPhamController::class, 'product_detail'])->name('product_detail');
Route::get('/post/{id}', [BaiVietController::class, 'post_detail'])->name('post_detail');

Route::get('category/{id}/products', [SanphamController::class, 'productsByCategory'])
    ->name('category.products');
Route::get('brand/{id}/products', [SanPhamController::class, 'productsByBrand'])
    ->name('brand.products');
Route::get('topic/{id}/posts', [BaiVietController::class, 'postsByTopic'])
    ->name('topic.posts');
    
Route::get('/filtered_products', [HomeController::class, 'filtered_products'])->name('filtered_products');

// Route để hiển thị trang đăng ký
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Route để xử lý đăng ký
Route::post('/register', [RegisterController::class, 'register']);

//đăng nhập/xuất
Route::get('login', [AuthController::class, 'getlogin'])->name('login');
Route::post('login', [AuthController::class, 'dologin'])->name('website.dologin');
Route::get('logout', [AuthController::class, 'logout'])->name('website.logout');

Route::get('/my_account', [AuthController::class, 'showAccountDetails'])->name('my_account')->middleware('auth');
Route::put('/my_account/update', [AuthController::class, 'updateAccount'])->name('account_update')->middleware('auth');
Route::post('/my_account/change-password', [AuthController::class, 'changePassword'])->name('account_changePassword')->middleware('auth');
Route::get('/password-changed', function () {return view('frontend.password_changed');})->name('password.changed');

//giỏ hàng
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/buy-now/{product}', [DonhangController::class, 'buyNow'])->name('buy.now');
Route::get('/checkout-cart', [DonhangController::class, 'checkoutCart'])->name('checkout_cart');
Route::post('/checkout/update-order', [OrderController::class, 'updateOrder'])->name('checkout.updateOrder');

Route::get('/checkout-now', [DonhangController::class, 'checkoutNow'])->name('checkout_now');
Route::post('/checkout/update-address', [DonhangController::class, 'updateAddressStatus'])->name('checkout.updateAddressStatus');
// Route::post('/checkout/order', [DonhangController::class, 'storeOrder'])->name('checkout.order');
Route::post('/checkout/update-order', [DonhangController::class, 'updateOrder'])->name('checkout.updateOrder');


Route::post('/checkout/add-address', [DonhangController::class, 'addAddress'])->name('checkout.addAddress');
Route::get('/checkout/districts', [DonhangController::class, 'getDistricts'])->name('checkout.Districts');
Route::get('/checkout/wards', [DonhangController::class, 'getWards'])->name('checkout.Wards');
// Route::post('/checkout/update-order', [DonhangController::class, 'updateOrder'])->name('checkout.updateOrder');
// Route để hiển thị trang thanh toán
// Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

// Route xử lý submit form checkout
// Route::post('/checkout', [DonHangController::class, 'docheckout'])->name('checkout.submit');
Route::get('/order/success/{orderId}', [CartController::class, 'orderSuccess'])->name('order.success');

// Mua ngay
// Route::post('/buy-now/{product}', [CartController::class, 'buyNow'])->name('buy.now');

// Route để hiển thị thông báo sau khi thanh toán thành công
Route::get('/checkout/message/{order_id}', [CartController::class, 'checkoutMessage'])
->name('frontend.checkout_message');

//search
Route::get('/search', [SearchController::class, 'search'])->name('search');

//liên hệ
Route::get('contact', [LienheController::class, 'index'])->name('contact.index');
Route::post('contact', [LienheController::class, 'store'])->middleware('auth')->name('contact.store');
Route::get('contact/showcontact', [LienheController::class, 'showcontact'])->name('contact.showcontact');


Route::get('about', [PolicyController::class, 'about'])->name('about');
Route::get('privacy-policy', [PolicyController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms', [PolicyController::class, 'terms'])->name('terms');
Route::get('payment-policy', [PolicyController::class, 'paymentPolicy'])->name('payment-policy');
Route::get('shipping-policy', [PolicyController::class, 'shippingPolicy'])->name('shipping-policy');
Route::get('return-policy', [PolicyController::class, 'returnPolicy'])->name('return-policy');

//BAKCEND
Route::prefix("admin")->middleware("middleauth")->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name("admin.dashboard.index");
    Route::get('contact', [ContactController::class, 'index'])->name("admin.contact.index");
    Route::get('information', [InformationController::class, 'index'])->name("admin.infomation.index");
    Route::get('warning', [WarningController::class, 'index'])->name("admin.warning.index");
    Route::get('important', [ImportantController::class, 'index'])->name("admin.important.index");

    Route::prefix("product")->group(function () {
        Route::get("/", [ProductController::class, "index"])->name("admin.product.index");
        Route::get("create", [ProductController::class, "create"])->name("admin.product.create");
        Route::get("trash", [ProductController::class, "trash"])->name("admin.product.trash");
        Route::post("store", [ProductController::class, "store"])->name("admin.product.store");
        Route::get("edit/{id}", [ProductController::class, "edit"])->name("admin.product.edit");
        Route::get("show/{id}", [ProductController::class, "show"])->name("admin.product.show");
        Route::put("update/{id}", [ProductController::class, "update"])->name("admin.product.update");
        Route::get("status/{id}", [ProductController::class, "status"])->name("admin.product.status");
        Route::get("delete/{id}", [ProductController::class, "delete"])->name("admin.product.delete");
        Route::get("restore/{id}", [ProductController::class, "restore"])->name("admin.product.restore");
        Route::delete("destroy/{id}", [ProductController::class, "destroy"])->name("admin.product.destroy");
    });
    Route::prefix("category")->group(function () {
        Route::get("/", [CategoryController::class, "index"])->name("admin.category.index");
        Route::get("create", [CategoryController::class, "create"])->name("admin.category.create");
        Route::get("trash", [CategoryController::class, "trash"])->name("admin.category.trash");
        Route::post("store", [CategoryController::class, "store"])->name("admin.category.store");
        Route::get("edit/{id}", [CategoryController::class, "edit"])->name("admin.category.edit");
        Route::get("show/{id}", [CategoryController::class, "show"])->name("admin.category.show");
        Route::put("update/{id}", [CategoryController::class, "update"])->name("admin.category.update");
        Route::get("status/{id}", [CategoryController::class, "status"])->name("admin.category.status");
        Route::get("delete/{id}", [CategoryController::class, "delete"])->name("admin.category.delete");
        Route::get("restore/{id}", [CategoryController::class, "restore"])->name("admin.category.restore");
        Route::delete("destroy/{id}", [CategoryController::class, "destroy"])->name("admin.category.destroy");
    });

    Route::prefix("brand")->group(function () {
        Route::get("/", [BrandController::class, "index"])->name("admin.brand.index");
        Route::get("trash", [BrandController::class, "trash"])->name("admin.brand.trash");
        Route::post("store", [BrandController::class, "store"])->name("admin.brand.store");
        Route::get("edit/{id}", [BrandController::class, "edit"])->name("admin.brand.edit");
        Route::get("show/{id}", [BrandController::class, "show"])->name("admin.brand.show");
        Route::put("update/{id}", [BrandController::class, "update"])->name("admin.brand.update");
        Route::get("status/{id}", [BrandController::class, "status"])->name("admin.brand.status");
        Route::get("delete/{id}", [BrandController::class, "delete"])->name("admin.brand.delete");
        Route::get("restore/{id}", [BrandController::class, "restore"])->name("admin.brand.restore");
        Route::delete("destroy/{id}", [BrandController::class, "destroy"])->name("admin.brand.destroy");
    });

    Route::prefix("post")->group(function () {
        Route::get("/", [PostController::class, "index"])->name("admin.post.index");
        Route::get("trash", [PostController::class, "trash"])->name("admin.post.trash");
        Route::post("store", [PostController::class, "store"])->name("admin.post.store");
        Route::get("edit/{id}", [PostController::class, "edit"])->name("admin.post.edit");
        Route::get("show/{id}", [PostController::class, "show"])->name("admin.post.show");
        Route::put("update/{id}", [PostController::class, "update"])->name("admin.post.update");
        Route::get("status/{id}", [PostController::class, "status"])->name("admin.post.status");
        Route::get("delete/{id}", [PostController::class, "delete"])->name("admin.post.delete");
        Route::get("restore/{id}", [PostController::class, "restore"])->name("admin.post.restore");
        Route::delete("destroy/{id}", [PostController::class, "destroy"])->name("admin.post.destroy");
    });

    Route::prefix("topic")->group(function () {
        Route::get("/", [TopicController::class, "index"])->name("admin.topic.index");
        Route::get("trash", [TopicController::class, "trash"])->name("admin.topic.trash");
        Route::post("store", [TopicController::class, "store"])->name("admin.topic.store");
        Route::get("edit/{id}", [TopicController::class, "edit"])->name("admin.topic.edit");
        Route::get("show/{id}", [TopicController::class, "show"])->name("admin.topic.show");
        Route::put("update/{id}", [TopicController::class, "update"])->name("admin.topic.update");
        Route::get("status/{id}", [TopicController::class, "status"])->name("admin.topic.status");
        Route::get("delete/{id}", [TopicController::class, "delete"])->name("admin.topic.delete");
        Route::get("restore/{id}", [TopicController::class, "restore"])->name("admin.topic.restore");
        Route::delete("destroy/{id}", [TopicController::class, "destroy"])->name("admin.topic.destroy");
    });

    Route::prefix("order")->group(function () {
        Route::get("/", [OrderController::class, "index"])->name("admin.order.index");
        Route::get("create", [OrderController::class, "create"])->name("admin.order.create");
        Route::get("trash", [OrderController::class, "trash"])->name("admin.order.trash");
        Route::post("store", [OrderController::class, "store"])->name("admin.order.store");
        Route::get("edit/{id}", [OrderController::class, "edit"])->name("admin.order.edit");
        Route::get("show/{id}", [OrderController::class, "show"])->name("admin.order.show");
        Route::put("update/{id}", [OrderController::class, "update"])->name("admin.order.update");
        Route::get("status/{id}", [OrderController::class, "status"])->name("admin.order.status");
        Route::get("delete/{id}", [OrderController::class, "delete"])->name("admin.order.delete");
        Route::get("restore/{id}", [OrderController::class, "restore"])->name("admin.order.restore");
        Route::delete("destroy/{id}", [OrderController::class, "destroy"])->name("admin.order.destroy");
    });

    Route::prefix("contact")->group(function () {
        Route::get("/", [ContactController::class, "index"])->name("admin.contact.index");
        Route::get("trash", [ContactController::class, "trash"])->name("admin.contact.trash");
        Route::get("edit/{id}", [ContactController::class, "edit"])->name("admin.contact.edit");
        Route::get("show/{id}", [ContactController::class, "show"])->name("admin.contact.show");
        Route::put("update/{id}", [OrderController::class, "update"])->name("admin.contact.update");
        Route::get("status/{id}", [ContactController::class, "status"])->name("admin.contact.status");
        Route::get("delete/{id}", [ContactController::class, "delete"])->name("admin.contact.delete");
        Route::get("restore/{id}", [ContactController::class, "restore"])->name("admin.contact.restore");
        Route::delete("destroy/{id}", [ContactController::class, "destroy"])->name("admin.contact.destroy");
    });

    Route::prefix("menu")->group(function () {
        Route::get("/", [MenuController::class, "index"])->name("admin.menu.index");
        Route::get("trash", [MenuController::class, "trash"])->name("admin.menu.trash");
        Route::post("store", [MenuController::class, "store"])->name("admin.menu.store");
        Route::get("edit/{id}", [MenuController::class, "edit"])->name("admin.menu.edit");
        Route::get("show/{id}", [MenuController::class, "show"])->name("admin.menu.show");
        Route::put("update/{id}", [MenuController::class, "update"])->name("admin.menu.update");
        Route::get("status/{id}", [MenuController::class, "status"])->name("admin.menu.status");
        Route::get("delete/{id}", [MenuController::class, "delete"])->name("admin.menu.delete");
        Route::get("restore/{id}", [MenuController::class, "restore"])->name("admin.menu.restore");
        Route::delete("destroy/{id}", [MenuController::class, "destroy"])->name("admin.menu.destroy");
    });

    Route::prefix("banner")->group(function () {
        Route::get("/", [BannerController::class, "index"])->name("admin.banner.index");
        Route::get("create", [BannerController::class, "create"])->name("admin.banner.create");
        Route::get("trash", [BannerController::class, "trash"])->name("admin.banner.trash");
        Route::post("store", [BannerController::class, "store"])->name("admin.banner.store");
        Route::get("edit/{id}", [BannerController::class, "edit"])->name("admin.banner.edit");
        Route::get("show/{id}", [BannerController::class, "show"])->name("admin.banner.show");
        Route::put("update/{id}", [BannerController::class, "update"])->name("admin.banner.update");
        Route::get("status/{id}", [BannerController::class, "status"])->name("admin.banner.status");
        Route::get("delete/{id}", [BannerController::class, "delete"])->name("admin.banner.delete");
        Route::get("restore/{id}", [BannerController::class, "restore"])->name("admin.banner.restore");
        Route::delete("destroy/{id}", [BannerController::class, "destroy"])->name("admin.banner.destroy");
    });

    Route::prefix("user")->group(function () {
        Route::get("/", [UserController::class, "index"])->name("admin.user.index");
        Route::get("create", [UserController::class, "create"])->name("admin.user.create");
        Route::get("trash", [UserController::class, "trash"])->name("admin.user.trash");
        Route::post("store", [UserController::class, "store"])->name("admin.user.store");
        Route::get("edit/{id}", [UserController::class, "edit"])->name("admin.user.edit");
        Route::get("show/{id}", [UserController::class, "show"])->name("admin.user.show");
        Route::put("update/{id}", [UserController::class, "update"])->name("admin.user.update");
        Route::get("status/{id}", [UserController::class, "status"])->name("admin.user.status");
        Route::get("delete/{id}", [UserController::class, "delete"])->name("admin.user.delete");
        Route::get("restore/{id}", [UserController::class, "restore"])->name("admin.user.restore");
        Route::delete("destroy/{id}", [UserController::class, "destroy"])->name("admin.user.destroy");
    });
});
