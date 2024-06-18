<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Components\Core\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

// Route::get('/admin/fhsdgfhsdghf', function () {
//     DB::table('admins')->insert([
//         'name' => 'LAUS',
//         'email' => 'email@email.com',
//         'password' => Hash::make('admin123'),
//         'phone' => '0862325011'
//     ]);
// });


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/net5s/login', 'Admin\LoginController@index')->name('ad.login.index');
Route::post('/net5s/login', 'Admin\LoginController@login')->name('ad.login');

Route::group(['prefix' => '/net5s', 'as' => 'ad.', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/refund_warehouse', 'DashboardController@refund_warehouse')->name('refund_warehouse');
    Route::get('/', 'DashboardController@index')->name('index');
    Route::resource('category', 'CategoryController')->except('show');
    Route::resource('blog', 'BlogController')->except('show');
    Route::resource('config', 'ConfigController')->except('show');
    Route::resource('cms', 'CmsController')->except('show');
    Route::resource('admin', 'AdminController')->except('show');
    Route::resource('user', 'UserController')->except('show');
    Route::resource('video', 'VideoController')->except('show');
    Route::get('user-type', 'UserController@type')->name('user.type');
    Route::resource('product', 'ProductController')->except('show');
    Route::resource('productcategory', 'ProductCategoryController');
    Route::get('pro-hot', 'ProductController@hot')->name('product.hot');
    Route::get('pro-sale1k', 'ProductController@sale1k')->name('product.sale1k');
    Route::get('pro-origin', 'ProductController@origin')->name('product.origin');
    Route::get('pro-display', 'ProductController@display')->name('product.display');
    Route::resource('banner', 'BannerController');
    Route::get('banner-display', 'BannerController@display')->name('banner.display');
    Route::resource('order', 'OrderController')->except('show', 'destroy');
    Route::get('order-update/{id}', 'OrderController@update_status')->name('order.update_status');
    Route::get('order-refund', 'OrderController@order_refund')->name('order.order_refund');
    Route::get('progress-update/{id}', 'OrderController@update_progress')->name('order.update_progress');
    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::get('order-delete/{id}', 'OrderController@deleteOrder')->name('order.deleteOrder');
    Route::get('order-refund/{id}', 'OrderController@refundOrder')->name('order.refundOrder');


    // Giao dịch
    Route::get('withdraw', 'PaymentController@withdraw')->name('payment.withdraw');
    Route::post('dropWithdraw/{id}', 'PaymentController@drop_withdraw')->name('payment.drop_withdraw');
    Route::post('confirmWithdraw/{id}', 'PaymentController@confirmWithdraw')->name('payment.confirmWithdraw');
    // Mua điểm
    Route::get('buy-point', 'PaymentController@buy_point')->name('payment.buy_point');
    Route::post('confirm-buy-point/{id}', 'PaymentController@confirm_buy_point')->name('payment.confirm_buy_point');

    Route::get('transaction', 'PaymentController@transaction')->name('payment.transaction');

    // Xuất Excel đơn hàng
    Route::get('exportOrder/{type}', 'OrderController@exportOrders')->name('exportOrder');
    Route::get('exportUser', 'UserController@exportUser')->name('exportUser');


    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => '/user', 'as' => 'us.', 'namespace' => 'User', 'middleware' => 'customerLogin'], function () {

    // Nhà SX Kinh Doanh
    Route::get('nha-san-xuat-kinh-doanh', 'AccountController@checkmember')->name('checkmember');
    Route::post('up-load-bill', 'AccountController@upload_bill')->name('upload_bill');
    // Thành Viên Kết Nối
    Route::get('thanh-vien-ket-noi', 'AccountController@memberconnect')->name('memberconnect');
    Route::post('up-load-bill-thanh-vien-ket-noi', 'AccountController@memberconnect_bill')->name('memberconnect_bill');
    // Đăng Ký Đại Diện
    Route::get('dang-ky-dai-dien', 'AccountController@represent')->name('represent');
    Route::post('up-load-bill-dang-ki-dai-dien', 'AccountController@represent_bill')->name('represent_bill');
    // Quỹ Phụ Nữ
    Route::get('quy-phu-nu-khoi-nghiep', 'AccountController@womenfund')->name('womenfund');
    Route::post('up-load-bill-quy-phu-nu-khoi-nghiep', 'AccountController@womenfund_bill')->name('womenfund_bill');
    // Quỹ Sản Xuất
    Route::get('quy-san-xuat-kinh-doanh', 'AccountController@manufacture')->name('manufacture');
    Route::post('up-load-bill-quy-san-xuat-kinh-doanh', 'AccountController@manufacture_bill')->name('manufacture_bill');
    // Giải Pháp Vay Vốn
    Route::get('giai-phap-vay-von', 'AccountController@loansolutions')->name('loansolutions');


    // Route::group(['prefix' => '/user', 'as' => 'us.', 'namespace' => 'User', 'middleware' => ['customerLogin', 'checkUserOrder']], function () {
    Route::resource('product', 'NhaSanXuatKinhDoanhController')->except('show');
    Route::resource('productcategory', 'ProductCategoryUserController');
    // });




    Route::group(['middleware'], function () {
        // Kích Hoạt
        Route::get('/active', 'HomeController@active')->name('activeuser');
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('profile', 'AccountController@profile')->name('account.profile');
        Route::post('profile', 'AccountController@profile_update')->name('account.profile_update');
        Route::get('profile-bank', 'AccountController@bank')->name('account.bank');
        Route::post('profile-bank', 'AccountController@bank_update')->name('account.bank_update');
        Route::get('change-password', 'AccountController@changepassword')->name('account.changepassword');
        Route::post('change-password', 'AccountController@change_password')->name('account.change_password');
        Route::get('don-hang', 'OrderController@index')->name('order.index');
        Route::get('order-update/{id}', 'OrderController@update_status')->name('order.update_status');
        Route::get('kho-tien-hoan-150', 'OrderController@warehouse')->name('order.warehouse');
        // Giao dịch
        Route::get('buy-point', 'PaymentController@buypoint')->name('payment.buypoint');
        Route::post('buy-point', 'PaymentController@buy_point')->name('payment.buy_point');
        Route::post('destroy-buy-point/{id}', 'PaymentController@destroy_transaction')->name('payment.destroy.transaction');
        Route::get('tranfer', 'PaymentController@tranfer')->name('payment.tranfer');
        Route::post('tranfer', 'PaymentController@tranfer_post')->name('payment.tranfer_post');
        Route::get('balance', 'PaymentController@get_balance')->name('payment.get_balance');
        Route::get('get-user', 'PaymentController@get_user')->name('payment.get_user');
        Route::get('history-transaction', 'PaymentController@history_transaction')->name('payment.history_transaction');
        //Rút tiền
        Route::get('withdraw', 'PaymentController@withdraw')->name('payment.withdraw')->middleware(['checkBankCustomer']);
        Route::post('withdraw', 'PaymentController@withdraw_post')->name('payment.withdraw_post')->middleware(['checkBankCustomer']);
        // Member
        Route::get('member', 'MemberController@member')->name('member');
        // Đăng Sản Phẩm


        // Đại lý
        Route::get('chon-goi-dai-ly', 'AccountController@agent')->name('account.agent');
        Route::post('buy-agent', 'AccountController@buy_agent')->name('account.buy_agent');
        Route::get('agent/checkout', 'AccountController@checkout_agent')->name('account.checkout_agent');
        Route::get('agent/reset-agent', 'AccountController@reset_agent')->name('account.reset_agent');
        Route::post('agent/store', 'AccountController@store')->name('account.store');

        // Mua sản phẩm
        Route::get('san-pham', 'ProductsController@index')->name('product.home');
        Route::get('san-pham', 'ProductsController@index')->name('product.home');
        Route::post('san-pham', 'ProductsController@add_to_cart')->name('product.add_to_cart');
        Route::get('san-pham-checkout', 'ProductsController@checkout')->name('product.checkout');
        Route::get('san-pham-reset', 'ProductsController@reset')->name('product.reset');
        Route::post('san-pham-thanh-toan', 'ProductsController@store')->name('product.thanhtoan');

        // KYC
        Route::get('kyc', 'AccountController@kyc')->name('account.kyc');
        Route::post('kyc', 'AccountController@post_kyc')->name('account.post_kyc');

        // Contact
        Route::get('contact', 'ContactController@index')->name('contact.index');
    });
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::get('/register', 'User\LoginController@register')->name('us.register');
Route::post('/user/store', 'User\LoginController@store')->name('us.register.store');

Route::get('login', 'User\LoginController@index')->name('us.login.index');
Route::post('login', 'User\LoginController@login')->name('us.login');

Route::get('quen-mat-khau', 'User\LoginController@forgotPass')->name('us.login.forgotPass');
Route::post('quen-mat-khau', 'User\LoginController@forgotPass_post')->name('us.login.post.forgotPass');


// Link contact
Route::get('/lien-he-voi-chung-toi', 'User\ContactController@contact_view')->name('us.contact_view');
Route::post('/lien-he-voi-chung-toi', 'User\ContactController@contact_post')->name('us.contact_post');



Route::group(['as' => 'w.', 'namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('cua-hang', 'ProductCategoryController@index')->name('productCategory.index');
    Route::get('danh-muc-san-pham/{slug}', 'ProductCategoryController@view')->name('productCategory.view');

    Route::get('san-pham/{slug}', 'ProductController@index')->name('product.index');

    Route::get('danh-muc-tin-tuc', 'BlogController@category')->name('blog.category');
    Route::get('tin-tuc/{slug}', 'BlogController@index')->name('blog.index');
    // Mua sản phẩm
    // Route::get('san-pham', 'ProductsController@index')->name('product.index');
    // Route::post('san-pham', 'ProductsController@add_to_cart')->name('product.add_to_cart');
    // Route::get('san-pham-checkout', 'ProductsController@checkout')->name('product.checkout');
    // Route::get('san-pham-reset', 'ProductsController@reset')->name('product.reset');
    // Route::post('san-pham-thanh-toan', 'ProductsController@store')->name('product.store');
    // Cart
    Route::get('add-to-cart-single', 'CartController@add_cart_single')->name('cart.add_cart_single');
    Route::post('add-to-cart', 'CartController@add_to_cart')->name('cart.add_to_cart');
    Route::get('gio-hang', 'CartController@index')->name('cart.index');
    Route::get('xoa-san-pham/{rowID}', 'CartController@destroy')->name('cart.destroy');
    Route::post('cap-nhat-gio-hang', 'CartController@update')->name('cart.update');
    Route::get('thanh-toan', 'CartController@payment')->name('cart.payment');
    Route::post('thanh-toan', 'CartController@store')->name('cart.store');
    Route::get('thanh-toan-chuyen-khoan', 'CartController@payment_success')->name('cart.payment_success');

    Route::get('thong-tin-san-pham', 'ProductController@getProduct')->name('getProduct');
});

// Cron job
// Đồng chia thẻ
//Route::get('dong-chia-the','CronJobController@dong_chia_the');
//Route::get('dong-chia-san-pham','CronJobController@dong_chia_san_pham');
//// Bán hàng giỏi
//Route::get('thuong-ban-hang-gioi','CronJobController@saler_good');
//// Xóa thành viên không nộp phí 7 ngày
//Route::get('delete-user-7-day','CronJobController@delete_user_7_day');

// Thưởng cá nhân xuất sắc - 1 tháng chạy 1 lần
Route::get('thuong-ca-nhan-xuat-sac', 'CronJobController@thuong_ca_nhan_xuat_sac');

// Thưởng cá nhân xuất sắc bán hàng - 1 tháng chạy 1 lần
Route::get('thuong-ca-nhan-xuat-sac-ban-hang', 'CronJobController@thuong_ca_nhan_xuat_sac_ban_hang');
