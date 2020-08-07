
@section('title')
    {{__('Systems/SystemFour/quotations.editQuotation')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')


    <link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">


@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{__('Systems/SystemFour/staffs.addQuotation')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="{{route('jobtasks.index')}}">{{__('Systems/SystemFour/quotations.quotations')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFour/quotations.addQuotation')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="javascript:window.history.back();">{{__('Systems/SystemTwo/staffs.back')}}</a>
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
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form method="post" action="{{ route('quotations.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="employee">{{__('Systems/SystemFour/quotations.employee')}}</label>
                                        <select type="text" class="form-control" id="employee" name="employee_id"
                                                required="">
                                            <option>Select Employee</option>
                                            @foreach($employees as $employee)
                                                <option value={{$employee->id}} @if($employee->id == $quotation->employee_id) selected @endif>{{$employee->firstname}} {{$employee->secondname}} {{$employee->lastname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer">{{__('Systems/SystemFour/quotations.customer')}}</label>
                                        <select type="text" class="form-control" id="customer" name="customer_id"
                                                required="">
                                            <option>Select Customer</option>
                                            @foreach($customers as $customer)
                                                <option value={{$customer->id}} @if($customer->id == $quotation->customer_id) selected @endif>{{$customer->customer_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name">{{__('Systems/SystemFour/quotations.projectName')}}</label>
                                        <input type="text" class="form-control" id="project_name" name="project_name"
                                               value="{{$quotation->project_name}}" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_rate">{{__('Systems/SystemFour/quotations.discountRate')}}</label>
                                        <input type="text" class="form-control" id="discount_rate" name="discount_rate"
                                               value="{{$quotation->discount_rate}}" required="">
                                    </div>
                                    <div class="form-group row product1 morePro">
                                        <div class="col-md-8">
                                            <label>{{__('Systems/SystemFour/quotations.selectProduct')}}</label>
                                            <select class="form-control" name="product" required onchange="addMoreProducts(2)">
                                                {{--@foreach($products as $product)--}}
                                                {{--<option value={{$product->id}}>{{$product->name}}   <input type="number" min="0" id='{{$product->id}}qunt' name="{{$product->id}}qunt"></option>--}}
                                                {{--@endforeach--}}
                                                <option>Select Product</option>
                                                <option>Car</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity">{{__('Systems/SystemFour/quotations.quantity')}}</label>
                                            <input type="number" min="0" class="form-control" id="quantity" name="quantity" value="{{$quotation->quantity}}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group row product2 morePro">
                                        <div class="col-md-8">
                                            <label>{{__('Systems/SystemFour/quotations.selectProduct')}}</label>
                                            <select class="form-control" name="product2" required onchange="addMoreProducts(3)">
                                                {{--@foreach($products as $product)--}}
                                                {{--<option value={{$product->id}}>{{$product->name}}   <input type="number" min="0" id='{{$product->id}}qunt' name="{{$product->id}}qunt"></option>--}}
                                                {{--@endforeach--}}
                                                <option>Select Product</option>
                                                <option>Car</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity2">{{__('Systems/SystemFour/quotations.quantity')}}</label>
                                            <input type="number" min="0" class="form-control" id="quantity2" name="quantity2" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="form-group row product3 morePro">
                                        <div class="col-md-8">
                                            <label>{{__('Systems/SystemFour/quotations.selectProduct')}}</label>
                                            <select class="form-control" name="product3" required onchange="addMoreProducts(4)">
                                                {{--@foreach($products as $product)--}}
                                                {{--<option value={{$product->id}}>{{$product->name}}   <input type="number" min="0" id='{{$product->id}}qunt' name="{{$product->id}}qunt"></option>--}}
                                                {{--@endforeach--}}
                                                <option>Select Product</option>
                                                <option>Car</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity3">{{__('Systems/SystemFour/quotations.quantity')}}</label>
                                            <input type="number" min="0" class="form-control" id="quantity3" name="quantity3" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="form-group row product4 morePro">
                                        <div class="col-md-8">
                                            <label>{{__('Systems/SystemFour/quotations.selectProduct')}}</label>
                                            <select class="form-control" name="product4" onchange="addMoreProducts(5)" required>
                                                {{--@foreach($products as $product)--}}
                                                {{--<option value={{$product->id}}>{{$product->name}}   <input type="number" min="0" id='{{$product->id}}qunt' name="{{$product->id}}qunt"></option>--}}
                                                {{--@endforeach--}}
                                                <option>Select Product</option>
                                                <option>Car</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity4">{{__('Systems/SystemFour/quotations.quantity')}}</label>
                                            <input type="number" min="0" class="form-control" id="quantity4" name="quantity4" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="form-group row product5 morePro">
                                        <div class="col-md-8">
                                            <label>{{__('Systems/SystemFour/quotations.selectProduct')}}</label>
                                            <select class="form-control" name="product4" required>
                                                {{--@foreach($products as $product)--}}
                                                {{--<option value={{$product->id}}>{{$product->name}}   <input type="number" min="0" id='{{$product->id}}qunt' name="{{$product->id}}qunt"></option>--}}
                                                {{--@endforeach--}}
                                                <option>Select Product</option>
                                                <option>Car</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity5">{{__('Systems/SystemFour/quotations.quantity')}}</label>
                                            <input type="number" min="0" class="form-control" id="quantity5" name="quantity5" placeholder="Quantity">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fileUp">{{__('Systems/SystemFour/quotations.quantity')}}</label>
                                        <input type="file" class="form-control" id="fileUp" name="fileUp" value="{{$quotation->filename}}">
                                    </div>


                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="acceptTerms" onclick="enable()">
                                        <label class="custom-control-label" for="acceptTerms">I Agree with the Terms and Conditions.</label>
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <div class="form-group mb-0">
                                            <button type="submit" disabled="" id="create"
                                                    class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFour/quotations.add')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <p id="locale" style="display: none;"><?php echo app()->getLocale()?></p>

    <!-- End Contentbar -->
@endsection
@section('script')


    <script src="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard//plugins/datepicker/i18n/datepicker.en.js') }}"></script>


    <script src="{{ asset('assets/dashboard//js/custom/custom-toasts.js') }}"></script>

    <script>

        function enable() {
            if ($("#create").attr('disabled') === 'disabled'){
                $("#create").removeAttr('disabled');
            } else {
                $("#create").attr('disabled', 'disabled');
            }
        }

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
