<?php

// use VehicleController;

// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
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
    return redirect('/home');
});
// Route::get('admin', function () {
//     return redirect('Admin.nifty.index');
//     });

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Define your admin panel routes here
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/department/list', 'Admin\HomeController@departmentList')->name('admin.department.list');
     
    Route::get('/department/add', 'Admin\HomeController@departmentAdd')->name('admin.department.add');
    Route::post('/department/added', 'Admin\HomeController@AddDepartment')->name('admin.department.added');
    Route::get('/department/edit/{id}', 'Admin\HomeController@editDepartment')->name('admin.department.edit');
    Route::post('/department/update/{id}', 'Admin\HomeController@updateDepartment')->name('admin.department.update');
    Route::get('/department/delete/{id}', 'Admin\HomeController@deleteDepartment')->name('admin.department.delete');

    //

    Route::get('/employee/list', 'Admin\HomeController@employeeList')->name('admin.employee.list');
    Route::get('/employee/add', 'Admin\HomeController@employeeAdd')->name('admin.employee.add');
    Route::post('/employee/added', 'Admin\HomeController@AddEmployee')->name('admin.employee.added');
    Route::get('/employee/edit/{id}', 'Admin\HomeController@editEmployee')->name('admin.employee.edit');
    Route::post('/employee/update/{id}', 'Admin\HomeController@updateEmployee')->name('admin.employee.update');
    Route::get('/employee/delete/{id}', 'Admin\HomeController@deleteEmployee')->name('admin.employee.delete');

    //

    Route::get('/customers/list', 'Admin\HomeController@customerList')->name('admin.customer.list');
    Route::get('/customer/add', 'Admin\HomeController@customerAdd')->name('admin.customer.add');
    Route::post('/customer/added', 'Admin\HomeController@addCustomer')->name('admin.customer.added');
    Route::get('/customer/edit/{id}', 'Admin\HomeController@editCustomer')->name('admin.customer.edit');
    Route::post('/customer/update/{id}', 'Admin\HomeController@updateCustomer')->name('admin.customer.update');
    Route::get('/customer/delete/{id}', 'Admin\HomeController@deleteCustomer')->name('admin.customer.delete');

    //

    Route::get('/sheets/list', 'Admin\HomeController@sheetList')->name('admin.sheets.list');
    Route::get('/sheet/add', 'Admin\HomeController@sheetAdd')->name('admin.sheet.add');
    Route::post('/sheet/added', 'Admin\HomeController@addSheet')->name('admin.sheet.added');
    Route::get('/sheet/edit/{id}', 'Admin\HomeController@editSheet')->name('admin.sheet.edit');
    Route::post('/sheet/update/{id}', 'Admin\HomeController@updateSheet')->name('admin.sheet.update');
    Route::get('/sheet/delete/{id}', 'Admin\HomeController@deleteSheet')->name('admin.sheet.delete');

    //
    Route::get('/jobs/list', 'Admin\HomeController@jobList')->name('admin.job.list');
    Route::get('/jobs/add', 'Admin\HomeController@jobAdd')->name('admin.job.add');
    Route::post('/jobs/added', 'Admin\HomeController@addJob')->name('admin.job.added');
    Route::get('/jobs/edit/{id}', 'Admin\HomeController@editJob')->name('admin.job.edit');
    Route::post('/jobs/update/{id}', 'Admin\HomeController@updateJob')->name('admin.job.update');
    Route::get('/jobs/delete/{id}', 'Admin\HomeController@deleteJob')->name('admin.job.delete');


    //
    Route::get('/jobs-allottment/list', 'Admin\HomeController@jobAllottmentList')->name('admin.jobs-allottment.list');
    Route::get('/jobs-allottment/add', 'Admin\HomeController@jobAllottmentAdd')->name('admin.jobs-allottment.add');
    Route::post('/jobs-allottment/added', 'Admin\HomeController@addjobAllottment')->name('admin.jobs-allottment.added');
    Route::get('/jobs-allottment/edit/{id}', 'Admin\HomeController@editjobAllottment')->name('admin.jobs-allottment.edit');
    Route::post('/jobs-allottment/update/{id}', 'Admin\HomeController@updatejobAllottment')->name('admin.jobs-allottment.update');
    Route::get('/jobs-allottment/delete/{id}', 'Admin\HomeController@deletejobAllottment')->name('admin.jobs-allottment.delete');


   // 
    Route::get('/role/list', 'Admin\HomeController@RoleList')->name('admin.role.list');
     Route::get('/role/add', 'Admin\HomeController@RoleAdd')->name('admin.role.add');
    Route::post('/role/added', 'Admin\HomeController@AddRole')->name('admin.role.added');
    Route::get('/role/edit/{id}', 'Admin\HomeController@editRole')->name('admin.role.edit');
    Route::post('/role/update/{id}', 'Admin\HomeController@updateRole')->name('admin.role.update');
    Route::get('/role/delete/{id}', 'Admin\HomeController@deleteRole')->name('admin.role.delete');

    
    Route::get('/module/list', 'Admin\HomeController@ModuleList')->name('admin.module.list');
    Route::get('/module/add', 'Admin\HomeController@ModuleAdd')->name('admin.module.add');
    Route::post('/module/added', 'Admin\HomeController@AddModule')->name('admin.module.added');
    Route::get('/module/edit/{id}', 'Admin\HomeController@editModule')->name('admin.module.edit');
    Route::post('/module/update/{id}', 'Admin\HomeController@updateModule')->name('admin.module.update');
    Route::get('/module/delete/{id}', 'Admin\HomeController@deleteModule')->name('admin.module.delete');
    Route::get('/module_access/list', 'Admin\HomeController@ModuleAccessList')->name('admin.module_access.list');
    Route::get('/module_access/add', 'Admin\HomeController@ModuleAccessAdd')->name('admin.module_access.add');
    Route::post('/module_access/added', 'Admin\HomeController@AddModuleAccess')->name('admin.module_access.added');
    Route::get('/module_access/edit/{id}', 'Admin\HomeController@editModuleAccess')->name('admin.module_access.edit');
    Route::post('/module_access/update/{id}', 'Admin\HomeController@updateModuleAccess')->name('admin.module_access.update');
    Route::get('/module_access/delete/{id}', 'Admin\HomeController@deleteModuleAccess')->name('admin.module_access.delete');
    // Add more routes as needed
});

