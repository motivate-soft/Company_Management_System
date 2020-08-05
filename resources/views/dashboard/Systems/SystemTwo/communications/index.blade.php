@section('title')
    {{__('Systems/SystemTwo/communications.communications')}}
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

<link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />


@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemTwo/communications.communication_list')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{__('Systems/SystemTwo/communications.communications')}}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/communications.communication_list')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('communications.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{__('Systems/SystemTwo/communications.add_communication')}}</a>
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
                                    <th>{{__('Systems/SystemTwo/communications.transaction_type')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.entity_name')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.transaction_explanation')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.letter_authorized')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.employee_responsible')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.status_letter')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.date_letter')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.detail')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.amend')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.add_response')}}</th>
                                    <th>{{__('Systems/SystemTwo/communications.delete')}}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($communications) && count($communications) > 0)
                                    @foreach($communications as $key => $communication)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $communication->transaction_type }}</td>
                                            <td>{{ $communication->entity_name }}</td>
                                            <td>
                                                <a onclick="explanation('{{$communication->transaction_explanation}}')" data-toggle="modal" data-target="#explanationShow" class="btn btn-info-rgba"><i class="feather icon-tag"></i></a>
                                            </td>
                                            <td>{{ $communication->letter_authorized }}</td>
                                            <td>{{ $communication->employee_responsible }}</td>
                                            <td>

                                                <div class="custom-control custom-switch" >
                                                    <input type="checkbox" onclick="status_change('{{csrf_token()}}','{{$communication->id}}','{{url('communication-status')}} ')" {{ $communication->status_letter == 1?'checked':''}} class="custom-control-input" id="customSwitch{{$key}}">
                                                    <label class="custom-control-label" for="customSwitch{{$key}}"></label>
                                                </div>

                                            </td>
                                            <td>{{ $communication->date_letter }}</td>

                                            <td><a href="{{route('communications.detail', $communication->id)}}" class="btn btn-info-rgba"><i class="feather icon-eye"></i></a></td>
                                            <td><a href="{{route('communications.edit', $communication->id)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a></td>
                                            <td><a onclick="response({{$communication->id}})" data-toggle="modal" data-target="#createNewCategory" class="btn btn-danger-rgba"><i class="feather icon-message-square"></i></a></td>
                                            <td><a onclick="deleteConfirm({{$communication->id}})" href="#" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a></td>

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

<!-- The Response Modal -->
<div class="modal fade" id="createNewCategory" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">{{__('Systems/SystemTwo/communications.add_response_header')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('communications.add_response') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input id="communication_id" type="hidden" name="communication_id" >
                    <textarea id="response" name="response" style="width:100%;height:200px;"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- The Explanation Modal -->
<div class="modal fade" id="explanationShow" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">{{__('Systems/SystemTwo/communications.explanation')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea id="explanation" name="explanation" style="width:100%;height:200px;" readonly></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

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
                columns: [ 0, 1, 2, 4, 5, 6, 7 ]
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
    function response(id) {

        document.getElementById("communication_id").value = id;
        return true;
    }
    function explanation(explanation) {

        document.getElementById("explanation").innerHTML = explanation;
        return true;
    }
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
                url: "{{url('dashboard/del-communication')}}",
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
                            window.location = "{{route('communications.index')}}"
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
                    'Your communication data is safe :)',
                    'error'
                )
            }
        })

    }

</script>
@endsection
