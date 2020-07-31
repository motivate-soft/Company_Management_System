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
                <h2>{{__('general.Recovery')}}</h2>
                <p>Enter email to receive recovery code</p>
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-form-wrap">
                    <div class="input-inside @error('email') wrong-format @enderror">
                        <input type="email" name="email" placeholder="{{__('general.email_address')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/user-gray.svg')}}" alt=""></span>
                        @error('email') <span class="remove-input-text"><i class="fal fa-times"></i></span> @enderror
                    </div>

                    <div class="suggetion-wrap">
                        <p>Make sure you already comfirmed your emaill.
                            By pressing button below, you’ll get an email
                            with recovery code. Input this code on the
                            next page to reset your password</p>
                    </div>
                    <div class="submit-btn">
                        <button type="submit">{{__('general.send')}}</button>
                    </div>
                </div>
            </form>
        </div> <!-- ./top-zone -->
        <div class="bottom-zone">
            <p class="alternative-option">You remember your password? <a href="#">Login here</a></p>
        </div> <!-- ./bottom-zone -->
    </div> <!-- ./viewport-wrap -->
</div>







</body>

</html>
