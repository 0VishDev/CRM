<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AdminController;
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
Route::get('/', 'MailController@home');
Route::get('/check', 'PageController@check');
Route::get('admin/home', 'HomeController@index2')->name('admin.home')->middleware('is_admin');
Route::get('user-access','AdminController@logout');

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::post('/mail-form', 'MailController@sendmail');

/*Register User Routes */
  Route::post('/register-user', 'MailController@register_user')->name('mail.register_user');
  
  Route::post('/data', 'VendorController@add_company_data');
/*End Register User Routes */

 Route::view('/noaccess', 'noaccess');

/*Vendor User Routes */
Route::group(['middleware'=>['protec']],
  function()
  {
    Route::get('/add-new-company', 'VendorController@company');
    Route::get('/sfa', 'VendorController@sfa');
    Route::get('/search_company', 'VendorController@search_company');
    Route::get('/profile', 'VendorController@profile');
    Route::put('/user-info-update/{id}', 'MailController@user_info_update');
    Route::get('/my_data', 'VendorController@my_data');
    Route::get('/company-edit/{uuid}','VendorController@update_company');
    Route::PUT('/company-update/{uuid}','VendorController@updateCompany');
    Route::get('/company-dlt/{uuid}','VendorController@dlt_company');
    Route::get('/comment/{uuid}', 'VendorController@comment');
    Route::get('/chng-status/{uuid}', 'VendorController@chng_status');
    Route::PUT('/update-status/{uuid}', 'VendorController@update_status');
    Route::post('/add-comment/{uuid}', 'VendorController@add_comment');
    Route::get('/all-info/{uuid}', 'VendorController@all_info');
    Route::post('/search-company', 'VendorController@search_vendor_company');
    Route::get('/filter-data', 'VendorController@filter_data');
    Route::post('/filter_data_result', 'VendorController@filter_data_result');
    Route::get('/vendor-shift-leads', 'VendorController@vendor_shift_leads');
    Route::post('/vendor-leads-change', 'VendorController@vendor_leads_change');
    Route::get('/refill1/{uuid}', 'VendorController@refill');
    Route::post('/refill-data/{uuid}', 'VendorController@refill_data');

    Route::get('/cmnt', 'VendorController@add_comment2');

    Route::get('/Not-Open', 'VendorController@not_open');
    Route::get('/dmu', 'VendorController@dmu');
    Route::get('/call-back', 'VendorController@call_back');
    Route::get('/tele-dmu', 'VendorController@tele_dmu');
    Route::get('/pg', 'VendorController@pg');
    Route::get('/sv', 'VendorController@sv');
    Route::get('/ni', 'VendorController@ni');
    Route::get('/con', 'VendorController@con');
    Route::get('/ccl', 'VendorController@ccl');
    Route::get('/nt', 'VendorController@nt');
    Route::get('/wr', 'VendorController@wr');
    Route::get('/due', 'VendorController@due');
    Route::get('/Dmu-Follow-Ups', 'VendorController@dflps');
    
    Route::get('/pic', 'VendorController@pic');
    Route::get('/drop', 'VendorController@drop');
    Route::get('/crtbh', 'VendorController@crtbh');
    Route::get('/nibhd', 'VendorController@nibhd');
    
    Route::get('/tch', 'VendorController@tch');
    Route::get('/hot-fca', 'VendorController@hot_fca');
    Route::get('/vbylead', 'VendorController@vbylead');
    Route::get('/cb_flps', 'VendorController@cb_flps');
    Route::get('/pg_flps', 'VendorController@pg_flps');
    Route::get('/lang', 'VendorController@lang');
    Route::get('/p1', 'VendorController@p1');
    
    Route::get('/amt', 'VendorController@amt');
    Route::get('/mht', 'VendorController@mht');
    
    Route::get('/pg-ni', 'VendorController@pg_ni');
    Route::get('/dmu-ni', 'VendorController@dmu_ni');
    Route::get('/total-com', 'VendorController@total_com');
    
    Route::get('/birthday', 'VendorController@birthday');
    
    Route::get('ajaxRequest', [AjaxController::class, 'ajaxRequest']);
    Route::post('ajaxRequest', [VendorController::class, 'insert_status'])->name('ajaxRequest.post');
    
    Route::get('/distinct', 'VendorController@distinct');
    Route::get('/vendor', 'MailController@vendor');
    
    Route::get('/tasks', 'VendorController@exportCsv');
    Route::post('/filter-by-date', 'VendorController@filter_by_date');
    Route::get('/demo-link', 'VendorController@demo_link');
    

    Route::post('insert-status', 'VendorController@insert_status');
    Route::get('/show-comment', 'VendorController@show_comment');
    Route::get('/data-sources', 'VendorController@data_sources');
   }
);
 /*End Vendor User Routes */

