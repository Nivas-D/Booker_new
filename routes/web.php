<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\MainserviceController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\FreelancerController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OtherController;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LanguageTranslationController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\BusinessController;

Route::get('/', [PageController::class, 'home'])->name('public.home');
Route::get('home', [PageController::class, 'home'])->name('public.home');
Route::get('about', [PageController::class, 'about'])->name('public.about');
Route::get('faq', [PageController::class, 'faq'])->name('public.faq');
Route::get('categories', [PageController::class, 'categories'])->name('public.categories');
Route::get('industries', [PageController::class, 'industries'])->name('public.industries');
Route::get('business/login', [BusinessController::class, 'login'])->name('business.login');
Route::resource('business', BusinessController::class)->names([
        'index' => 'business.index',
    ]);

Route::get('book-now/{id}', [PageController::class, 'book_now'])->name('booking.book_now');
Route::get('bookcategory/{id}', [PageController::class, 'bookcategory'])->name('booking.bookcategory');
Route::get('book-appointment/{id}', [PageController::class, 'book_appointment'])->name('booking.book_appointment');
Route::get('products', [PageController::class, 'products'])->name('public.products');
Route::get('services', [PageController::class, 'services'])->name('public.services');
Route::get('contact', [PageController::class, 'contact'])->name('public.contact');
Route::post('contact/post', [PageController::class, 'contactAction'])->name('public.contactpost');
// Route::get('faq', [PageController::class, 'faq'])->name('public.faq');
Route::get('booking-personal-info', [PageController::class, 'booking_personal_info'])->name('booking.booking_personal_info');
Route::get('checkout', [PageController::class, 'checkout'])->name('booking.checkout');
Route::get('order-confirmation', [PageController::class, 'order_confirmation'])->name('booking.order_confirmation');
Route::get('create-stripe-intent', [PageController::class, 'create_stripe_intent'])->name('create-stripe-intent');
Route::post('create-order', [PageController::class, 'create_order'])->name('create-order');
// Route::get('stripe-return-url', [PageController::class, 'stripe_return_url'])->name('stripe-return-url');
Route::post('add-to-cart', [PageController::class, 'add_to_cart'])->name('add-to-cart');
Route::get('remove-cart-item/{id}', [PageController::class, 'remove_cart_item'])->name('remove_cart_item');
//Route::get('/', 'Auth\LoginController@showLoginForm')->name('welcome');
Route::post('/get_collaboratera', [PageController::class, 'get_collaboratera'])->name('get-collaboratera');
Route::post('get_appointment', [PageController::class, 'get_appointment'])->name('get-appointment');

Route::group(['middleware' => ['auth','roles:user']], function () {
    // Route::get('book-now/{id}', [PageController::class, 'book_now'])->name('booking.book_now');
    // Route::get('bookcategory/{id}', [PageController::class, 'bookcategory'])->name('booking.bookcategory');
    // Route::get('book-appointment/{id}', [PageController::class, 'book_appointment'])->name('booking.book_appointment');
    // Route::get('products', [PageController::class, 'products'])->name('public.products');
    // Route::get('services', [PageController::class, 'services'])->name('public.services');
    // Route::get('contact', [PageController::class, 'contact'])->name('public.contact');
    // Route::post('contact/post', [PageController::class, 'contactAction'])->name('public.contactpost');
    // // Route::get('faq', [PageController::class, 'faq'])->name('public.faq');
    // Route::get('booking-personal-info', [PageController::class, 'booking_personal_info'])->name('booking.booking_personal_info');
    // Route::get('checkout', [PageController::class, 'checkout'])->name('booking.checkout');
    // Route::get('order-confirmation', [PageController::class, 'order_confirmation'])->name('booking.order_confirmation');
    // Route::get('create-stripe-intent', [PageController::class, 'create_stripe_intent'])->name('create-stripe-intent');
    // Route::post('create-order', [PageController::class, 'create_order'])->name('create-order');
    // // Route::get('stripe-return-url', [PageController::class, 'stripe_return_url'])->name('stripe-return-url');
    // Route::post('add-to-cart', [PageController::class, 'add_to_cart'])->name('add-to-cart');
    // Route::get('remove-cart-item/{id}', [PageController::class, 'remove_cart_item'])->name('remove_cart_item');
    // //Route::get('/', 'Auth\LoginController@showLoginForm')->name('welcome');
    // Route::post('/get_collaboratera', [PageController::class, 'get_collaboratera'])->name('get-collaboratera');
    // Route::post('get_appointment', [PageController::class, 'get_appointment'])->name('get-appointment');
});


