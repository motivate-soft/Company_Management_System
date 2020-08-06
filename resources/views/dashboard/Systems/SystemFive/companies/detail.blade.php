@section('title')
    {{__('Systems/SystemFive/companies.company_add')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

<style>
    .textcolor-black { color:black; }
    .textalign-center { text-align: center; }
</style>

<link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/dropify/dropify.css')}}" rel="stylesheet"/>


@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemFive/companies.detail')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('companies.index')}}">{{__('Systems/SystemFive/companies.companies')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFive/companies.detail')}}</li>
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
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <span>{{__('Systems/SystemFive/companies.companyname')}}</span>:
                                <span class="textcolor-black">@if(isset($company->name)) {{ $company->name }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-4">

                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="widgetbar">
                                <a onclick="clearDelegate()" class="btn btn-primary-rgba" data-toggle="modal" data-target="#delegate" >{{__('Systems/SystemFive/delegates.add_delegate')}}</a>
                            </div>
                        </div>

                    </div>

                    <div class="card m-b-30">
                        <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-borderless" id="default-datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Systems/SystemFive/delegates.name')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.position')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.mobile')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.telephone')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.email')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.notes')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.cardimage')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.edit')}}</th>
                                <th>{{__('Systems/SystemFive/delegates.delete')}}</th>


                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($delegates) && count($delegates) > 0)
                                @foreach($delegates as $key => $delegate)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $delegate->name }}</td>
                                        <td>{{ $delegate->position }}</td>
                                        <td>{{ $delegate->mobile }}</td>
                                        <td>{{ $delegate->telephone }}</td>
                                        <td>{{ $delegate->email }}</td>
                                        <td>
                                            <a onclick="noteShow('{{$delegate->notes}}')" href="#" data-toggle="modal" data-target="#noteShow" class="btn btn-info-rgba"><i class="feather icon-eye"></i></a>
                                        </td>
                                        <td>{{ $delegate->cardimage }}</td>
                                        <td><a onclick="editDelegate('{{$delegate->id}}', '{{$delegate->name}}', '{{$delegate->position}}', '{{$delegate->mobile}}', '{{$delegate->telephone}}', '{{$delegate->email}}', '{{$delegate->notes}}', '{{$delegate->cardimage}}')" href="#" data-toggle="modal" data-target="#delegate"  class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a></td>
                                        <td><a onclick="deleteConfirm({{$delegate->id}})" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

<!-- End Contentbar -->

<!-- The Notes Modal -->
<div class="modal fade" id="noteShow" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">{{__('Systems/SystemTwo/jobtasks.job_note')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea id="notes_view" name="notes_view" style="width:100%;height:200px;" readonly></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- The Delegate Modal -->
<div class="modal fade" id="delegate" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">{{__('Systems/SystemTwo/jobtasks.job_note')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('delegates.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="company_id" name="company_id" value="{{$company->id}}">
                    <input type="hidden" id="delegate_id" name="delegate_id" value="">
                    <label for="name">{{__('Systems/SystemFive/delegates.name')}}</label>
                    <input type="text" id="name" name="name" class="form-control" required/>
                    <label for="position">{{__('Systems/SystemFive/delegates.position')}}</label>
                    <input type="text" id="position" name="position" class="form-control" required/>
                    <label for="mobile">{{__('Systems/SystemFive/delegates.mobile')}}</label>
                    <input type="number" id="mobile" name="mobile" class="form-control" required/>
                    <label for="telephone">{{__('Systems/SystemFive/delegates.telephone')}}</label>
                    <input type="number" id="telephone" name="telephone" class="form-control" required/>
                    <label for="email">{{__('Systems/SystemFive/delegates.email')}}</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <label for="notes">{{__('Systems/SystemFive/delegates.notes')}}</label>
                    <textarea type="text" id="notes" name="notes" class="form-control" required></textarea>
                    <label for="cardimage">{{__('Systems/SystemFive/delegates.cardimage')}}</label>
                    <input type="text" id="cardimage" name="cardimage" class="form-control"/>

                    <div class="example">
                        <div class="dropify-wrapper has-preview">
                            <div class="dropify-message">
                                <span class="file-icon"></span>
                                <p>Drag and drop a file here or click</p>
                                <p class="dropify-error">Ooops, something wrong appended.</p>
                            </div>
                            <div class="dropify-loader" style="display: none;"></div>
                            <div class="dropify-errors-container">
                                <ul></ul>
                            </div>
                            <input type="file" id="input-file-now-custom-1" data-plugin="dropify" data-height="100" data-width="150" data-default-file="{{asset('upload/Systems/SystemFive/contact.png')}}">
                            <button type="button" class="dropify-clear">Remove</button>
                            <div class="dropify-preview" style="display: block;">
                                <span class="dropify-render">
                                    <img src="{{asset('upload/Systems/SystemFive/contact.png')}}">
                                </span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner">
                                        <p class="dropify-filename">
                                            <span class="file-icon"></span>
                                            <span class="dropify-filename-inner">placeholder.png</span>
                                        </p>
                                        <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 textalign-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        </div>
                        <div class="col-sm-6 textalign-center">
                            <input type="submit" class="btn btn-success" value="Add">

                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datepicker/i18n/datepicker.en.js') }}"></script>


 <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>

<!-- Sweet-Alert js -->
<script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>

<script src="{{asset('assets/dropify/dropify.js')}}"></script>
<script src="{{asset('assets/dropify/dropify_plugin.js')}}"></script>
<script src="{{asset('assets/blueimp-file-upload/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/blueimp-file-upload/jquery.fileupload-image.js')}}"></script>
<script src="{{asset('assets/blueimp-load-image/load-image.all.min.js')}}"></script>

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
function noteShow(jobnote) {

    $("#notes_view").html(jobnote);

    return true;
}
function editDelegate(id, name, position, mobile, telephone, email, notes, cardimage) {

    console.log(id);
    console.log(notes);

    $("#delegate_id").val(id);
    $("#name").val(name);
    $("#position").val(position);
    $("#mobile").val(mobile);
    $("#telephone").val(telephone);
    $("#email").val(email);
    $("#notes").html(notes);
    $("#cardimage").val(cardimage);

    return true;

}

function clearDelegate() {

    $("#delegate_id").val("");
    $("#name").val("");
    $("#position").val("");
    $("#mobile").val("");
    $("#telephone").val("");
    $("#email").val("");
    $("#notes").html("");
    $("#cardimage").val("");

    return true;

}
function deleteConfirm(id) {

    console.log($("#company_id").val());

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
            url: "{{url('dashboard/del-delegate')}}",
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
                        {{--window.location = "{{route('companies.detail', $("#company_id").val())}}"--}}
                        window.location = "/dashboard/detail-company/" + $("#company_id").val();
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
                'Your delegate data is safe :)',
                'error'
            )
        }
    })

}
</script>



@endsection
