@section('title')
    {{ __('brand.brandAdd') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')
    @php
        $lang_current = Config::get('app.locale');
    @endphp
    <link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('brand.brandAdd') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item">{{ __('side.products') }}</li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{route('brands.index')}}">{{__('side.brands')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('brand.brandAdd') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="{{ route('brands.index') }}">{{ __('brand.brandBack') }}</a>
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
                <form method="post" action="{{ route('brands.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="brandName" class="col-form-label">{{ __('brand.brandName') }}</label>
                                        <input type="text" name="brandName" class="form-control" placeholder="{{__('brand.AddnewName')}}" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="brandNameAr" class="col-form-label">{{ __('brand.brandNameAr') }}</label>
                                        <input type="text" name="brandNameAr" class="form-control" placeholder="{{__('brand.AddnewArabicName')}}" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="brandCode" class="col-form-label">{{ __('brand.brandCode') }}</label>
                                        <input type="text" name="brandCode" class="form-control" placeholder="{{__('brand.AddnewCode')}}" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="type">{{ __('brand.brandCategory') }}</label>
                                        <select class="form-control" name="categoryType" id="categoryType">
                                            <option selected value="">{{ __('brand.categorySelection') }}</option>
                                            @foreach($categories as $cate)
                                                <option value="{{$cate->name}}">@if($lang_current == 'ar') {{$cate->name_ar}} @else {{$cate->name}} @endif</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="nameOfAdd" class="col-form-label">{{ __('brand.nameOfAdd') }}</label>
                                        <input type="text" name="nameOfAdd" class="form-control" placeholder="{{auth()->user()->name}}" required="" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="cutting_method" class="col-form-label">{{ __('brand.brandImage') }}</label>
                                        <input type="file" name="brandImage" class="form-control" placeholder="{{__('brand.SelectnewImage')}}" required="">
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary pl-5 pr-5">{{ __('brand.brandSave') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>
    </div>
    </div>
    <!-- End col -->
    </div>
    <!-- End row -->
    </div>

    <!-- End Contentbar -->
@endsection
@section('script')


    <script src="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard//plugins/datepicker/i18n/datepicker.en.js') }}"></script>


    <script src="{{ asset('assets/dashboard//js/custom/custom-toasts.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('#default-date').datepicker({
                language: 'en',
                dateFormat: 'yyyy/mm/dd',
            });
            $('#default-date12').datepicker({
                language: 'en',
                dateFormat: 'yyyy/mm/dd',
            });

            $('#default-datatable').DataTable();

        });
    </script>
@endsection 
