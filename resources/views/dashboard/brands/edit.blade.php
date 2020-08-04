@section('title')
{{ __('brand.brandEditTitle') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')
    @php
        $lang_current = Config::get('app.locale');
    @endphp
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
            <h4 class="page-title">{{ __('brand.brandEditTitle') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.products') }}</li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{route('brands.index')}}">{{__('side.brands')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('brand.brandEditTitle') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('brands.index') }}" >{{ __('brand.brandBack') }}</a>
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
            <form method="post" action="{{ route('brands.edit') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="brandId" value="{{ $data->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('brand.brandName') }}</label>
                                <input type="text" @if(isset($data->name)) value="{{ $data->name }}"@endif name="brandName" class="form-control" placeholder="{{__('brand.AddnewName')}}" required="">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('brand.brandNameAr') }}</label>
                                <input type="text" @if(isset($data->name_ar)) value="{{ $data->name_ar }}"@endif name="brandName" class="form-control" placeholder="{{__('brand.AddnewName')}}" required="">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('brand.brandCode') }}</label>
                                <input type="text" @if(isset($data->code)) value="{{ $data->code }}"@endif name="brandCode" class="form-control" placeholder="{{__('brand.AddnewCode')}}" required="">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="type">{{ __('brand.categoryType') }}</label>
                                <select class="form-control" name="categoryType" required="" id="categoryType">
                                    <option disabled selected value="">{{ __('brand.categorySelection') }}</option>
                                    @foreach($categories as $cate)
                                        <option value="{{$cate->category_name}}" @if(isset($data->category_type) && $data->category_type == "$cate->category_name") selected @endif>@if($lang_current == 'ar') {{$cate->name_ar}} @else {{$cate->name}} @endif</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label for="cutting_method" class="col-form-label">{{ __('brand.nameOfAdd') }}</label>
                                <input type="text" @if(isset($data->created_by)) value="{{ $data->created_by }}"@endif name="nameOfAdd" class="form-control" placeholder="{{__('brand.AddnewNameof')}}" required="" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="form-group mb-0">
                                <label>{{ __('brand.dateOfAdd') }}</label>
                                <div class="input-group">
                                    <input type="text" id="default-date12" class="form-control"
                                           placeholder="yyyy/mm/dd" aria-describedby="basic-addon2"
                                           name="dateOfAdd" @if(isset($data->date_of_addition)) value="{{ $data->date_of_addition }}"@endif autocomplete="off"/>
                                    <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit"
                                        class="btn btn-primary pl-5 pr-5">{{ __('brand.brandSave') }}</button>
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