Route::get('/Signup' , 'RegisterController@create');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verifyemail/{token}','Auth\RegisterController@verify')->name('token');
Auth::routes();
Route::group(['middleware' => ['blockacess']], function () {
    Route::post('add_to_cart' , 'HomeController@add_to_cart');
    Route::get('remove_from_cart' , 'HomeController@remove_from_cart');
    Route::post('get_product_order_view' , 'ProductController@get_product_order_view');
    Route::post('order_summision' , 'OrderController@submithandler');
    Route::post('upload_order_image' , 'OrderController@fileupload');
    Route::post('place_order' , 'OrderController@place_order');
    Route::get('custumer_orders' , 'OrderController@custumer_order_view');
    Route::get('orders/view/{id}' , 'OrderController@show');
    Route::post('update_order_stage/{id}' , 'OrderController@update_stage');
    Route::post('update_product_status/{id}' , 'OrderController@update_product');
    Route::resource('products' , 'ProductController');
    Route::post('upload_image' , 'ProductController@image_upload');
    Route::resource('categories' , 'CategoryController');
    Route::get('cartview' , 'CartController@index');
    ROute::post('cartupdate' , 'CartController@update_cart');
    Route::any('checkout' , 'CheckoutController@index');
    #Route::resource('Categories' , 'CategoryController');
    Route::get('script', 'CategoryController@script');
    Route::get('Category/{slug}' , 'CategoryController@handleview');
    Route::get('ProductsDetails/{slug}' , 'ProductController@handleview');
    Route::get('Order-Summary-Report' , 'Admin\ReportController@orders');
    Route::resource('Tax-Master' , 'Admin\TaxMasterController');
    Route::get('tax_master_delete/{id}' , 'Admin\TaxMasterController@destroy');
    Route::resource('Users' , 'UserController');
    Route::get('users_delete/{id}' , 'UserController@destroy');
    Route::get('Add-Amount' , 'BalanceController@add');
    Route::post('proceed_payment' , 'BalanceController@proceed_payment');
    Route::post('payment' ,'BalanceController@payment')->name('payment'); 
    
    // routes for new order format
    Route::POST('get_product_details' , 'ProductController@getdetails_ajax');
    Route::post('fill_order' , 'OrderController@add_order_new');
    Route::post('submit_order' , 'OrderController@submit_order_new');
    Route::post('approve_order/{id}' , 'OrderController@approve_order');
    Route::get('Checkout/{order_id}' , 'CheckoutController@checkout');
    Route::POST('Checkout/{order_id}' , 'CheckoutController@checkout_action');

     Route::POST('download' , 'OrderController@download');
    
    
    // Routes for manual wallet balance addition
    Route::get('manual_wallet_balace' , 'BalanceController@manual_balanace_view');
    Route::Post('manual_wallet_balace' , 'BalanceController@manual_balanace_action');    
    
    Route::post('get_parent_items' , 'CategoryController@get_parent_items');
    
    Route::post('get_catg_items' , 'CategoryController@get_catg_items');

     Route::post('get_product_items' , 'CategoryController@get_product_items');
});



