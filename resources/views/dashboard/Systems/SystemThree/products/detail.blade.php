@section('title')
{{ __('products\inventory.productdetail') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('products\inventory.productdetail') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.products') }}</li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{route('products.index')}}">{{__('side.products')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('products\inventory.productdetail') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('products.index') }}" >{{ __('products\inventory.productBack') }}</a>
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
            <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="productId" value="{{ $data->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productName') }}</label>
                                <input type="text" @if(isset($data->name)) value="{{ $data->name }}"@endif name="productName" class="form-control" placeholder="{{__('products\inventory.AddnewName')}}" required="" disabled>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productCode') }}</label>
                                <input type="text" @if(isset($data->code)) value="{{ $data->code }}"@endif name="productCode" class="form-control" placeholder="{{__('products\inventory.AddnewCode')}}" required="" disabled>
                            </div>
                        </div>

                        {{--<div class="col-lg-6 mb-4">--}}
                            {{--<div class="form-group mb-0">--}}
                                {{--<label for="cutting_method" class="col-form-label">{{ __('products\inventory.nameOfAdd') }}</label>--}}
                                {{--<input type="text" @if(isset($data->name_of_who_added)) value="{{ $data->name_of_who_added }}"@endif name="nameOfAdd" class="form-control" placeholder="{{__('products\inventory.AddnewNameof')}}" required="" disabled>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-lg-6 mb-4">--}}
                            {{--<div class="form-group mb-0">--}}
                                {{--<label>{{ __('products\inventory.dateOfAdd') }}</label>--}}
                                {{--<div class="input-group">--}}
                                    {{--<input type="text" id="default-date12" class="form-control"--}}
                                           {{--placeholder="yyyy/mm/dd" aria-describedby="basic-addon2"--}}
                                           {{--name="dateOfAdd" @if(isset($data->date_of_addition)) value="{{ $data->date_of_addition }}"@endif autocomplete="off" disabled/>--}}
                                    {{--<div class="input-group-append">--}}
                                                {{--<span class="input-group-text" id="basic-addon2"><i--}}
                                                            {{--class="feather icon-calendar"></i></span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.categoryType') }}</label>
                                <input type="text" @if(isset($data->category_id)) value="{{ $data->category->name }}"@endif name="categoryId" class="form-control" placeholder="{{__('products\inventory.category_type')}}" required="" disabled>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.brandType') }}</label>
                                <input type="text" @if(isset($data->brand_id)) value="{{ $data->brand->name }}"@endif name="brandId" class="form-control" placeholder="{{__('products\inventory.brand_type')}}" required="" disabled>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.country') }}</label>
                                <input type="text" @if(isset($data->country)) value="{{ $data->country }}"@endif name="country" class="form-control" placeholder="{{__('products\inventory.country')}}" required="" disabled>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productPDF') }}</label>
                                <input type="text" @if(isset($data->pdf)) value="{{ $data->pdf }}"@endif name="productPDF" class="form-control" placeholder="{{__('products\inventory.SelectnewPDF')}}" required="" disabled>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productImage') }}</label>
                                <img src="{{asset('../'.$data->image)}}" alt="productImage" class="img-thumbnail circle">
                                <input type="text" @if(isset($data->image)) value="{{ $data->image }}"@endif name="productImage" class="form-control" placeholder="{{__('products\inventory.SelectnewImage')}}" required="" disabled>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            </form>
        </div>


        <!-- End col -->
    </div>
    <!-- End row -->
</div>

<!-- End Contentbar -->
@endsection
@section('script')

<script src="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datepicker/i18n/datepicker.en.js') }}"></script>


{{-- <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script> --}}

<script>
    $(document).ready(function() {

        $('#default-date').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });

        $('#default-date12').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });


    });
</script>
@endsection
