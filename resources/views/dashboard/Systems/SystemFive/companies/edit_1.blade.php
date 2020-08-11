@section('title')
{{__('Systems/SystemFive/companies.companies_edit')}}
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
            <h4 class="page-title">{{__('Systems/SystemFive/companies.edit_company')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('companies.index')}}">{{__('Systems/SystemFive/companies.companies')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/companies.edit_company')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('companies.index') }}" >{{__('Systems/SystemFive/companies.back')}}</a>
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
            <form method="post" action="{{ url('dashboard/edit-company') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="company_id" value="{{ $company->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="name">{{__('Systems/SystemFive/companies.name')}}</label>
                                <input type="text" class="form-control" id="code" name="name"
                                       placeholder="name" required="" @if(isset($company->name)) value="{{$company->name}}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="field">{{__('Systems/SystemFive/companies.field')}}</label>
                                <select class="form-control" id="field" name="field">
                                    <option value="economics">economics</option>
                                    <option value="stock">stock</option>
                                    <option value="account">account</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="country">{{__('Systems/SystemFive/companies.country')}}</label>
                                <select class="form-control" id="country" name="country">
                                    <option value="economics">economics</option>
                                    <option value="stock">stock</option>
                                    <option value="account">account</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="city">{{__('Systems/SystemFive/companies.city')}}</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="economics">economics</option>
                                    <option value="stock">stock</option>
                                    <option value="account">account</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="mobile">{{__('Systems/SystemFive/companies.mobile')}}</label>
                                <input type="tel" class="form-control" id="mobile" name="mobile"
                                       placeholder="mobile" required="" @if(isset($company->mobile)) value="{{$company->mobile}}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="telephone">{{__('Systems/SystemFive/companies.telephone')}}</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone"
                                       placeholder="telephone" required="" @if(isset($company->telephone)) value="{{$company->telephone}}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="email">{{__('Systems/SystemFive/companies.email')}}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="email" required="" @if(isset($company->email)) value="{{$company->email}}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="address">{{__('Systems/SystemFive/companies.address')}}</label>
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="address" required="" @if(isset($company->address)) value="{{$company->address}}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="bankaccount">{{__('Systems/SystemFive/companies.bankaccount')}}</label>
                                <input type="text" class="form-control" id="bankaccount" name="bankaccount"
                                       placeholder="bankaccount" required="" @if(isset($company->bankaccount)) value="{{$company->bankaccount}}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="cardimage">{{__('Systems/SystemFive/companies.cardimage')}}</label>
                                <input type="text" class="form-control" id="cardimage" name="cardimage"
                                       placeholder="cardimage" @if(isset($company->cardimage)) value="{{$company->cardimage}}" @endif>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="catalogfile">{{__('Systems/SystemFive/companies.catalogfile')}}</label>
                                <input type="file" class="form-control" id="catalogfile" name="catalogfile"
                                       placeholder="catalogfile" >
                            </div>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="pricelistfile">{{__('Systems/SystemFive/companies.pricelistfile')}}</label>
                                <input type="file" class="form-control" id="pricelistfile" name="pricelistfile"
                                       placeholder="pricelistfile">
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFive/companies.save')}}</button>
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
