<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{__('general.reset_password')}}</title>

    <link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <link href="{{asset('assets/site/mobileView/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/default.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/responsive-rtl.css')}}" rel="stylesheet">

</head>

<body>

<div class="app-main-wrp type-2">
    <div class="viewport-wrap">
        <div class="top-zone">
            <div class="back-page-btn">
                <a href="#"><img src="{{asset('assets/site/mobileView/assets/img/left-long-arrow.svg')}}" alt=""></a>
            </div>
            <div class="primary-title text-left">
                <h2>{{__('general.new_password')}}</h2>
                <p>{{__('general.Create_your_new_password')}}</p>
             </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="input-form-wrap">
                    <div class="input-inside @error('email') wrong-format @enderror">
                        <input type="email" value="{{ $email ?? old('email') }}" name="email" placeholder="{{__('general.email')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/lock-gray.svg')}}" alt=""></span>
                        @error('email') <span class="remove-input-text"><i class="fal fa-times"></i></span> @enderror
                    </div>

                    <div class="input-inside @error('password') wrong-format @enderror">
                        <input type="password" name="password" placeholder="{{__('general.password')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/lock-gray.svg')}}" alt=""></span>
                        @error('password') <span class="remove-input-text"><i class="fal fa-times"></i></span> @enderror
                    </div>
                    <div class="input-inside @error('password_confirmation') wrong-format @enderror">
                        <input type="password" name="password_confirmation" placeholder="{{__('general.confirm_password')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/lock-gray.svg')}}" alt=""></span>
                        @error('password_confirmation') <span class="remove-input-text"><i class="fal fa-times"></i></span> @enderror
                    </div>
                    <div class="submit-btn mt-60">
                        <button type="submit">{{__('general.save')}}</button>
                    </div>
                </div>
            </form>
        </div> <!-- ./top-zone -->
    </div> <!-- ./viewport-wrap -->
</div>







</body>

</html>
