@section('title')
{{__('category.title')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('category.title')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.products') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('side.categories')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('categories.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{__('category.categoryAdd')}}</a>
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
                                    <th>{{ __('category.id') }}</th>
                                    <th>{{ __('category.categoryName') }}</th>
                                    <th>{{ __('category.categoryNameAr') }}</th>
                                    <th>{{ __('category.categoryCode') }}</th>
                                    <th>{{ __('category.nameOfAdd') }}</th>
                                    <th>{{ __('category.dateOfAdd') }}</th>
                                    <th>{{ __('category.categoryDetail') }}</th>
                                    <th>{{ __('category.categoryEdit') }}</th>
                                    <th>{{ __('category.categoryDelete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($cuttings) > 0)
                                    @foreach($cuttings as $key => $cut)
                                        <tr>
                                            <td scope="row">{{ $key+1 }}</td>
                                            <td>{{ $cut->name }}</td>
                                            <td>{{ $cut->name_ar }}</td>
                                            <td>{{ $cut->code }}</td>
                                            <td>{{ $cut->created_by }}</td>
                                            <td>{{ $cut->add_date }}</td>
                                            <td>
                                                <div class="button-list">
                                                    <a href="{{route('categories.detail', $cut->id)}}" class="btn btn-success-rgba"><i class="feather icon-eye"></i></a>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="button-list">
                                                    <a href="{{route('categories.editview', $cut->id)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="button-list">
                                                    <a onclick="deleteConfirm({{$cut->id}})" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                                </div>
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
<script>
    function edit(data) {

        console.log(data);
        document.getElementById("edit_id").value = data.id;
        document.getElementById("edit_name").value = data.category_name;
        document.getElementById("edit_code").value = data.category_code;
        document.getElementById("edit_nameadd").value = data.name_of_who_added;
        document.getElementById("default-date").value = data.date_of_addition;
    }
</script>

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

    <!-- Sweet-Alert js -->
    <script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#default-datatable').DataTable();

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
                url: "{{url('dashboard/delete_category')}}",
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
                            window.location = "{{route('categories.index')}}"
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
                    'Your Category data is safe :)',
                    'error'
                )
            }
        })

    }
    </script>
@endsection
