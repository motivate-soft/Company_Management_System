<?php

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

    Route::get('detect', function()
    {
        $agent = new \Jenssegers\Agent\Agent;

        $result = $agent->isMobile();

        dd($result);
    });
    Route::get('detect', function()
    {
        $agent = new \Jenssegers\Agent\Agent;

        $result = $agent->isDesktop();

        dd($result);
    });
    Route::get('detect', function()
    {
        $agent = new \Jenssegers\Agent\Agent;

        $result = $agent->isTablet();

        dd($result);
    });


    /*======Languages locate Starts */
    Route::get('locale/{locale}', 'HomeController@change_lng');
    /* Languages locate Ends =======*/

    /*==============================
    =   Admin Dashboard Starts     =
    ==============================*/

        Auth::routes();
        Route::middleware(['auth','CheckAdmin'])->group(function () {

        Route::get('themes/theme', function () {
            return view('frontend.themes.desktop_themes.theme_1.index');
        });

        /********** Main Dashboard ***********/
        Route::get('/dashboard', 'HomeController@admin_dashabord')->name('dashboard');

        /********** Products Routs ***********/
        Route::Resource('dashboard/products', 'dashboard\products\ProductController')->except('update', 'destroy');
        Route::post('dashboard/products/update', 'dashboard\products\ProductController@update')->name('products.update');
        Route::post('dashboard/products/destroy', 'dashboard\products\ProductController@destroy')->name('products.destroy');
        Route::post('dashboard/products/codes', 'dashboard\products\ProductController@codes')->name('products.codes');
            /********** Digital Products Codes ***********/
            Route::post('dashboard/codes', 'dashboard\products\CodeController@Store')->name('codes.store');
            Route::post('dashboard/codes/update', 'dashboard\products\CodeController@update')->name('codes.update');
            Route::post('dashboard/codes/destroy', 'dashboard\products\CodeController@destroy')->name('codes.destroy');

        /********** Categories ***********/
        Route::get('dashboard/categories', 'dashboard\products\CategoriesController@index')->name('categories.index');
        Route::get('dashboard/category/create', 'dashboard\products\CategoriesController@create')->name('categories.create');
        Route::post('dashboard/add_category', 'dashboard\products\CategoriesController@add_categories')->name('categories.add');
        Route::get('dashboard/category/edit/{id}', 'dashboard\products\CategoriesController@edit')->name('categories.editview');
        Route::post('dashboard/category/edit', 'dashboard\products\CategoriesController@edit_category')->name('categories.edit');
        Route::post('dashboard/delete_category', 'dashboard\products\CategoriesController@delete_category');
        Route::get('dashboard/category/detail/{id}', 'dashboard\products\CategoriesController@detail_category')->name('categories.detail');

        /********** Brands ***********/
        Route::get('dashboard/brands', 'dashboard\products\BrandsController@index')->name('brands.index');
        Route::get('dashboard/brand/create', 'dashboard\products\BrandsController@create')->name('brands.create');
        Route::post('dashboard/add_brand', 'dashboard\products\BrandsController@add_brands')->name('brands.add');
        Route::get('dashboard/brand/edit/{id}', 'dashboard\products\BrandsController@edit')->name('brands.editview');
        Route::post('dashboard/brand/edit', 'dashboard\products\BrandsController@edit_brand')->name('brands.edit');
        Route::post('dashboard/delete_brand', 'dashboard\products\BrandsController@delete_brand');
        Route::get('dashboard/brand/detail/{id}', 'dashboard\products\BrandsController@detail_brand')->name('brands.detail');

            /********** Products ***********/
//        Route::get('dashboard/products', 'dashboard\products\InventoriesController@index')->name('products.index');
//        Route::get('dashboard/product/create', 'dashboard\products\InventoriesController@create')->name('products.create');
//        Route::post('dashboard/add_product', 'dashboard\products\InventoriesController@add_products')->name('products.add');
//        Route::get('dashboard/product/edit/{id}', 'dashboard\products\InventoriesController@edit')->name('products.editview');
//        Route::post('dashboard/product/edit', 'dashboard\products\InventoriesController@edit_product')->name('products.edit');
//        Route::post('dashboard/delete_product', 'dashboard\products\InventoriesController@delete_product');
//        Route::get('dashboard/product/detail/{id}', 'dashboard\products\InventoriesController@detail_product')->name('products.detail');
        Route::get('dashboard/products', 'dashboard\products\ProductController@index')->name('products.index');
        Route::get('dashboard/product/create', 'dashboard\products\ProductController@create')->name('products.create');
        Route::post('dashboard/add_product', 'dashboard\products\ProductController@store')->name('products.add');
        Route::get('dashboard/product/edit/{id}', 'dashboard\products\ProductController@edit')->name('products.edit');
        Route::get('dashboard/delete_product/{id}', 'dashboard\products\ProductController@delete_product');
        Route::get('dashboard/product/detail/{id}', 'dashboard\products\ProductController@detail_product')->name('products.detail');


            /********** Sliders ***********/
        Route::Resource('dashboard/sliders', 'dashboard\sliders\MobileThemesSliderController')->except('update', 'destroy');
        Route::get('dashboard/sliders', 'dashboard\sliders\MobileThemesSliderController@index')->name('sliders.index');
        Route::post('dashboard/sliders/update', 'dashboard\sliders\MobileThemesSliderController@update')->name('sliders.update');
        Route::post('dashboard/sliders/destroy', 'dashboard\sliders\MobileThemesSliderController@destroy')->name('sliders.destroy');

        /********** Folders ***********/
        Route::post('dashboard/products/folder', 'dashboard\fileManager\FolderController@store')->name('folder.store');
        Route::post('dashboard/products/update/{id}', 'dashboard\fileManager\FolderController@update')->name('folder.update');
        Route::post('dashboard/products/folder/delete/{id}', 'dashboard\fileManager\FolderController@delete')->name('folder.delete');
        Route::post('dashboard/products/folder/getAll', 'dashboard\fileManager\FolderController@getAllHtml')->name('folder.getAllHtml');

        /********** Images ***********/
        Route::post('dashboard/products/image', 'dashboard\fileManager\ImageController@store')->name('image.store');


        /********** Orders ***********/
        Route::post('dashboard/orders', 'dashboard\orders\OrderController@index')->name('orders.index');
        Route::get('dashboard/orders', 'dashboard\orders\OrderController@list');
        Route::get('dashboard/order/{id}', 'dashboard\orders\OrderController@view');
        Route::get('dashboard/order-del/{id}', 'dashboard\orders\OrderController@delete_order');
        Route::get('dashboard/order-item-del/{id}', 'dashboard\orders\OrderController@delete_order_item');
        Route::get('dashboard/change-order-status/{id}', 'dashboard\orders\OrderController@change_order_status');
        Route::get('dashboard/create_order', 'dashboard\orders\OrderController@create_order');
        Route::post('dashboard/update-products', 'dashboard\orders\OrderController@updateProductsOnOrder')->name('order.products.update');
        Route::get('dashboard/update-note', 'dashboard\orders\OrderController@updateNoteOnOrder')->name('order.update.note');
        Route::post('dashboard/remove-order_notif', 'HomeController@order_notif')->name('remove.order_notif');

        /********** Invoices ***********/
        Route::get('dashboard/invoce/list', 'dashboard\orders\InvoiceController@list')->name('invoice.list');
        Route::post('dashboard/invoce/store', 'dashboard\orders\InvoiceController@storeInvoice')->name('invoice.store');
        Route::post('dashboard/invoce/update', 'dashboard\orders\InvoiceController@updateInvoice')->name('invoice.update');
        Route::post('dashboard/invoce/view/{id}', 'dashboard\orders\InvoiceController@view')->name('invoice.view');
        Route::any('dashboard/invoice/download', 'dashboard\orders\InvoiceController@downloadInvoice')->name('invoice.download');
        Route::post('dashboard/invoice/print', 'dashboard\orders\InvoiceController@printInvoice')->name('invoice.print');

        Route::get('dashboard/invoice/delete/{id}', 'dashboard\orders\OrderController@delete_order');
        Route::get('dashboard/invoice/template', 'dashboard\orders\InvoiceController@templateList')->name('invoice.template.list');
        Route::post('dashboard/invoice/template/store', 'dashboard\orders\InvoiceController@storeTemplate')->name('invoice.template.store');
        Route::post('dashboard/invoice/template/update', 'dashboard\orders\InvoiceController@updateTemplate')->name('invoice.template.update');

        /********** Coupons ***********/
        Route::get('dashboard/coupons', 'dashboard\coupons\CouponController@index')->name('coupons.index');
        Route::get('dashboard/del-coupon/{id}', 'dashboard\coupons\CouponController@del_coupon')->name('coupons.delete');
        Route::get('dashboard/coupon-edit/{id}', 'dashboard\coupons\CouponController@edit_coupon');
        Route::post('dashboard/add-coupon', 'dashboard\coupons\CouponController@add_coupon_post')->name('coupons.add');
        Route::post('dashboard/coupon-status', 'dashboard\coupons\CouponController@update_status_post');
        Route::post('dashboard/edit-coupon', 'dashboard\coupons\CouponController@update_coupon_post');
        Route::Resource('dashboard/coupons', 'dashboard\coupons\CouponController')->except('update', 'destroy');
        Route::post('dashboard/coupons/update', 'dashboard\coupons\CouponController@update')->name('coupons.update');
        Route::post('dashboard/coupons/destroy', 'dashboard\coupons\CouponController@destroy')->name('coupons.destroy');

        /********** Jobtasks ***********/
        Route::get('dashboard/jobtasks', 'dashboard\systems\SystemTwo\JobTaskController@index')->name('jobtasks.index');
        Route::get('dashboard/del-jobtask/{id}', 'dashboard\systems\SystemTwo\JobTaskController@del_jobtask')->name('jobtask.delete');
        Route::post('dashboard/del-jobtask', 'dashboard\systems\SystemTwo\JobTaskController@del_jobtask_post')->name('jobtask.delete_post');
        Route::get('dashboard/detail-jobtask/{id}', 'dashboard\systems\SystemTwo\JobTaskController@detail')->name('jobtask.detail');
        Route::get('dashboard/report-jobtask/{id}', 'dashboard\systems\SystemTwo\JobTaskController@report')->name('jobtask.report');
        Route::get('dashboard/jobtask-edit/{id}', 'dashboard\systems\SystemTwo\JobTaskController@edit')->name('jobtasks.edit');
        Route::post('dashboard/add-coupon', 'dashboard\systems\SystemTwo\JobTaskController@add_jobtask_post')->name('jobtasks.add');
        Route::post('dashboard/coupon-status', 'dashboard\systems\SystemTwo\JobTaskController@update_status_post');
        Route::post('dashboard/edit-jobtask', 'dashboard\systems\SystemTwo\JobTaskController@update_jobtask_post');
        Route::Resource('dashboard/jobtasks', 'dashboard\systems\SystemTwo\JobTaskController')->except('update', 'destroy');
        Route::post('dashboard/jobtasks/update', 'dashboard\systems\SystemTwo\JobTaskController@update')->name('jobtasks.update');
        Route::post('dashboard/jobtasks/destroy', 'dashboard\systems\SystemTwo\JobTaskController@destroy')->name('jobtasks.destroy');

        /********** Staffs ***********/
        Route::get('dashboard/staffs', 'dashboard\systems\SystemTwo\StaffController@index')->name('staffs.index');
        Route::get('dashboard/del-staff/{id}', 'dashboard\systems\SystemTwo\StaffController@del_staff')->name('staffs.delete');
        Route::post('dashboard/del-staff', 'dashboard\systems\SystemTwo\StaffController@del_staff_post')->name('staffs.delete_post');
        Route::get('dashboard/staff-edit/{id}', 'dashboard\systems\SystemTwo\StaffController@edit')->name('staffs.edit');
        Route::get('dashboard/staff-detail/{id}', 'dashboard\systems\SystemTwo\StaffController@detail')->name('staffs.detail');
        Route::post('dashboard/add-staff', 'dashboard\systems\SystemTwo\StaffController@add_staff_post')->name('staffs.add');
        Route::post('dashboard/staff-status', 'dashboard\systems\SystemTwo\StaffController@update_status_post');
        Route::post('dashboard/edit-staff', 'dashboard\systems\SystemTwo\StaffController@update_staff_post');
        Route::Resource('dashboard/staffs', 'dashboard\systems\SystemTwo\StaffController')->except('update', 'destroy');
        Route::post('dashboard/staffs/update', 'dashboard\systems\SystemTwo\StaffController@update')->name('staffs.update');
        Route::post('dashboard/staffs/destroy', 'dashboard\systems\SystemTwo\StaffController@destroy')->name('staffs.destroy');
        Route::post('dashboard/region', 'dashboard\systems\SystemTwo\StaffController@region_post')->name('staffs.region');

            /********** EntryExits ***********/
        Route::get('dashboard/entryexits', 'dashboard\systems\SystemTwo\EntryExitController@index')->name('entryexits.index');
        Route::get('dashboard/del-entryexit/{id}', 'dashboard\systems\SystemTwo\EntryExitController@del_entryexit')->name('entryexits.delete');
        Route::post('dashboard/del-entryexit', 'dashboard\systems\SystemTwo\EntryExitController@del_entryexit_post')->name('entryexits.delete_post');
        Route::get('dashboard/entryexit-edit/{id}', 'dashboard\systems\SystemTwo\EntryExitController@edit')->name('entryexits.edit');
        Route::get('dashboard/entryexit-detail/{id}', 'dashboard\systems\SystemTwo\EntryExitController@detail')->name('entryexits.detail');
        Route::post('dashboard/add-entryexit', 'dashboard\systems\SystemTwo\EntryExitController@add_entryexit_post')->name('entryexits.add');
        Route::post('dashboard/entryexit-status', 'dashboard\systems\SystemTwo\EntryExitController@update_status_post');
        Route::post('dashboard/edit-entryexit', 'dashboard\systems\SystemTwo\EntryExitController@update_entryexit_post');
        Route::Resource('dashboard/entryexits', 'dashboard\systems\SystemTwo\EntryExitController')->except('update', 'destroy');
        Route::post('dashboard/entryexits/update', 'dashboard\systems\SystemTwo\EntryExitController@update')->name('entryexits.update');
        Route::post('dashboard/entryexits/destroy', 'dashboard\systems\SystemTwo\EntryExitController@destroy')->name('entryexits.destroy');

            /********** Communications ***********/
        Route::get('dashboard/communications', 'dashboard\systems\SystemTwo\CommunicationController@index')->name('communications.index');
        Route::get('dashboard/del-communication/{id}', 'dashboard\systems\SystemTwo\CommunicationController@del_communications')->name('communications.delete');
        Route::post('dashboard/del-communication', 'dashboard\systems\SystemTwo\CommunicationController@del_communications_post')->name('communications.delete_post');
        Route::get('dashboard/communication-edit/{id}', 'dashboard\systems\SystemTwo\CommunicationController@edit')->name('communications.edit');
        Route::get('dashboard/communication-detail/{id}', 'dashboard\systems\SystemTwo\CommunicationController@detail')->name('communications.detail');
        Route::post('dashboard/add-communication', 'dashboard\systems\SystemTwo\CommunicationController@add_communication_post')->name('communications.add');
        Route::post('dashboard/add-response', 'dashboard\systems\SystemTwo\CommunicationController@add_response_post')->name('communications.add_response');
        Route::post('dashboard/communication-status', 'dashboard\systems\SystemTwo\CommunicationController@update_status_post');
        Route::post('dashboard/edit-communication', 'dashboard\systems\SystemTwo\CommunicationController@update_communication_post');
        Route::Resource('dashboard/communications', 'dashboard\systems\SystemTwo\CommunicationController')->except('update', 'destroy');
        Route::post('dashboard/communications/update', 'dashboard\systems\SystemTwo\CommunicationController@update')->name('communications.update');
        Route::post('dashboard/communications/destroy', 'dashboard\systems\SystemTwo\CommunicationController@destroy')->name('communications.destroy');


        /********** Transactions ***********/
        Route::get('dashboard/transactions', 'dashboard\systems\SystemTwo\TransactionController@index')->name('transactions.index');
        Route::get('dashboard/del-transaction/{id}', 'dashboard\systems\SystemTwo\TransactionController@del_transaction')->name('transactions.delete');
        Route::post('dashboard/del-transaction', 'dashboard\systems\SystemTwo\TransactionController@del_transaction_post')->name('transactions.delete_post');
        Route::post('dashboard/edit-transaction', 'dashboard\systems\SystemTwo\TransactionController@update_transaction_post');
        Route::post('dashboard/add-transaction', 'dashboard\systems\SystemTwo\TransactionController@add_transaction_post')->name('transactions.add');
        Route::post('dashboard/transaction-state', 'dashboard\systems\SystemTwo\TransactionController@update_status_post');
        Route::Resource('dashboard/transactions', 'dashboard\systems\SystemTwo\TransactionController')->except('update', 'destroy');
        Route::post('dashboard/transactions/update', 'dashboard\systems\SystemTwo\TransactionController@update')->name('transactions.update');
        Route::post('dashboard/transactions/destroy', 'dashboard\systems\SystemTwo\TransactionController@destroy')->name('transactions.destroy');

        /********** JobTypes ***********/
        Route::get('dashboard/jobtypes', 'dashboard\systems\SystemTwo\JobTypeController@index')->name('jobtypes.index');
        Route::get('dashboard/del-jobtype/{id}', 'dashboard\systems\SystemTwo\JobTypeController@del_jobtype')->name('jobtypes.delete');
        Route::post('dashboard/del-jobtype', 'dashboard\systems\SystemTwo\JobTypeController@del_jobtype_post')->name('jobtypes.delete_post');
        Route::post('dashboard/add-jobtype', 'dashboard\systems\SystemTwo\JobTypeController@add_jobtype_post')->name('jobtypes.add');
        Route::post('dashboard/edit-jobtype', 'dashboard\systems\SystemTwo\JobTypeController@update_jobtype_post');
        Route::post('dashboard/jobtype-state', 'dashboard\systems\SystemTwo\JobTypeController@update_status_post');
        Route::Resource('dashboard/jobtypes', 'dashboard\systems\SystemTwo\JobTypeController')->except('update', 'destroy');
        Route::post('dashboard/jobtypes/update', 'dashboard\systems\SystemTwo\JobTypeController@update')->name('jobtypes.update');
        Route::post('dashboard/jobtypes/destroy', 'dashboard\systems\SystemTwo\JobTypeController@destroy')->name('jobtypes.destroy');

        /********** Customers Routs ***********/
        Route::get('dashboard/customers/purchases', 'Systems\SystemOne\CustomerController@purchases')->name('customers.purchases');
        Route::get('dashboard/customers/disbursements', 'Systems\SystemOne\CustomerController@disbursements')->name('customers.disbursements');
        Route::post('dashboard/customers/update/{id}', 'Systems\SystemOne\CustomerController@update')->name('customers.update');
        Route::get('dashboard/customers/edit/{id}', 'Systems\SystemOne\CustomerController@edit')->name('customers.edit');
        Route::get('dashboard/customers/destroy/{id}', 'Systems\SystemOne\CustomerController@destroy')->name('customers.destroy');
        Route::get('dashboard/customers/profile/{id}', 'Systems\SystemOne\CustomerController@profile')->name('customers.profile');
        Route::post('/dashboard/customers/region', 'Systems\SystemOne\CustomerController@region_post')->name('customers.region');
        Route::Resource('dashboard/customers', 'Systems\SystemOne\CustomerController')->except('update', 'destroy', 'edit');

//      Route::post('dashboard/products/codes', 'dashboard\customers\CustomerController@codes')->name('products.codes');


            /********** Countries ***********/
        /********** TODO: 1. Fix add and edit functional ***********/
        Route::get('dashboard/settings/countries', 'dashboard\settings\CountryController@get_countries')->name('countries.index');
        Route::get('dashboard/settings/get_cities/{id}', 'dashboard\settings\CountryController@get_cities');
        Route::get('dashboard/settings/get_state/{id}', 'dashboard\settings\CountryController@get_states');
        Route::get('dashboard/settings/delete_state/{id}', 'dashboard\settings\CountryController@delete_states');
        Route::get('dashboard/settings/delete_city/{id}', 'dashboard\settings\CountryController@delete_city');
        Route::get('dashboard/settings/delete_countries/{id}', 'dashboard\settings\CountryController@delete_country');
        Route::get('dashboard/settings/edit_country/{id}', 'dashboard\settings\CountryController@get_edit_states');
        Route::post('dashboard/settings/edit_state', 'dashboard\settings\CountryController@post_edit_states')->name('countries.states.edit');
        Route::post('dashboard/settings/edit_city', 'dashboard\settings\CountryController@post_edit_city')->name('countries.cities.edit');
        Route::post('dashboard/settings/edit_countries', 'dashboard\settings\CountryController@post_edit_countries')->name('countries.edit');
        Route::post('dashboard/settings/add_state', 'dashboard\settings\CountryController@post_add_state')->name('countries.states.add');
        Route::post('dashboard/settings/add_city', 'dashboard\settings\CountryController@post_add_city')->name('countries.cities.add');
        Route::get('dashboard/settings/add-country', 'dashboard\settings\CountryController@add_country')->name('countries.countries.add');
        Route::post('dashboard/settings/add_country', 'dashboard\settings\CountryController@post_add_country')->name('countries.add');
        Route::get('dashboard/settings/get_neiber/{id}', 'dashboard\settings\CountryController@get_neiber');
        Route::post('dashboard/settings/add_neiber', 'dashboard\settings\CountryController@add_neiber')->name('countries.neiber.add');
        Route::post('dashboard/settings/edit_neiber', 'dashboard\settings\CountryController@edit_neiber')->name('countries.neiber.edit');
        Route::get('dashboard/settings/delete_neiber/{id}', 'dashboard\settings\CountryController@delete_neiber');
        Route::get('dashboard/settings/all_get_state/{id}', 'dashboard\settings\CountryController@all_get_state')->name('countries.states.get');
        Route::get('dashboard/settings/all_get_cities/{id}', 'dashboard\settings\CountryController@all_get_cities')->name('countries.cities.get');
        Route::get('dashboard/settings/all_get_nebri/{id}', 'dashboard\settings\CountryController@all_get_nebri');
        Route::get('dashboard/settings/get_countries/{id}', 'dashboard\settings\CountryController@_get_countries');
        Route::get('dashboard/settings/get_zones/{id}', 'dashboard\settings\CountryController@get_zones_ala');
        Route::get('dashboard/settings/get_neighborhood/{id}', 'dashboard\settings\CountryController@get_neighborhood_ala');

        /********** Social Links ***********/
        Route::get('dashboard/socialMedia', 'dashboard\settings\SocialMediaController@social_links')->name('social.index');
        Route::post('dashboard/socialMedia-save', 'dashboard\settings\SocialMediaController@save_social_links')->name('social.save');

        /********** Help & Privacy ***********/
        /********** TODO: 1. Make help in another page, and create new page for terms & conditions ***********/
        Route::get('dashboard/pages/PrivacyPolicy', 'dashboard\pages\PrivacyPolicyController@policy');
        Route::post('dashboard/pages/PrivacyPolicy', 'dashboard\pages\PrivacyPolicyController@save_policy');

        /********** Under Mainenace ***********/
        Route::get('dashboard/settings/under-maintenance', 'dashboard\settings\UnderMaintenanceController@underMaintenanceView')->name('settings.underMaintenanceView');
        Route::post('dashboard/settings/under-maintenance', 'dashboard\settings\UnderMaintenanceController@underMaintenanceUpdate')->name('settings.underMaintenanceUpdate');

        /*========================================
        =    Admin Dashboard Plugins Starts      =
        ========================================*/
            /****** Plugins List *****/
            Route::get('dashboard/plugins', 'dashboard\plugins\PluginsController@index')->name('plugins.index');
            Route::get('dashboard/plugin-add', 'dashboard\plugins\PluginsController@get_add');
            Route::get('dashboard/plugin/{id}', 'dashboard\plugins\PluginsController@plugin_status');
            Route::get('dashboard/plugin/edit/{id}', 'dashboard\plugins\PluginsController@plugin_edit');
            Route::post('dashboard/add_plugin', 'dashboard\plugins\PluginsController@add_plugin');
            Route::post('dashboard/edit_plugin', 'dashboard\plugins\PluginsController@edit_plugin');
            Route::get('dashboard/payments/bank-rajhi', 'dashboard\plugins\PluginsController@bank_rj');

            /****** Malath *****/
            Route::get('dashboard/plugins/sms/malath', 'dashboard\plugins\sms\MalathController@malath_index')->name('malath.index');
            Route::post('dashboard/plugins/sms/malath', 'dashboard\plugins\sms\MalathController@malath_store')->name('malath.store');
            Route::get('dashboard/plugins/sms/malath/sendSMS', 'dashboard\plugins\sms\MalathController@malath_smsView')->name('malath.smsView');
            Route::post('dashboard/plugins/sms/malath/send-sms', 'dashboard\plugins\sms\MalathController@malath_sendSMS')->name('malath.sendSMS');
            Route::post('dashboard/plugins/sms/malath/change-status', 'dashboard\plugins\sms\MalathController@malath_changeStatus')->name('malath.changeStatus');

            /****** Meat System *****/
            /********** TODO: 1. Add "dashboard/plugins/systems/" before the main URL ***********/
            Route::get('dashboard/plugins/systems/cutting-methods', 'dashboard\plugins\products\MeatSystemController@cutting_index')->name('cuttings.index');
            Route::post('dashboard/plugins/systems/cutting-methods', 'dashboard\plugins\products\MeatSystemController@cutting_save')->name('cuttings.store');
            Route::post('dashboard/plugins/systems/cutting-methods/update', 'dashboard\plugins\products\MeatSystemController@cutting_update')->name('cuttings.update');
            Route::get('dashboard/plugins/systems/delete_cutting/{id}', 'dashboard\plugins\products\MeatSystemController@cutting_delete');

            Route::get('dashboard/plugins/systems/packing-methods', 'dashboard\plugins\products\MeatSystemController@packing_index')->name('packings.index');
            Route::post('dashboard/plugins/systems/packing-methods', 'dashboard\plugins\products\MeatSystemController@packing_save')->name('packings.store');
            Route::post('dashboard/plugins/systems/packing-methods/update', 'dashboard\plugins\products\MeatSystemController@packing_update')->name('packings.update');
            Route::get('dashboard/plugins/systems/delete_packing/{id}', 'dashboard\plugins\products\MeatSystemController@packing_delete')->name('packings.destroy');

            Route::post('dashboard/plugins/systems/size_add', 'dashboard\plugins\products\MeatSystemController@size_add');
            Route::get('dashboard/plugins/systems/size-del/{id}', 'dashboard\plugins\products\MeatSystemController@size_del');
            Route::post('dashboard/plugins/systems/edit_size', 'dashboard\plugins\products\MeatSystemController@edit_size');
            Route::get('dashboard/plugins/systems/sizes', 'dashboard\plugins\products\MeatSystemController@sizes_index')->name('sizes.index');



            /****** Banks Informaion *****/
            /********** TODO: 1. Add an option on the plugins page to enable or disable ***********/
            Route::get('dashboard/bank-information', function () {
                $banks = \DB::table('bank')->get();
                return view('dashboard.settings.bank-information', compact('banks'));
            });
            Route::post('dashboard/bank-information', 'dashboard\plugins\payment\BankTransferController@index')->name('bank-information.index');
            Route::post('dashboard/add_bank', 'dashboard\plugins\payment\BankTransferController@add_bank')->name('bank-information.add');
            Route::post('dashboard/edit_bank', 'dashboard\plugins\payment\BankTransferController@edit_bank')->name('bank-information.edit');
            Route::get('dashboard/delete_bank/{id}', 'dashboard\plugins\payment\BankTransferController@delete_bank');

            /********** TODO: TAX - VAT ***********/
            /********** TODO: 1. Add "dashboard/plugins/others/" before the main URL, 2. Add an option on the plugins page to enable or disable ***********/
            Route::get('dashboard/plugins/others/tax', 'dashboard\settings\TaxController@vat_tax')->name('tax.index');
            Route::post('dashboard/save_vat_tax', 'dashboard\settings\TaxController@save_vat_tax')->name('tax.save');

            /****** My Fatoorah Payment Gateway *****/
            Route::get('dashboard/my-fatoorah', 'dashboard\plugins\payments\MyFatoorahController@index')->name('my_fatoorah.index');
            Route::post('dashboard/my-fatoorah', 'dashboard\plugins\payments\MyFatoorahController@store')->name('my_fatoorah.store');
            Route::post('dashboard/my-fatoorah/change-status', 'dashboard\plugins\payments\MyFatoorahController@changeStatus')->name('my_fatoorah.changeStatus');

            /****** Firebase Notifications *****/
            /********** TODO: 1. Add "dashboard/plugins/others/" before the main URL, 2. Add an option on the plugins page to enable or disable ***********/
            // تحتاج تفاهم بالعربي
            Route::get('sendnotifications','CustomerController@SendNotification')->name('notification.send');
            Route::post('notification/submit','CustomerController@PushNotification')->name('submitnotification');

        /*========================================
        =     Admin Dashboard Plugins Ends       =
        ========================================*/

    /*==============================
    =    Admin Dashboard Ends      =
    ==============================*/

    /*================================
    =    Under Maintenace Start      =
    ================================*/
    Route::group(['middleware' => ['UnderMaintenance']], function () {
        Route::get('/', 'frontend\MobileView\HomeController@index')->name('home');
        Route::get('product/{id}', 'frontend\MobileView\ProductController@product')->name('product', 'id');
        Route::get('cart', 'frontend\MobileView\CartController@index')->name('carts.index');
        Route::post('add-to-cart', 'frontend\MobileView\CartController@addToCart')->name('carts.addToCart');
        Route::post('cart/remove', 'frontend\MobileView\CartController@remove')->name('carts.remove');
        Route::get('profile', 'frontend\MobileView\UserController@profileView')->name('profile.index');
        Route::get('account', 'frontend\MobileView\UserController@account')->name('user.account');
        Route::get('user-addresses', 'frontend\MobileView\UserController@addresses')->name('user.addresses');
        Route::get('user-orders', 'frontend\MobileView\UserController@orders')->name('user.orders');
        Route::get('user/login', 'frontend\MobileView\UserController@loginView')->name('user.login');
        Route::get('register', 'frontend\MobileView\UserController@registerView')->name('user.register');
        Route::get('verify', 'frontend\MobileView\UserController@verifyView')->name('user.verifyView');
        Route::post('update-account', 'frontend\MobileView\UserController@updateAccount')->name('user.updateAccount');
        Route::get('address', 'frontend\MobileView\CheckoutController@address')->name('address');
        Route::get('payment', 'frontend\MobileView\CheckoutController@checkoutPayment')->name('checkoutPayment');
        Route::get('confirmation', 'frontend\MobileView\CheckoutController@confirmation')->name('confirmation');
        Route::post('user/verify-phone', 'frontend\MobileView\UserController@verifyPhone')->name('user.verify_phone');
        Route::post('getStates', 'frontend\MobileView\CheckoutController@states')->name('getStates');
        Route::post('getCities', 'frontend\MobileView\CheckoutController@cities')->name('getCities');
        Route::post('getNeighborhoods', 'frontend\MobileView\CheckoutController@neighborhoods')->name('getNeighborhoods');
        Route::post('checkoutSelectAddress', 'frontend\MobileView\CheckoutController@checkoutSelectAddress')->name('checkoutSelectAddress');
        Route::post('checkoutSelectPayment', 'frontend\MobileView\CheckoutController@checkoutSelectPayment')->name('checkoutSelectPayment');
        Route::post('getBankInfo', 'frontend\MobileView\CheckoutController@getBankInfo')->name('getBankInfo');
        Route::post('orders/store', 'frontend\MobileView\OrderController@store')->name('orders.store');
        Route::get('address/create', 'frontend\MobileView\UserController@createAddress')->name('user.address.create');
        Route::post('address/store', 'frontend\MobileView\UserController@storeAddress')->name('user.address.store');
        Route::get('help', function () {
            return view('frontend.themes.mobile_themes.theme_1.help');
        })->name('help');
    });
    /*================================
    =     Under Maintenace Ends      =
    ================================*/

});


