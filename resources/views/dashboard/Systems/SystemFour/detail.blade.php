@section('title')
    {{__('Systems/SystemFour/quotations.detail')}}
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
                <h4 class="page-title">{{ __('quotations/quotations.quotationsList') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Systems/SystemFour/quotations.quotations') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Systems/SystemFour/quotations.detail') }}</li>
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
                        <div class="row">
                            <div class="col-lg-3 mb-4">
                                <div class="form-group mb-0">
                                    <span>{{__('Systems/SystemFour/quotations.employee')}}</span>
                                    <p class="text-dark">{{ $quotation->staff->firstname }} {{ $quotation->staff->secondname }} {{ $quotation->staff->lastname }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-4">
                                <div class="form-group mb-0">
                                    <span>{{__('Systems/SystemFour/quotations.customer')}}</span>
                                    <p class="text-dark">{{ $quotation->customer->customer_name }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-4">
                                <div class="form-group mb-0">
                                    <span>{{__('Systems/SystemFour/quotations.membership')}}</span>
                                    <p class="text-dark">{{ $quotation->customer->membership }}</p>
                                </div>
                            </div>
                            {{--<div class="col-lg-3 mb-4">--}}
                                {{--<div class="form-group mb-0">--}}
                                    {{--<span>{{__('Systems/SystemFour/quotations.invoice_number')}}</span>--}}
                                    {{--<p class="text-dark">{{ $quotation->invoice->id }}</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-3 mb-4">--}}
                                {{--<div class="form-group mb-0">--}}
                                    {{--<span>{{__('Systems/SystemFour/quotations.invoice_date')}}</span>--}}
                                    {{--<p class="text-dark">{{ $quotation->invoice->created_at }}</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-lg-3 mb-4">
                                <div class="form-group mb-0">
                                    <span>{{__('Systems/SystemFour/quotations.projectName')}}</span>
                                    <p class="text-dark">{{ $quotation->project_name }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-4">
                                <div class="form-group mb-0">
                                    <span>{{__('Systems/SystemFour/quotations.discountRate')}}</span>
                                    <p class="text-dark">{{ $quotation->discount_rate }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-4">
                                <div class="form-group mb-0">
                                    <span>{{__('Systems/SystemFour/quotations.description')}}</span>
                                    <p class="text-dark">{{ $quotation->description }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-4">
                                <div class="form-group mb-0">
                                    <span>{{__('Systems/SystemFour/quotations.status')}}</span>
                                    <p class="text-dark">{{ $quotation->status }}</p>
                                </div>
                            </div>
                            {{--<div class="col-lg-3 mb-4">--}}
                                {{--<div class="form-group mb-0">--}}
                                    {{--<span>{{__('Systems/SystemFour/quotations.products')}}</span>--}}
                                    {{--<p class="text-dark">{{ $quotation->product->name }}</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-lg-3 mb-4">--}}
                                {{--<div class="form-group mb-0">--}}
                                    {{--<span>{{__('Systems/SystemFour/quotations.report')}}</span>--}}
                                    {{--<p class="text-dark">{{ $quotation->report->description }}</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="row">
                            @foreach($quotation->products as $item)
                                <div class="col-lg-12" style="display: flex;">
                                    <div class="form-group mb-0 mr-5">
                                        <span>{{__('Systems/SystemFour/quotations.product_name')}}</span>
                                        <p class="text-dark">{{ $item->name}}</p>
                                    </div>
                                    @php
                                        $quo_quantities = \App\Model\dashboard\systems\SystemFour\ProductQuotation::where('quotation_id', $quotation->id)->get();
                                    @endphp
                                    @foreach($quo_quantities as $quo_quantity)
                                        @if($quotation->id == $quo_quantity->quotation_id && $item->id == $quo_quantity->product_id)
                                        <div class="form-group mb-0">
                                            <span>{{__('Systems/SystemFour/quotations.quantity')}}</span>
                                            <p class="text-dark">{{ $quo_quantity->quantity }}</p>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
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
                            if(row == 4){
                                return $('#customSwitch' + column).is(":checked") ? 'Active' : 'Inactive' ;
                            }
                            return data;
                        }
                    },
                    columns: [ 0, 1, 2, 3,4 ]
                }
            };

            $('#default-datatable').DataTable( {
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
            } );
        });
    </script>
@endsection