Route::post('check-valid-email', [PageController::class, 'check_valid_email'])->name('check-valid-email');
Route::post('send-resetpassword-email', [PageController::class, 'send_resetpassword_email'])->name('send-resetpassword-email');
Route::get('reset-password-email/{id}', [PageController::class, 'reset_password_email'])->name('reset-password-email');
Route::post('reset-password-ajax', [PageController::class, 'reset_password_ajax'])->name('reset_password_ajax');


Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('admin/roles', RoleController::class);
    Route::resource('admin/permissions', PermissionsController::class);
    Route::resource('users', UserController::class);
    Route::get('home', [HomeController::class, 'index'])->name('home');
});

Route::group(config('translation.route_group_config') + ['namespace' => 'JoeDixon\\Translation\\Http\\Controllers'], function ($router) {
    $router->get(config('translation.ui_url'), [LanguageController::class, 'index'])->name('languages.index');
    $router->get(config('translation.ui_url').'/create', [LanguageController::class, 'create'])->name('languages.create'); //('lang/create', 'LanguageController@create')->name('lang.create');
    $router->post(config('translation.ui_url'), [LanguageController::class, 'store'])->name('languages.store'); //'LanguageController@store')->name('languages.store');
    $router->get(config('translation.ui_url').'/{language}/translations', [LanguageTranslationController::class, 'index'])->name('languages.translations.index'); //'LanguageTranslationController@index')->name('languages.translations.index');
    $router->post(config('translation.ui_url').'/{language}', [LanguageTranslationController::class, 'update'])->name('languages.translations.update'); //'LanguageTranslationController@update')->name('languages.translations.update');
    $router->get(config('translation.ui_url').'/{language}/translations/create', [LanguageTranslationController::class, 'create'])->name('languages.translations.create'); //'LanguageTranslationController@create')->name('languages.translations.create');
    $router->post(config('translation.ui_url').'/{language}/translations', [LanguageTranslationController::class, 'store'])->name('languages.translations.store'); //'LanguageTranslationController@store')->name('languages.translations.store');
});

Route::get('lang/{locale}', [LocalizationController::class, 'lang'])->name('lang'); //'LocalizationController@lang');


