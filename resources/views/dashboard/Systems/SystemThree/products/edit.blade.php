@section('title')
{{ __('products\inventory.productEditTitle') }}
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
            <h4 class="page-title">{{ __('products\inventory.productEditTitle') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.products') }}</li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{route('products.index')}}">{{__('side.products')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('products\inventory.productEditTitle') }}</li>
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
            <form method="post" action="{{ route('products.edit') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="productId" value="{{ $data->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productName') }}</label>
                                <input type="text" @if(isset($data->name)) value="{{ $data->name }}"@endif name="productName" class="form-control" placeholder="{{__('products\inventory.AddnewName')}}" required="">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productCode') }}</label>
                                <input type="text" @if(isset($data->code)) value="{{ $data->code }}"@endif name="productCode" class="form-control" placeholder="{{__('products\inventory.AddnewCode')}}" required="">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="type">{{ __('products\inventory.categoryType') }}</label>
                                <select class="form-control" name="categoryId" required="" id="categoryId">
                                    <option disabled selected
                                            value="">{{ __('products\inventory.categorySelection') }}</option>
                                    @foreach($categories as $cate)
                                        <option value="{{$cate->id}}" @if(isset($data->category_id) && $data->category->name == "$cate->name") selected @endif>{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="type">{{ __('products\inventory.brandType') }}</label>
                                <select class="form-control" name="brandId" required="" id="brandId">
                                    <option disabled selected
                                            value="">{{ __('products\inventory.brandSelection') }}</option>
                                    @foreach($brands as $bra)
                                        <option value="{{$bra->id}}" @if(isset($data->brand_id) && $data->brand->name == "$bra->name") selected @endif>{{$bra->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="country">{{__('products\inventory.country')}}</label>
                                <select id="country" name="country" class="form-control" onchange="">
                                    <option disabled selected value="">select country</option>
                                    @if(isset($sortnames) && count($sortnames) > 0)
                                        @foreach($sortnames as $key => $sortname)
                                            <optgroup label="{{$sortname->sortname}}">
                                                @foreach($countries as $key => $country)
                                                    @if($sortname->sortname == $country->sortname)
                                                        <option value="{{$country->id}}" @if(isset($data->country) && $data->country == $country->id) selected @endif>@if(app()->getLocale() == "en"){{$country->name}} @else {{$country->ar_name}} @endif</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productPDF') }}</label>
                                <input type="file" @if(isset($data->pdf)) value="{{ $data->pdf }}"@endif name="productPDF" class="form-control" placeholder="{{__('products\inventory.SelectnewPDF')}}" required="">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('products\inventory.productImage') }}</label>
                                <input type="file" @if(isset($data->image)) value="{{ $data->image }}"@endif name="productImage" class="form-control" placeholder="{{__('products\inventory.SelectnewImage')}}" required="">
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit"
                                        class="btn btn-primary pl-5 pr-5">{{ __('products\inventory.productSave') }}</button>
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
