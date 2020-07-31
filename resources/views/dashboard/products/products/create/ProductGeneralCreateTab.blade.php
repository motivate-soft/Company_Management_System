<!-- Start col -->
<div class="card m-b-30">
    <!--<div class="card-header">-->
    <!--    <h5 class="card-title">{{ __('products/productAdd.productDetail') }}</h5>-->
    <!--</div>-->
    <!-- Start col -->
    <ul class="nav nav-pills nav-justified mb-3" @if($lang_current == 'ar') style="padding-right: 0 !important;" @endif role="tablist">
        <li class="nav-item">
            <a class="nav-link active" style="font-family: 'Tajawal', sans-serif;" id="pills-arabic-product-information-tab-justified" data-toggle="pill" href="#pills-arabic-product-information-justified" role="tab" aria-controls="pills-profile" aria-selected="false">تفاصيل المنتج باللغة العربية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-english-product-information-tab-justified" data-toggle="pill" href="#pills-english-product-information-justified" role="tab" aria-controls="pills-home" aria-selected="true">Product Details in English</a>
        </li>
    </ul>
    
    <div class=" tab-content" style="text-align: left;">
        <div class="aaaaa form-group row tab-pane fade show" id="pills-english-product-information-justified" role="tabpanel" aria-labelledby="pills-english-product-information-tab-justified">
            <label for="name_en" class="col-sm-12 col-form-label">Product Name</label>
            <div class="col-sm-12">
                <input type="text" name="name_en" class="form-control font-20" id="name_en" required>
                <div class="error error_name_en"></div>
            </div>
            <label for="description_en" class="col-sm-12 col-form-label">Product Description</label>
            <div class="col-sm-12">
                <textarea class="summernote input-block-level" id="description_en" name="description_en"></textarea>
                <div class="error error_description_en"></div>
            </div>
        </div>

        <div class="form-group row tab-pane fade show active" style="text-align: right;" id="pills-arabic-product-information-justified" role="tabpanel" aria-labelledby="pills-arabic-product-information-tab-justified">
            <label style="font-family: 'Tajawal', sans-serif;" for="name_ar" class="col-sm-12 col-form-label">أسم المنتج</label>
            <div class="col-sm-12">
                <input style="text-align: right; font-family: 'Tajawal', sans-serif;" type="text" name="name_ar" class="form-control font-20" id="name_ar" required>
                <div class="error error_name_ar"></div>
            </div>
            <label for="description_ar" style="font-family: 'Tajawal', sans-serif;" class="col-sm-12 col-form-label">وصف المنتج</label>
            <div style="font-family: 'Tajawal', sans-serif;" class="col-sm-12">
                <textarea class="summernote input-block-level" id="description_ar" name="description_ar"></textarea>
                <div class="error error_description_ar"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-4">
        <div class="card m-b-30">
            <div claa="card-body">
                <div class="nav flex-column nav-pills" id="v-pills-product-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-2 active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true"><i class="feather icon-feather mr-2"></i>{{ __('products/productAdd.general') }}
                    </a>
                    <a class="nav-link mb-2" id="v-pills-stock-tab" data-toggle="pill" href="#v-pills-stock" role="tab" aria-controls="v-pills-stock" aria-selected="false"><i class="feather icon-box mr-2"></i>{{ __('products/productAdd.stock') }}
                    </a>
                    <a class="nav-link mb-2" id="v-pills-shipping-tab" data-toggle="pill" href="#v-pills-shipping" role="tab" aria-controls="v-pills-shipping" aria-selected="false"><i class="feather icon-truck mr-2"></i>{{ __('products/productAdd.shipping') }}
                    </a>
                    <!--<a class="nav-link mb-2" id="v-pills-advanced-tab" data-toggle="pill" href="#v-pills-advanced" role="tab" aria-controls="v-pills-advanced" aria-selected="false"><i class="feather icon-settings mr-2"></i>Advanced</a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-8">
        <div class="card m-b-30">
          
                <div class="tab-content" id="v-pills-product-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                        <div class="form-group row">
                            <label for="purchase_price" class="col-sm-4 col-form-label">Purchase Price</label>
                            <div class="col-sm-8">
                                <input type="text" id="purchase_price" name="purchase_price" class="form-control" placeholder="100" required>
                                <div class="error error_purchase_price"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label">{{ __('products/productAdd.price') }}</label>
                            <div class="col-sm-8">
                                <input type="text" id="price" name="price" class="form-control" placeholder="100" required>
                                <div class="error error_price"></div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="salePrice" class="col-sm-4 col-form-label">{{ __('products/productAdd.salePrice') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="sale_price" class="form-control" placeholder="50" required>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-stock" role="tabpanel" aria-labelledby="v-pills-stock-tab">
                        <div class="form-group row">
                            <label for="sku" class="col-sm-4 col-form-label">{{ __('products/productAdd.sku') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="sku" class="form-control" id="sku" placeholder="SKU001">
                            </div>
                        </div>
                        <!--TODO: Add an option to control the status-->
                        <div class="form-group row">
                            <label for="stockStatus" class="col-sm-4 col-form-label">{{ __('products.stockStatus') }}</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="stock_status" id="stockStatus">
                                    <option value="1">In Stock</option>
                                    <option value="0">Out of Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="stockQuantity" class="col-sm-4 col-form-label">{{ __('products.quantity') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="stock_quantity" class="form-control" id="stockQuantity" placeholder="100">
                                <div class="error error_stock_quantity"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">
                        <div class="form-group row">
                            <label for="weight" class="col-sm-4 col-form-label">{{ __('products/productAdd.weight') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="weight" class="form-control" id="weight" placeholder="0">
                            </div>
                        </div>
                        <!--TODO: Add an option to control the status-->
                        <div class="form-group row mb-0">
                            <label for="shippingClass" class="col-sm-4 col-form-label">{{ __('products/productAdd.shoppingClasses') }}</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="shipping" id="shippingClass">
                                    <option value="free">Free Shipping</option>
                                    <option value="no">No Shipping</option>
                                    <option value="fixed">Fixed Shipping</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--<div class="tab-pane fade" id="v-pills-advanced" role="tabpanel" aria-labelledby="v-pills-advanced-tab">-->
                    <!--    <div class="form-group row mb-0">-->
                    <!--        <label for="purchaseNote" class="col-sm-3 col-form-label">Purchase note</label>-->
                    <!--        <div class="col-sm-9">-->
                    <!--            <textarea class="form-control" name="purchaseNote" id="purchaseNote" rows="3" placeholder="Purchase note"></textarea>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
        </div>
    </div>
</div>