Route::group(['middleware' => ['auth','roles:admin,superadmin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin/dashboard');
    Route::get('admin/contact-messages', [AdminController::class, 'contactMessages'])->name('admin.contactmessages');
    Route::post('admin/contact-messages', [AdminController::class, 'contactMessages'])->name('admin.contactmessages.post');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::resource('admin/categories', CategoryController::class);
    Route::post('admin/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::resource('admin/industries', IndustryController::class);
    Route::post('admin/industries', [IndustryController::class, 'index'])->name('industries.index');
    Route::post('admin/industries/store', [IndustryController::class, 'store'])->name('industries.store');
    Route::resource('admin/business',  App\Http\Controllers\Admin\BusinessController::class)->names([
        'index' => 'admin.business.index',
    ]);
    Route::post('admin/business/approve/{id}', [App\Http\Controllers\admin\BusinessController::class, 'approve'])->name('admin.business.approve');
    Route::post('admin/business', [App\Http\Controllers\Admin\BusinessController::class, 'index'])->name('admin.business.index');
    Route::resource('admin/products', ProductController::class);
    Route::post('admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('admin/product/orders', [App\Http\Controllers\Admin\ProductController::class, 'getProductOrders' ])->name('admin.product.orders');
    Route::post('admin/product/orders', [App\Http\Controllers\Admin\ProductController::class, 'getProductOrders' ])->name('admin.product.orders.post');
    Route::get('admin/product/order/{id}', [App\Http\Controllers\Admin\ProductController::class, 'showProductOrder' ])->name('admin.product.orders.show');
    Route::resource('admin/services', ServiceController::class);
    Route::resource('admin/main-services', MainserviceController::class);
    // Route::get('admin/main-services', [App\Http\Controllers\Admin\ServiceController::class , 'main_services'])->name('admin.main_services');
    Route::get('admin/service/bookings', [App\Http\Controllers\Admin\ServiceController::class, 'getServiceBookings' ])->name('admin.service.bookings');
    Route::post('admin/service/bookings', [App\Http\Controllers\Admin\ServiceController::class, 'getServiceBookings' ])->name('admin.service.bookings.post');
    Route::get('admin/category/service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'showServicesOfCategory' ])->name('admin.service.category');
    Route::post('admin/category/service/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'showServicesOfCategory' ])->name('admin.service.category.post');
    Route::resource('admin/employees', EmployeeController::class);
    Route::post('admin/employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::resource('admin/freelancers', FreelancerController::class);
    Route::post('admin/freelancers', [FreelancerController::class, 'index'])->name('admin.freelancers.index');
    Route::resource('admin/plans', PlanController::class);
    Route::post('admin/plans', [PlanController::class, 'index'])->name('admin.plans.index');
    Route::resource('admin/orders', OrderController::class);
    Route::resource('admin/inventory', InventoryController::class);
    Route::post('admin/inventory', [InventoryController::class, 'index'])->name('inventory.index');    
});
Route::group(['middleware' => ['auth','roles:owner,business']], function () {    
    Route::get('owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner/dashboard');
    Route::get('owner/profile', [OwnerController::class, 'profile'])->name('owner.profile');
    Route::resource('owner/products', App\Http\Controllers\Owner\ProductController::class, ['as' => 'owner']);
    Route::get('owner/product/orders', [App\Http\Controllers\Owner\ProductController::class, 'getProductOrders' ])->name('owner.product.orders');
    Route::get('owner/product/order/{id}', [App\Http\Controllers\Owner\ProductController::class, 'showProductOrder' ])->name('owner.product.orders.show');
    Route::resource('owner/services', App\Http\Controllers\Owner\ServiceController::class, ['as' => 'owner']);
    Route::get('owner/service/bookings', [App\Http\Controllers\Owner\ServiceController::class, 'getServiceBookings' ])->name('owner.service.bookings');
    Route::get('owner/service/booking/{id}', [App\Http\Controllers\Owner\ServiceController::class, 'showServiceBooking' ])->name('owner.service.bookings.show');
    Route::resource('owner/employees', App\Http\Controllers\Owner\EmployeeController::class, ['as' => 'owner']);
    Route::get('owner/employee/assign/{id}', [App\Http\Controllers\Owner\EmployeeController::class, 'assignToService'])->name('owner.employee.assign');
    Route::post('owner/employee/assign', [App\Http\Controllers\Owner\EmployeeController::class, 'assignToServiceAction'])->name('owner.employee.assign.p');
    Route::resource('owner/freelancers', App\Http\Controllers\Owner\FreelancerController::class, ['as' => 'owner']);
    Route::get('owner/freelancer/assign/{id}', [App\Http\Controllers\Owner\FreelancerController::class, 'assignToService'])->name('owner.freelancer.assign');
    Route::post('owner/freelancer/assign', [App\Http\Controllers\Owner\FreelancerController::class, 'assignToServiceAction'])->name('owner.freelancer.assign-p');
    Route::resource('owner/orders', App\Http\Controllers\Owner\OrderController::class, ['as' => 'owner']);
    Route::resource('owner/inventory', App\Http\Controllers\Owner\InventoryController::class, ['as' => 'owner']);
});


Route::group(['middleware' => ['auth','roles:user']], function () {    
    Route::get('user/dashboard', [UserController::class, 'dashboard'])->name('user/dashboard');
    Route::get('user/myorders/order/{id}', [UserController::class, 'myOrderDetails'])->name('user/myorders/order');
    Route::get('user/myservice/order', [UserController::class, 'myOrderServiceDetails'])->name('user/myservice/order');
     Route::post('user/dashboard/general', [UserController::class, 'updateUserGeneralDetails'])->name('user/general/update');
});   

Route::group([], function () {
    //Route::get('user/dashboard', [UserController::class, 'dashboard'])->name('user/dashboard');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::resource('user/products', App\Http\Controllers\User\ProductController::class, ['as' => 'user']);
    Route::get('user/product/buy/{id}', [App\Http\Controllers\User\ProductController::class, 'buyProduct' ])->name('user.product.buy');
    Route::post('user/product/checkout', [App\Http\Controllers\User\ProductController::class, 'checkout' ])->name('user.product.checkout');
    Route::get('user/product/orders', [App\Http\Controllers\User\ProductController::class, 'getProductOrders' ])->name('user.product.orders');
    Route::get('user/product/order/{id}', [App\Http\Controllers\User\ProductController::class, 'showProductOrder' ])->name('user.product.orders.show');
    Route::resource('user/services', App\Http\Controllers\User\ServiceController::class, ['as' => 'user']);
    Route::get('user/service/book/{id}', [App\Http\Controllers\User\ServiceController::class, 'bookService' ])->name('user.service.book');
    Route::post('user/service/checkout', [App\Http\Controllers\User\ServiceController::class, 'checkout' ])->name('user.service.checkout');
    Route::get('user/service/bookings', [App\Http\Controllers\User\ServiceController::class, 'getServiceBookings' ])->name('user.service.bookings');
    Route::get('user/service/booking/{id}', [App\Http\Controllers\User\ServiceController::class, 'showServiceBooking' ])->name('user.service.bookings.show');
});
