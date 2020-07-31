@section('title')
    {{__('general.text_messages')}}
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
                <h4 class="page-title">{{__('general.text_messages')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/plugins')}}">{{ __('side.plugins') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('general.text_messages')}}</li>
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

                        @if($malath->status)
                            <h4 class="mb-4">{{__('general.balance').': '.$balance .' '.__('general.messages')}}</h4>
                        <form id="malath_form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="mobile_no">{{ __('general.mobile_no') }}</label>
                                        <input type="text" class="form-control"
                                               name="mobile_no"
                                               id="mobile_no" required>
                                        <div class="error error_mobile_no"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="message">{{ __('general.message') }}</label>
                                        <input type="text" class="form-control" name="message" id="message" required>
                                        <div class="error error_message"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="form-group mb-0">
                                        <button type="button"
                                                class="btn btn-primary pl-5 pr-5 save">{{ __('general.send') }}</button>
                                        <div class="loadingMask">
                                            <img src="{{asset('assets/dashboard/images/loader.gif')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                            @else
                        <h4>{{__('general.Please activate one from the available sms gateway')}}</h4>
                        @endif
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
                        url: "{{route('malath.sendSMS')}}",

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
                                    if (key == "mobile_no") {
                                        $('.error_mobile_no').append(errorValue);
                                    }
                                    if (key == "message") {
                                        $('.error_message').append(errorValue);
                                    }

                                });
                            } else {
                                $(".loadingMask").css('display', 'none');
                                if (data.message == 0){
                                    swal(
                                        'Done!',
                                        'Send Successfully',
                                        'success'
                                    )
                                } else{
                                    swal(
                                        'Error',
                                        'Please try again',
                                        'error'
                                    )
                                }

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
