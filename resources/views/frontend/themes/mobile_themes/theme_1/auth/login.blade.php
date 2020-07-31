<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{__('frontend/mobileViews/theme_1.login')}}</title>

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
            <div class="sign-in-img">
                <img src="{{asset('assets/site/mobileView/assets/img/sign-in-page-img-1.jpg')}}" alt="">
            </div>

            <div class="primary-title">
                <h2>{{__('frontend/mobileViews/theme_1.welcome_back')}}!</h2>
                <p>{{__('frontend/mobileViews/theme_1.log_in_to_your_account')}}</p>
            </div>
            {{--@foreach($errors->all() as $error)--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<li style="list-style: none;">{{ $error }}</li>--}}
                {{--</div>--}}
            {{--@endforeach--}}
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @error('email')

                @enderror
                <div class="input-form-wrap" id="loginForm">
                    <div class="input-inside @error('email') wrong-format @enderror">
                        <input type="email" class="emptyField" name="email" value="{{ old('email') }}" placeholder="{{__('general.email_address')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/user-gray.svg')}}" alt=""></span>
                        @error('email') <span class="remove-input-text"><i class="fal fa-times"></i></span> @enderror
                    </div>
                    <div class="input-inside @error('password') wrong-format @enderror">
                        <input type="password" class="emptyField" name="password" placeholder="{{__('general.password')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/lock-gray.svg')}}" alt=""></span>
                        @error('password')<span class="remove-input-text"><i class="fal fa-times"></i></span>@enderror
                        <div class="forget-wrap">
                            <a href="{{route('password.request')}}" class="forget-link">{{__('general.forgot_password')}}</a>
                        </div>
                    </div>

                    <div class="submit-btn">
                        <button type="submit" class="verifyButtonCheck verify-button" id="verify_button">{{__('frontend/mobileViews/theme_1.login')}}</button>
                    </div>
                </div>
            </form>
        </div> <!-- ./top-zone -->
        <div class="bottom-zone">
            <p class="alternative-option">{{__('frontend/mobileViews/theme_1.dont_have_an_account')}} <a href="{{route('register')}}"> {{__('frontend/mobileViews/theme_1.sign_up')}} </a></p>
        </div> <!-- ./bottom-zone -->
    </div> <!-- ./viewport-wrap -->
</div>



<style>
    button.yellow,
    input.yellow {
        background: #FFC656;
    }
    .verify-button {
            background-color: #E5E5E5;
 
        }
</style>
<script>
    // Start disabling and enabling the button
    let input = document.querySelector(".emptyField");  // Input class name and it can be anything 
    let button = document.querySelector(".verifyButtonCheck"); // Button class name to verify and check if fields are fild or no
    
    button.disabled = true;
    
    input.addEventListener("change", stateHandle);
    
    function stateHandle() {
    	if (document.querySelector(".emptyField").value === "") { // Chage "emptyField" with the class name you used above
    		button.disabled = true;
    	} else {
    		button.disabled = false;
    	}
    }
    // End disabling and enabling the button
    // Change Button Color Starts
    function allInputsHaveValue(genInputs) {
        for (var i = 0; i < genInputs.length; i++) {
            if (genInputs[i].value.trim() == '') return false;
        }
        return true;
    }
    
    var assyPlatesInput = document.querySelectorAll('#loginForm input[type="email"], input[type="password"]'); // Change "verify" with the contain div id name
        for (var i = 0; i < assyPlatesInput.length; i++) {
            assyPlatesInput[i].addEventListener("keyup", function (e) {
                var color = (allInputsHaveValue(assyPlatesInput) == true) ? "yellow" : "gray"; // Change "Yellow" with the class name
                var btn = document.getElementById('verify_button'); // Change "verify_button" with the button id
                btn.classList.remove("yellow", "gray"); // Channge "Yello" with the class name same as the above one
                btn.classList.add(color);

                check_CompoundAndAssyButtons();
            }
        );
    }
    // Change Button Color Ends
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/site/mobileView/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/site/mobileView/assets/js/Popper.js')}}"></script>
<script src="{{asset('assets/site/mobileView/assets/js/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/site/mobileView/assets/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/site/mobileView/assets/js/main.js')}}"></script>

<script>
    var $htmlOrBody = $('html, body'), // scrollTop works on <body> for some browsers, <html> for others
        scrollTopPadding = 8;
    
    $('input').focus(function() {
        // get input tag's offset top position
        var textareaTop = $(this).offset().top;
        // scroll to the textarea
        $htmlOrBody.scrollTop(textareaTop - scrollTopPadding);
    
        // OR  To add animation for smooth scrolling, use this. 
        //$htmlOrBody.animate({ scrollTop: textareaTop - scrollTopPadding }, 200);
    
    });
</script>

</body>

</html>
