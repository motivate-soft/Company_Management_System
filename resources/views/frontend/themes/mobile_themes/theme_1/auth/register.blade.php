<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{__('frontend/mobileViews/theme_1.sign_up')}}</title>

    <link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <link href="{{asset('assets/site/mobileView/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/default.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/mobileView/assets/css/responsive-rtl.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body>


<div class="app-main-wrp type-2">
    <div class="viewport-wrap">
        <div class="top-zone">
            <div class="primary-title">
                <h2>{{__('frontend/mobileViews/theme_1.Lets_Get_Started')}}</h2>
                <p>Create an account to NAME to get all features</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-form-wrap" id="registerForm">
                    
                    <div class="input-inside @error('name') wrong-format @enderror">
                        <input type="text" name="name" value="{{old('name')}}" placeholder="{{__('general.name')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/user-gray.svg')}}" alt=""></span>
                        @error('name') 
                            <span class="remove-input-text"><i class="fal fa-times"></i></span> 
                        @enderror
                    </div>
                    
                    <div class="input-inside @error('email') wrong-format @enderror">
                        <input type="email" value="{{old('email')}}" name="email" placeholder="{{__('general.email')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/mail-gray.svg')}}" alt=""></span>
                        @error('email') 
                            <span class="remove-input-text"><i class="fal fa-times"></i></span> 
                        @enderror
                    </div>
                    
                    <div class="input-inside phone-num-selection @error('phone') wrong-format @enderror">
                        <input id="phone_number" value="{{old('phone')}}" name="phone" placeholder="{{__('general.phone')}}"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" minlength="0" maxlength="9" inputmode="numeric" pattern="[0-9]*">
                        <div class="transparent-dropdown">
                            <dl id="country-select" class="dropdown">
                                <a href="javascript:void(0);"><span><span style=""></span><span dir="ltr">+966</span></span></a>
                            </dl>
                        </div>
                        @error('phone') 
                            <span class="remove-input-text"><i class="fal fa-times"></i></span> 
                        @enderror
                    </div>
                    
                    <div class="input-inside @error('password') wrong-format @enderror">
                        <input type="password" name="password" placeholder="{{__('general.password')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/lock-gray.svg')}}" alt=""></span>
                        @error('password') 
                            <span class="remove-input-text"><i class="fal fa-times"></i></span> 
                        @enderror
                    </div>
                    
                    <div class="input-inside @error('password') wrong-format @enderror">
                        <input type="password" name="password_confirmation" placeholder="{{__('general.confirm_password')}}">
                        <span class="input-transparent-icon"><img src="{{asset('assets/site/mobileView/assets/img/lock-gray.svg')}}" alt=""></span>
                        @error('password') 
                            <span class="remove-input-text"><i class="fal fa-times"></i></span> 
                        @enderror
                    </div>

                    <div class="submit-btn">
                        <button type="submit" class="verify-button" id="verify_button">{{__('general.create')}}</button>
                    </div>
                    
                </div>
            </form>
        </div> <!-- ./top-zone -->
        <div class="bottom-zone">
            <p class="alternative-option">{{__('frontend/mobileViews/theme_1.Already_have_an_account')}}<a href="{{route('user.login')}}">{{__('frontend/mobileViews/theme_1.login')}}</a></p>
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
    // Start Disabling "ZERO (O)" as the first number in the phone Input
    $('input').on('input propertychange paste', function (e) {
        var reg = /^0+/gi;
        if (this.value.match(reg)) {
            this.value = this.value.replace(reg, '');
        }
    });
    // End Disabling "ZERO (O)" as the first number in the phone Input
    // Change Button Color Start
    function allInputsHaveValue(genInputs) {
        for (var i = 0; i < genInputs.length; i++) {
            if (genInputs[i].value.trim() == '') return false;
        }
        return true;
    }
    
    var assyPlatesInput = document.querySelectorAll('#registerForm input[type="number"], input[type="email"], input[type="tel"], input[type="password"]'); // Change "verify" with the contain div id name
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
<script src="{{('assets/site/mobileView/assets/js/jquery.min.js')}}"></script>
<script src="{{('assets/site/mobileView/assets/js/Popper.js')}}"></script>
<script src="{{('assets/site/mobileView/assets/js/jquery.sticky.js')}}"></script>
<script src="{{('assets/site/mobileView/assets/js/jquery.meanmenu.js')}}"></script>
<script src="{{('assets/site/mobileView/assets/js/jquery.nice-number.js')}}"></script>
<script src="{{('assets/site/mobileView/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{('assets/site/mobileView/assets/js/bootstrap.min.js')}}"></script>

<script src="assets/js/main.js"></script>

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
