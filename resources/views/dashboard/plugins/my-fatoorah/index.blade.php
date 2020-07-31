@section('title')
    My Fatoorah
@endsection
@extends('dashboard.layouts.layout')
@section('style')
    <link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">My Fatoorah</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/plugins')}}">{{ __('side.plugins') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Fatoorah</li>
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
                        <form id="malath_form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="email">{{ __('general.email') }}</label>
                                        <input type="email" class="form-control" maxlength="100"
                                               value="{{$MyFatoorah ? $MyFatoorah->email : ""}}" name="email"
                                               id="email" required>
                                        <div class="error error_email"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="password">{{ __('general.password') }}</label>
                                        <input type="text" class="form-control" name="password" id="password"
                                               value="{{$MyFatoorah ? $MyFatoorah->password : ""}}" required>
                                        <div class="error error_password"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="button"
                                                class="btn btn-primary pl-5 pr-5 save">{{ __('general.save') }}</button>
                                        <div class="loadingMask">
                                            <img src="{{asset('assets/dashboard/images/loader.gif')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <!-- MaxLength js -->
    <script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>

    <script>
        $(document).ready(function () {
            var save = function () {
                $('.save').on("click", function () {
                    $(".loadingMask").css('display', 'inline-block');

                    $.ajax({
                        method: "post",
                        beforeSend: function () {
                            $(".loadingMask").css('display', 'inline-block');
                        },
                        url: "{{route('my_fatoorah.store')}}",

                        data:
                            new FormData($("#malath_form")[0])
                        ,
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        async: true,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            //  wait.resolve();
                            $(".loadingMask").css('display', 'none');
                            if (data.errors) {
                                $('.errors-m').remove();
                                jQuery.each(data.errors, function (key, value) {
                                    var errorValue = `<label class="errors-m">` + value + `</label>`;
                                    if (key == "email") {
                                        $('.error_email').append(errorValue);
                                    }
                                    if (key == "password") {
                                        $('.error_password').append(errorValue);
                                    }

                                });
                            } else {
                                $(".loadingMask").css('display', 'none');
                                swal(
                                    'Done!',
                                    'Updated Successfully',
                                    'success'
                                )
                            }
                        },
                        error: function () {
                            $(".loadingMask").css('display', 'none');
                            swal(
                                'Error',
                                'Please try again',
                                'error'
                            )
                        }
                    });


                });
            };
            save();

        });
    </script>
@endsection 