/*Admin User Routes */
  Route::group(['middleware'=>['adminroute']],
  function()
  {
    Route::get('/admin-add-new-company', 'AdminController@admin_regis_company');
    Route::get('/admin/all-user', 'AdminController@all_users');
    Route::get('/working-emp-admn', 'AdminController@working_emp');
    Route::get('/not-working-emp-admn', 'AdminController@not_working_emp');
    Route::get('/all-emp-admn', 'AdminController@all_emp');
    Route::get('/all-staff-admn', 'AdminController@all_staff');
    Route::get('/admin/all_company_details', 'AdminController@all_company_details');
    Route::get('/admin/admin-company-edit/{gst_no}','AdminController@admin_update_company');
    Route::PUT('/admin-company-update/{id}','AdminController@admin_updateCompany');
    Route::get('/admin-company-dlt/{uuid}','AdminController@admin_dlt_company');
    Route::get('/admin/profile', 'AdminController@admin_profile');
    Route::get('/shift-data', 'AdminController@shift_data');
    
    Route::get('/shift-data2', 'AdminController@shift_data2');
    Route::post('/shift-transfer-data', 'AdminController@shift_transfer_data');
    Route::get('/admin-search-company', 'AdminController@search_admin_company');
    Route::get('/admin_company', 'AdminController@search_company');
    Route::get('/admin-all-info/{uuid}', 'AdminController@admin_all_info');
    Route::get('/today_company', 'AdminController@today_company');
    Route::get('/my-company-admn', 'AdminController@my_company');
    Route::get('/single-emp/{id}', 'AdminController@emp_single_com');
    Route::get('/admn-refill/{uuid}', 'AdminController@admin_refill');
    Route::post('/admin-refill-data/{uuid}', 'AdminController@admin_refill_data');
    
    Route::get('/admn-Not-Open', 'AdminController@not_open');
    Route::get('/admn-dmu', 'AdminController@dmu');
    Route::get('/admn-call-back', 'AdminController@call_back');
    Route::get('/admn-tele-dmu', 'AdminController@tele_dmu');
    Route::get('/admn-pg', 'AdminController@pg');
    Route::get('/admn-sv', 'AdminController@sv');
    Route::get('/admn-ni', 'AdminController@ni');
    Route::get('/admn-con', 'AdminController@con');
    Route::get('/admn-ccl', 'AdminController@ccl');
    Route::get('/admn-nt', 'AdminController@nt');
    Route::get('/admn-wr', 'AdminController@wr');
    
    Route::get('/admn-pic', 'AdminController@admn_pic');
    Route::get('/admn-drop', 'AdminController@admn_drop');
    Route::get('/admn-crtbh', 'AdminController@admn_crtbh');
    Route::get('/admn-nibhd', 'AdminController@admn_nibhd');
    Route::get('/admn-due', 'AdminController@admn_due');
    Route::get('/admn-dmu-follow-ups', 'AdminController@admn_dflps');
    
    Route::get('/admin-tch', 'AdminController@admn_tch');
    Route::get('/admin-hot-fca', 'AdminController@admin_hot_fca');
    
    Route::get('/admn-cb-flps', 'AdminController@admn_cb_flps');
    Route::get('/admn-pg-flps', 'AdminController@admn_pg_flps');
    Route::get('/admn-p1', 'AdminController@admn_p1');
    
    Route::get('/admin-comment/{uuid}', 'AdminController@admin_comment');
    Route::get('/refill/{uuid}', 'VendorController@refill');
    Route::get('/admin/users', 'AdminController@all_users');
    /*Route::resource('/admin/users', AjaxController::class);*/
    Route::post('/admin/filter_data_result','AdminController@admin_filter_data_result');
    
    Route::get('/admin-add-packages', 'AdminController@add_packages');
    Route::post('/admin-packages-submit', 'AdminController@admin_packages_submit');
    Route::get('/admin-show-packages', 'AdminController@admin_show_packages');
    Route::get('/admin-lang', 'AdminController@admin_lang');
    Route::get('/admn-vbylead', 'AdminController@admn_vbylead');
    Route::get('/admn-pg-ni', 'AdminController@admin_pg_ni');
    Route::get('/admn-dmu-ni', 'AdminController@admin_dmu_ni');
    Route::get('/admn-amt', 'AdminController@admin_amt');
    Route::get('/admin_show_emp_documents', 'AdminController@admin_show_emp_documents');
    
    Route::get('admin-sin-user/{id}','AdminController@admin_sin_user');
    Route::post('update-password/{id}','AdminController@admin_update_psw');
    
    Route::get('status-update/{status}/{id}','AdminController@update_status');
    
    Route::get('online-user', 'UserController@index', ['middleware' => 'UserActivity']);
    Route::post('ajaxRequestcmnt', [AdminController::class, 'insert_status_admin'])->name('ajaxRequestcmnt.comment_admin');
    Route::get('/admin-comment-dlt/{id}','AdminController@admin_dlt_comment');
    
    Route::get('/search','SearchController@search');
    
    Route::get('/admin/users','SearchController@index');
    Route::get('/search','SearchController@search');
  }
  
);
/*End Admin User Routes */

 Route::view('/testing', 'testing');
 Route::view('/mail', 'mail');
/*Route::get('/testing2', 'MailController@index');*/

Route::post('/fetch', 'MailController@index');
/*Route::get('online-user', 'UserController@index', ['middleware' => 'UserActivity']);*/