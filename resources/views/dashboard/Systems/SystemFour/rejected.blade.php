@section('title')
    {{ __('Systems/SystemFour/quotations.quotations') }} | {{ __('Systems/SystemFour/quotations.rejected') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('Systems/SystemFour/quotations.quotations') }}</h4>  
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Systems/SystemFour/quotations.quotations') }}</li>
                    <li class="breadcrumb-item active">{{ __('Systems/SystemFour/quotations.rejected') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('quotations.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{ __('Systems/SystemFour/quotations.add') }}</a>
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
                    <div class="col-md-3 col-lg-3 pull-right">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            {{__('Systems/SystemFour/quotations.showOtherQuotations')}}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('quotations.completed')}}">{{__('Systems/SystemFour/quotations.completed')}}</a>
                            <a class="dropdown-item" href="{{route('quotations.pending')}}">{{__('Systems/SystemFour/quotations.pending')}}</a>
                            <a class="dropdown-item" href="{{route('quotations.rejected')}}">{{__('Systems/SystemFour/quotations.rejected')}}</a>
                            <a class="dropdown-item" href="{{route('quotations.understudying')}}">{{__('Systems/SystemFour/quotations.understudying')}}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="default-datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Systems/SystemFour/quotations.customer') }}</th>
                                <th>{{ __('Systems/SystemFour/quotations.invoiceNumber') }}</th>
                                <th>{{ __('Systems/SystemFour/quotations.invoiceDate') }}</th>
                                <th>{{ __('Systems/SystemFour/quotations.employee') }}</th>
                                <th>{{ __('Systems/SystemFour/quotations.status') }}</th>

                                <th>{{ __('Systems/SystemFour/quotations.detail') }}</th>
                                <th>{{ __('Systems/SystemFour/quotations.edit') }}</th>
                                <th>{{ __('Systems/SystemFour/quotations.delete') }}</th>
                                <th>{{ __('Systems/SystemFour/quotations.report') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($quotations) > 0)

                                @foreach($quotations as $key => $quotation)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $quotation->customer->customer_name }}</td>
                                        <td>{{ $quotation->invoice_number }}</td>
                                        <td>{{ $quotation->invoice_date }}</td>
                                        <td>{{ $quotation->staff->firstname }}</td>
                                        <td>
                                            <div class="button-list" >
                                                <a class="btn btn-info-rgba" href="{{ route('quotations.detail',$quotation->id) }}" title="Detail"><i class="feather icon-eye"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="button-list">
                                                <a class="btn btn-success-rgba"  title="Edit" href="{{ route('quotations.edit',$quotation->id) }}" ><i class="feather icon-edit-2"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="button-list">
                                                <a title="Delete" href='javascript:void(0);' class="btn btn-danger-rgba" onclick="confirm_delete({{$quotation->id}})"><i class="feather icon-trash"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="button-list">
                                                <a title="Report" href='javascript:void(0);' class="btn btn-warning-rgba" onclick="confirm_delete({{$quotation->id}})"><i class="fa fa-sticky-note-o"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <select onchange="status_change('{{$quotation->id}}', value)" class="dropdown-toggle btn-dark btn" id="status{{$key}}">
                                                <option @if($quotation->status == 'UnderStudying') selected @endif value="UnderStudying">{{__('Systems/SystemFour/quotations.understudying')}}</option>
                                                <option @if($quotation->status == 'Completed') selected @endif value="Completed">{{__('Systems/SystemFour/quotations.completed')}}</option>
                                                <option @if($quotation->status == 'Pending') selected @endif value="Pending">{{__('Systems/SystemFour/quotations.pending')}}</option>
                                                <option @if($quotation->status == 'Rejected') selected @endif value="Rejected">{{__('Systems/SystemFour/quotations.rejected')}}</option>
                                            </select>
                                        </td>
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

        function status_change(id, value) {
            $.ajax({
                method: "post",
                url: "{{url('dashboard/quotations/changeStatus')}}",
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                },
                type: "POST",
                data: {id: id, status: value},
                success: function (response) {
                    $(".table").load(location.href + " .table>*", "");
                }
            });
        }

        $(document).ready(function() {
            var buttonCommon = {
                exportOptions: {
                    format: {
                        body: function ( data, row, column ) {
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

            $('#default-datatable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'print',
                    } ),
                    // $.extend( true, {}, buttonCommon, {
                    //     extend: 'csvHtml5',
                    // } ),
                    // $.extend( true, {}, buttonCommon, {
                    //     extend: 'excelHtml5'
                    // } ),
                    // $.extend( true, {}, buttonCommon, {
                    //     extend: 'pdfHtml5'
                    // } ),
                ]
            });
        });

        function confirm_delete(id) {
            swal({
                title: 'Are you sure?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    method: "post",
                    url: "{{url('dashboard/quotations/destroy')}}",
                    headers: {
                        'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                    },
                    data : JSON.stringify({id : id}),
                    datatype: 'JSON',
                    contentType: 'application/json',

                    async: true,
                    success: function (data) {
                        //  wait.resolve();
                        $(".loadingMask").css('display', 'none');
                        if (data.errors) {
                            swal(
                                'Error',
                                'Please try again',
                                'error'
                            )
                        } else {
                            swal(
                                'Done!',
                                'Updated Successfully',
                                'success'
                            ).then(function (){
                                window.history.back();
                            });
                        }
                    },
                    error: function () {
                        swal(
                            'Error',
                            'Please try again',
                            'error'
                        )
                    }
                });

            }, function (dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Your imaginary data is safe :)',
                        'error'
                    )
                }
            })
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
    <script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>


@endsection