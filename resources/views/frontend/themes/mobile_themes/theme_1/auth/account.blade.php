@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{__('frontend/mobileViews/theme_1.profile')}}
@endsection
@section('style')
    .app-main-top-info {
    display: none;
    }
    .detaisl-sldier-area {
    margin-top: -33px !important;
    }
@endsection
@section('css')
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    <form id="user">
        @CSRF
        <div class="app-main-wrp type-2">
            <div class="viewport-wrap type-2">
                <div class="top-zone">
                    <div class="secondary-title bdr-btm">
                        <a href="#" class="back-arrow"><img
                                src="{{asset('assets/site/mobileView/assets/img/left-long-arrow.svg')}}" alt=""></a>
                        <h3>{{__('frontend/mobileViews/theme_1.profile')}}</h3>
                    </div>
                    <div class="step-content-wrap">

                        <div class="pf-photo-wrap">
                            <div class="pf-photo">
                                @if(!auth()->user()->photo)
                                    <img src="{{asset('assets/site/mobileView/assets/img/user-oval.png')}}" alt="">
                                @else
                                    <img src="{{asset('uploads/users/'. auth()->user()->photo)}}" alt="">

                                @endif
                                <label class="input-from-source"><input type="file" name="photo"><img
                                        src="{{asset('assets/site/mobileView/assets/img/camera.svg')}}" alt=""></label>
                            </div>
                        </div>
                        <form action="">
                            <div class="tertiary-wrap edited-pge">
                                <h4 class="tertiary-title">{{__('general.User_Information')}}</h4>
                                <div class="credit-card-details">
                                    <div class="input-inside style-3">
                                        <label for="name">{{__('general.name')}}</label>
                                        <input type="text" name="name" id="name" placeholder=""
                                               value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="input-inside style-3">
                                        <label for="email">{{__('general.email')}}</label>
                                        <input type="email" name="email" id="email" placeholder=""
                                               value="{{Auth::user()->email}}">
                                    </div>
                                    <div class="input-inside style-3">
                                        <label for="phone">{{__('general.phone')}}</label>
                                        <input type="text" name="phone" id="phone" value="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="address-box change-password box-shadow">
                                <div class="input-inside style-2">
                                    <h4 class="tertiary-title text-center">{{__('general.change_password')}}</h4>
                                </div>
                                <div class="input-inside style-2">
                                    <input type="password" name="old_password"
                                           placeholder="{{__('general.current_password')}}">
                                </div>
                                <div class="input-inside style-2">
                                    <input type="password" name="password"
                                           placeholder="{{__('general.new_password')}}">
                                </div>
                                <div class="input-inside style-2">
                                    <input type="password" name="password_confirmation"
                                           placeholder="{{__('general.confirm_new_password')}}">
                                </div>
                            </div>
                            <button type="button" class="save-btn full-w save">{{__('general.save')}}</button>
                        </form>
                    </div>
                </div> <!-- ./top-zone -->
            </div> <!-- ./viewport-wrap -->
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-sweet-alert.js') }}"></script>
    <script>

        $(document).ready(function () {
            var save = function () {
                $('.save').on("click", function () {
                    $.ajax({
                        method: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        url: '{{route('user.updateAccount')}}',
                        data:
                            new FormData($("#user")[0])
                        ,
                        async: true,
                        processData: false,
                        contentType: false,
                        success: function (data) {

                            //  wait.resolve();
                            $(".loadingMask").css('display', 'none');
                            if (data.errors) {
                                swal(
                                    '{{__('general.error')}}!',
                                    '{{__('general.please_try_again')}}!',
                                    'error'
                                )
                            } else {
                                swal(
                                    '{{__('general.done')}}!',
                                    '{{__('general.updated_successfully')}}!',
                                    'success'
                                )
                            }
                        },
                        error: function () {
                            swal(
                                '{{__('general.error')}}!',
                                '{{__('general.please_try_again')}}!',
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
