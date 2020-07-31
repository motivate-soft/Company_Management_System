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
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>

</head>

<body>


<div class="app-main-wrp type-2">
    <div class="viewport-wrap">
        <div class="top-zone">
            <div class="back-page-btn">
                <a onclick="goBack()"><img src="{{asset('assets/site/mobileView/assets/img/left-long-arrow.svg')}}" alt=""></a>
            </div>
            <div class="primary-title text-left">
                <h2>{{__('general.verify_account')}}</h2>
                <p>{{__('general.a_message_with_a_verification_code')}}</p>
            </div>
            <form name="verify" id="code">
                @csrf
                <div class="input-form-wrap" id="verify">
                    <div class="code-field-wrap">
                        <input class="code emptyField" name="code[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" minlength="0" maxlength="1" inputmode="numeric" pattern="[0-9]*">
                        <input class="code emptyField" name="code[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" minlength="0" maxlength="1" inputmode="numeric" pattern="[0-9]*">
                        <input class="code emptyField" name="code[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" minlength="0" maxlength="1" inputmode="numeric" pattern="[0-9]*">
                        <input class="code emptyField" name="code[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" minlength="0" maxlength="1" inputmode="numeric" pattern="[0-9]*">
                    </div>
                    <div class="submit-btn">
                        <button type="button" id="verify_button" class="verify verify-button verifyButtonCheck">{{__('general.verify')}}</button>
                    </div>
{{--                    <div class="keypad-wrap">--}}
{{--                            <button value=" 1 " onclick="verify.code[].value += '1'" class="key">1</button>--}}
{{--                            <button value=" 2 " onclick="verify.code.value += '2'" class="key">2</button>--}}
{{--                            <button value=" 3 " onclick="verify.code.value += '3'" class="key">3</button>--}}
{{--                            <button value=" 4 " onclick="verify.code.value += '4'" class="key">4</button>--}}
{{--                            <button value=" 5 " onclick="verify.code.value += '5'" class="key">5</button>--}}
{{--                            <button value=" 6 " onclick="verify.code.value += '6'" class="key">6</button>--}}
{{--                            <button value=" 7 " onclick="verify.code.value += '7'" class="key">7</button>--}}
{{--                            <button value=" 8 " onclick="verify.code.value += '8'" class="key">8</button>--}}
{{--                            <button value=" 9 " onclick="verify.code.value += '9'" class="key">9</button>--}}
{{--                            <button value=" 0 " onclick="verify.code.value += '0'" class="key zero">0</button>--}}
{{--                            <button class="key cross"><img src="assets/img/cross-shape.svg" alt=""></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </form>
        </div> <!-- ./top-zone -->
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
    
    var assyPlatesInput = document.querySelectorAll('#verify input[type="number"]'); // Change "verify" with the contain div id name
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
<script src="{{('assets/site/mobileView/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-sweet-alert.js') }}"></script>
<script>
    // Start Back Button using history list
    function goBack() {
        window.history.back();
    }
    // End Back Button using history list
    $(document).ready(function () {
        $(".code").keyup(function () {
            if (this.value.length == this.maxLength) {
                $(this).next('.code').focus();
            }
        });
        $('.verify').on("click", function () {
            $.ajax({
                method: "post",

                url: "{{route('user.verify_phone')}}",

                data:
                    new FormData($("#code")[0])
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
                        swal(
                            '{{__('general.error')}}!',
                            '{{__('general.please_try_again')}}!',
                            'error'
                        )
                    } else {
                        $('select').removeClass('wrong-format');
                        swal(
                            '{{__('general.done')}}!',
                            '{{__('general.verified_successfully')}}!',
                            'success'
                        ).then(function () {
                            window.location = "/"
                        });
                    }
                },
                error: function () {
                    $(".loadingMask").css('display', 'none');
                    swal(
                        '{{__('general.error')}}!',
                        '{{__('general.please_try_again')}}!',
                        'error'
                    )
                }
            });


        });

    });
</script>
</body>

</html>
