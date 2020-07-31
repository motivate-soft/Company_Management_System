@section('title')
{{ __('coupon.couponList') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('coupon.couponList') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.marketing') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('side.coupons') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('coupons.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{ __('coupon.couponAdd') }}</a>
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
                                    <th>{{ __('coupon.couponCode') }}</th>
                                    <th>{{ __('coupon.couponType') }}</th>
                                    <th>{{ __('coupon.couponValue') }}</th>
                                    <th>{{ __('coupon.couponStart') }}</th>
                                    <th>{{ __('coupon.couponEnd') }}</th>
                                    <th>{{ __('coupon.couponStatus') }}</th>
                                    <th>{{ __('coupon.total_usage') }}</th>
                                    <th>{{ __('coupon.total_usage_per_client') }}</th>
                                    <th>{{ __('coupon.couponEdit') }}</th>
                                    <th>{{ __('coupon.couponDelete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($coupons) && count($coupons) > 0)
                                    @foreach($coupons as $key => $coupon)
                                        <tr>

                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->type }}</td>
                                        <td>{{ $coupon->coupon_value }}@if($coupon->type == "Percentage")%@endif</td>
                                        <td>{{ $coupon->start_time }}</td>
                                        <td>{{ $coupon->end_time }}</td>
                                        <td>


                        <div class="custom-control custom-switch" >
                        <input type="checkbox" onclick="status_change('{{csrf_token()}}','{{$coupon->id}}','{{url('coupon-status')}} ')" {{ $coupon->status == 1?'checked':''}} class="custom-control-input" id="customSwitch{{$key}}">
                        <label class="custom-control-label" for="customSwitch{{$key}}"></label>
                              </div>

                                        </td>
                                            <td>{{ $coupon->orders->count() }}</td>
                                            <td>{{ $coupon->total_usage }}</td>
                                        <td><a href="{{route('coupons.edit', $coupon->id)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a></td>
                                        <td><a onclick="return confirm('Are you sure?')" href="{{url('dashboard/del-coupon')}}/{{ $coupon->id }}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a></td>
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
<script>

    function status_change(token, id, route) {
        $.ajax({
            url : route,
            type: "POST",
            data: {_token: token, id: id},
            success: function (response) {
                //$(".table").load(location.href + " .table>*", "");
            }
        });
    }
</script>

<script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>

<script>
    $(document).ready(function() {

        $('#default-datatable').DataTable();



    });
</script>
@endsection
