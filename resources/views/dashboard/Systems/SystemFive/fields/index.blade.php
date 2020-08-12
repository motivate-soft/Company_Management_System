@section('title')
    {{__('Systems/SystemFive/fields.fields')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

{{--<style>--}}
    {{--td { text-align: center; }--}}
{{--</style>--}}

<link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />


@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemFive/fields.fields_list')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{__('Systems/SystemFive/fields.fields')}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/fields.fields_list')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('fields.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{__('Systems/SystemFive/fields.add_field')}}</a>
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
                                    <th>{{__('Systems/SystemFive/fields.name')}}</th>
                                    <th>{{__('Systems/SystemFive/fields.state')}}</th>
                                    <th>{{__('Systems/SystemFive/fields.edit')}}</th>
                                    <th>{{__('Systems/SystemFive/fields.delete')}}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($fields) && count($fields) > 0)
                                    @foreach($fields as $key => $field)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $field->name }}</td>
                                            <td>
                                                <div class="custom-control custom-switch" >
                                                    <input type="checkbox" onclick="status_change('{{csrf_token()}}','{{$field->id}}','{{url('dashboard/field-state')}} ')" {{ $field->state == 1 ? 'checked':''}} class="custom-control-input" id="customSwitch{{$key}}">
                                                    <label class="custom-control-label" for="customSwitch{{$key}}"></label>
                                                </div>
                                            </td>
                                            <td><a href="{{route('fields.edit', $field->id)}}" class="btn btn-success-rgba"><i class="feather icon-eye"></i></a></td>
                                            <td><a onclick="deleteConfirm({{$field->id}})" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a></td>
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

<!-- Sweet-Alert js -->
<script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>

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
                columns: [ 0, 1]
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
<script>
    function deleteConfirm(id) {

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
                url: "{{url('dashboard/del-field')}}",
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                },

                data : JSON.stringify({id : id}),
                datatype: 'JSON',
                contentType: 'application/json',

                async: true,
                success: function (data) {
                    console.log(data);
                    //  wait.resolve();
                    $(".loadingMask").css('display', 'none');

                    if (data === 0) {
                        swal(
                            'Error',
                            'Please try again',
                            'error'
                        )
                    } else {
                        swal(
                            'Done!',
                            'Deleted Successfully',
                            'success'
                        ).then(function (){
                            window.location = "{{route('fields.index')}}"
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
                    'Your field data is safe :)',
                    'error'
                )
            }
        })

    }

</script>
@endsection
