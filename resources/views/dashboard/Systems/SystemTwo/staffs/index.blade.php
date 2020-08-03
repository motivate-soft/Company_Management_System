@section('title')
    {{__('Systems/SystemTwo/staffs.staffs')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    td { text-align: center; }
</style>

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemTwo/staffs.staff_list')}}</h4>
{{--            <h4 class="page-title">{{__('coupon.couponCode')}}</h4>--}}
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{__('Systems/SystemTwo/staffs.staffs')}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/staffs.staff_list')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('staffs.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{__('Systems/SystemTwo/staffs.add_staff')}}</a>
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
                                    <th>{{__('Systems/SystemTwo/staffs.firstname')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.secondname')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.lastname')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.mobile_number')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.monthly_salary')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.working_hours')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.email')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.address')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.country')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.province')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.city')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.selection_powers')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.detail')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.edit')}}</th>
                                    <th>{{__('Systems/SystemTwo/staffs.delete')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($staffs) && count($staffs) > 0)
                                    @foreach($staffs as $key => $staff)
                                        <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $staff->firstname }}</td>
                                        <td>{{ $staff->secondname }}</td>
                                        <td>{{ $staff->lastname }}</td>
                                        <td>{{ $staff->mobile_number }}</td>
                                        <td>{{ $staff->monthly_salary }}</td>
                                        <td>{{ $staff->working_hours }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->address }}</td>
                                        <td>{{ $staff->country }}</td>
                                        <td>{{ $staff->province }}</td>
                                        <td>{{ $staff->city }}</td>
                                        <td>{{ $staff->selection_powers }}</td>

                                        <td><a href="{{route('staffs.detail', $staff->id)}}" class="btn btn-info-rgba"><i class="feather icon-eye"></i></a></td>
                                        <td><a href="{{route('staffs.edit', $staff->id)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a></td>
                                        <td><a onclick="return confirm('Are you sure?')" href="{{url('dashboard/del-staff')}}/{{ $staff->id }}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a></td>
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

        var buttonCommon = {
            exportOptions: {
                format: {
                    body: function ( data, row, column, node ) {
                        // Strip $ from salary column to make it numeric
                        console.log(row);
                        if(row === 4){
                            return $('#customSwitch' + column).is(":checked") ? 'Active' : 'Inactive' ;
                        }
                        return data;
                    }
                },
                columns: [ 0, 1, 2, 3,4 ]
            }
        };

        $('#default-datatable').DataTable(

            {
                dom: 'Bfrtip',
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'print',
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'csvHtml5',
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'excelHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    } ),
                ]
            }

        );

    });
</script>
@endsection
