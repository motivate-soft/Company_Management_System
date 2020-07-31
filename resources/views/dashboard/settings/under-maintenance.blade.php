@section('title')
    Under Maintenance
@endsection
@extends('layouts.main')
@section('style')
    <link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Under Maintenance</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Under Maintenance</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 text-right">
                    @csrf
                    @if(!$setting->under_maintenance)
                        <button type="submit" class="btn btn-primary active">Activate</button>
                    @else
                        <button type="submit" class="btn btn-danger active">Deactivate</button>
                    @endif
            </div>
        </div>
    </div>


    <!-- End Contentbar -->
@endsection
@section('script')

    <!-- Sweet-Alert js -->
    <script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>

    <script>
        $(document).ready(function () {
            var active = function () {
                $('.active').on("click", function () {
                    var this_item = $(this);
                    var id = $(this).parent().find('.id').val();
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
                            url: "{{route('settings.underMaintenanceUpdate')}}",
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },

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
                                        window.location = "{{route('settings.underMaintenanceView')}}"
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


                });
            };

            active();
        });
    </script>
@endsection 
