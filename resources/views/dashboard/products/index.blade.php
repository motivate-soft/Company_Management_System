@section('title')
    {{ __('products/productsList.productList') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')
    @php
        $lang_current = Config::get('app.locale');
    @endphp
    <link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('products/productsList.productList') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item">{{ __('side.products') }}</li>
                        <li class="breadcrumb-item active"
                            aria-current="page">{{ __('products/productsList.productList') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba" href="{{ route('products.create') }}"><i class="feather icon-plus mr-2"></i>{{ __('products/productsList.titleAdd') }}</a>
                    <!--File Manager Dialog: To Bo Removed-->
                    {{--<button data-toggle="modal" data-target="#fileManager_Popup" class="col-12 btn btn-primary-rgba my-1 fileManager_Popup_btn">File Manager</button>--}}
                    {{--@include('dashboard.fileManager.fileManagerPopUpView')--}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="default-datatable">
                                <thead>
                                <tr>
                                    <th>{{ __('products/productsList.id') }}</th>
                                    <th>{{ __('products/productsList.image') }}</th>
                                    <th>{{ __('products/productsList.name') }}</th>
                                    <th>{{ __('products/productsList.price') }}</th>
                                    <th>{{ __('products.codes') }}</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                    <!--/====================================\-->
                                    <!--|======  Meat Application END  ======|-->
                                    <!--\====================================/-->
                                    @php
                                        $plug = get_plugin_if_active(2);
                                    @endphp
                                    @if($plug->status == 1)
                                        <th>{{ __('products/productsList.packagingMethod') }}</th>
                                        <th>{{ __('products/productsList.cuttingMethod') }}</th>
                                @endif
                                <!--/====================================\-->
                                    <!--|======  Meat Application END  ======|-->
                                    <!--\====================================/-->

                                    <!--<th>Actions</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($products) > 0)
                                    @php
                                        $indx = 1;
                                    @endphp
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <th scope="row">{{ $indx }}</th>
                                            <td>
                                                @if(!is_null($product->image) && $product->image != '')
                                                    @php
                                                        $fileNames = explode(',', $product->image);
                                                    @endphp
                                                    <img width="40" height="40" style="object-fit: cover;" src="{{ url('uploads/product_images') }}/{{ $fileNames[0] }}"/>
                                                @else
                                                    <img width="40" height="40" style="object-fit: cover;" src="{{ asset('assets/dashboard/images/no-image.jpg') }}"/>
                                                @endif
                                            </td>
                                                @if($lang_current == 'ar')
                                                    <td>{{ $product->name_ar }}</td>
                                                @else
                                                    <td>{{ $product->name }}</td>
                                                @endif
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                @if($product->digital_product == 1)
                                                    <button class="btn btn-dark btn-sm get-codes" data-product="{{ $product->name }}" data-id="{{ $product->id }}">{{ __('products.codes') }}</button>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <!--/=======================================\-->
                                            <!--|======  Meat Application Starts  ======|-->
                                            <!--\=======================================/-->
                                            @php
                                                $plug = get_plugin_if_active(2);
                                            @endphp
                                            @if($plug->status == 1)
                                                <td>
                                                    @if(!is_null($product->packaging_method))
                                                        {{ packaging_method_by_ids($product->packaging_method) }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!is_null($product->cutting_method))
                                                        {{ cutting_method_by_ids($product->cutting_method) }}
                                                    @endif
                                                </td>
                                            @endif
                                            <!--/====================================\-->
                                            <!--|======  Meat Application END  ======|-->
                                            <!--\====================================/-->
                                            <td>
                                                <div class="button-list">
                                                    <a class="btn btn-success-rgba" href="{{ route('products.edit',$product->id) }}"><i class="feather icon-edit-2"></i></a>
                                                </div>
                                            <td>
                                                <div class="button-list">
                                                    <a href="javascript:;" class="btn btn-danger-rgba delete"><input type="hidden" value="{{$product->id}}" class="product_id"><i class="feather icon-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $indx++;
                                        @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!--Codes Module Start-->
    @include('dashboard.products.modules.CodeEditModule')
    <!-- End Contentbar -->
@endsection

@section('script')
    @include('dashboard.products.scripts.index')
    <!--File Manager Scripts-->
    @include('dashboard.fileManager.fileManagerScript')
@endsection


