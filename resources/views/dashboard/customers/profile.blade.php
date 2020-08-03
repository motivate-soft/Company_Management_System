@section('title')
    Profile
@endsection
@extends('dashboard.layouts.layout')
@section('style')


    <link href="{{ asset('assets/dashboard/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('customers/customers.customersList') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item">{{ __('side.customers') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
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
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Description</th>
                                    <th>Coupon Number</th>
                                    <th>amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($purchases) > 0)

                                    @foreach($purchases as $key => $purchase)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            {{--<td>{{ $customer->name }}</td>--}}
                                            {{--<td>{{ $customer->email }}</td>--}}
                                            {{--<td>{{ $customer->phone }}</td>--}}
                                            <td>{{ $purchase->created_at }}</td>
                                            <td>{{ $purchase->customer->customer_name }}</td>
                                            <td>{{ $purchase->description }}</td>
                                            <td>{{ $purchase->coupon_number }}</td>
                                            <td>{{ $purchase->amount }}</td>
                                            {{--<td>--}}
                                            {{--<div class="custom-control custom-switch" >--}}
                                            {{--<a class="btn btn-info-rgba" href="{{ route('customers.profile',$customer->id) }}" title="Profile"><i class="feather icon-info"></i></a>--}}
                                            {{--</div>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                            {{--<div class="button-list">--}}
                                            {{--<a class="btn btn-success-rgba"  title="Edit" href="{{ route('customers.edit',$customer->id) }}" ><i class="feather icon-edit-2"></i></a>--}}

                                            {{--<a href="{{ route('customers.destroy',$customer->id) }}" title="Delete" class="btn btn-danger-rgba" onclick="return confirm('Are you sure？')"><i class="feather icon-trash"></i></a>--}}
                                            {{--</div>--}}
                                            {{--</td>--}}
                                        </tr>
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
    <!-- End Contentbar -->


@endsection
@section('script')

    <script src="{{ asset('assets/dashboard/dashboard/plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-form-wizard.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>

    <script src="{{ asset('assets/dashboard/plugins/select2/select2.min.js') }}"></script>

@endsection