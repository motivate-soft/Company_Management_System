
@section('title')
    {{__('Systems/SystemFour/quotations.addQuotation')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

    <!--Dropify css -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/dropify/dropify.css') }}">
    <style>
        .add_css{
            border: 1px solid red; !important;
        }
    </style>

@endsection
@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{__('Systems/SystemFour/quotations.addQuotation')}}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                        <li class="breadcrumb-item active"><a
                                    href="{{route('jobtasks.index')}}">{{__('Systems/SystemFour/quotations.quotations')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemFour/quotations.addQuotation')}}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a class="btn btn-primary-rgba"
                       href="javascript:window.history.back();">{{__('Systems/SystemTwo/staffs.back')}}</a>
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
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <div id="create_form">
                                    <div class="form-group">
                                        <label for="employee">{{__('Systems/SystemFour/quotations.employee')}}</label>
                                        <select class="form-control" id="employee" name="employee_id"
                                                required="">
                                            @foreach($employees as $employee)
                                                <option value={{$employee->id}}>{{$employee->firstname}} {{$employee->secondname}} {{$employee->lastname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer">{{__('Systems/SystemFour/quotations.customer')}}</label>
                                        <select class="form-control" id="customer" name="customer_id"
                                                required="">
                                            @foreach($customers as $customer)
                                                <option value={{$customer->id}}>{{$customer->customer_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="project_name">{{__('Systems/SystemFour/quotations.projectName')}}</label>
                                        <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="discount_rate">{{__('Systems/SystemFour/quotations.discountRate')}}</label>
                                        <input type="number" class="form-control" id="discount_rate" name="discount_rate"
                                               placeholder="Discount Rate" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{__('Systems/SystemFour/quotations.description')}}</label>
                                        <textarea class="form-control" id="quo_description"
                                                  placeholder="Description" required=""></textarea>
                                    </div>
                                    <div id="products">
                                        <div class="form-group row product-row">
                                            <div class="col-md-7">
                                                <label>{{__('Systems/SystemFour/quotations.selectProduct')}}</label>
                                                <select class="form-control product" required id="pro1">
                                                    @foreach($products as $product)
                                                    <option value={{$product->id}}>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="quantity">{{__('Systems/SystemFour/quotations.quantity')}}</label>
                                                <input type="number" min="0" class="form-control quantity" id="quantity1">
                                            </div>
                                            {{--<div class="col-md-2">--}}
                                                {{--<label>Del</label>--}}
                                                {{--<a href="javascript:void(0);" class="removeButton form-control"><i class="fa fa-minus"></i></a>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div class="form-group mb-0 pull-right">
                                            <a type="button" title="Add More Products" class="btn btn-info-rgba" id="addPro">{{__('Systems/SystemFour/quotations.addMoreProduct')}}</a>
                                        </div>
                                        <br/>
                                        <br/>
                                    </div>

                                    {{--<div class="form-group" style="margin-top: 30px">--}}
                                        {{--<label for="fileUp">{{__('Systems/SystemFour/quotations.attachment')}}</label>--}}
                                        {{--<input type="file" id="fileUp" name="fileUp" data-plugin="dropify" />--}}
                                    {{--</div>--}}
                                    <!-- End Example Default Value -->


                                    <div class="custom-control custom-checkbox col-md-12">
                                        <input type="checkbox" class="custom-control-input" id="acceptTerms" onclick="enable()">
                                        <label class="custom-control-label" for="acceptTerms">I Agree with the Terms and Conditions.</label>
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <div class="form-group mb-0">
                                            <button id="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemFour/quotations.add')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
        <p id="locale" style="display: none;"><?php echo app()->getLocale()?></p>


    <!-- End Contentbar -->
@endsection
@section('script')

    <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>
    <!-- Dropify js -->
    <script src="{{ asset('assets/dashboard/plugins/dropify/babel-external-helpers.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/dropify/jquery.js') }}"></script>



    <script src="{{ asset('assets/dashboard/plugins/dropify/dropify.min.js') }}"></script>

    <script src="{{ asset('assets/dashboard/plugins/dropify/Component.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/dropify/Plugin.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/dropify/Base.js') }}"></script>

    <!-- Page -->
    <script src="{{ asset('assets/dashboard/plugins/dropify/Site.js') }}"></script>


    <script src="{{ asset('assets/dashboard/plugins/dropify/uploads.js') }}"></script>

    <script>
        var index = 2;
        var products = <?php echo $products ?>

        function enable() {
            if ($("#create").attr('disabled') === 'disabled'){
                $("#create").removeAttr('disabled');
            } else {
                $("#create").attr('disabled', 'disabled');
            }
        }


        $("#submit").click(function(){

            var productInfo = [];

            $(".product-row").each(function(){
                var productId = $(this).find(".product").val();
                var quantity = Number($(this).find(".quantity").val());
                if (quantity == ''){
                    $(this).find(".quantity").css("border", "1px solid red");
                    return;
                }else{
                    $(this).find(".quantity").css("border", "1px solid rgb(184 190 204 / 50%)");

                }
                if(productInfo[productId] === undefined){
                    productInfo[productId] = quantity;
                }
                else{
                    productInfo[productId] += quantity;
                }

            });

            var reqProductInfo = [];
            productInfo.forEach(function(value, index){
                reqProductInfo.push({
                    product: index,
                    quantity: value
                })
            });
            var employee = $("#employee").val();
            var customer = $("#customer").val();
            var discount_rate = $('#discount_rate').val();
            var project_name = $('#project_name').val();
            var quo_description  = $('#quo_description').val();
            if (discount_rate == '' || project_name == '' || quo_description == ''){
                if (project_name == ''){
                    $('#project_name').css("border", "1px solid red");
                }else{
                    $('#project_name').css("border", "1px solid rgb(184 190 204 / 50%)");

                }
                if (discount_rate == ''){
                    $('#discount_rate').css("border", "1px solid red");
                }else {
                    $('#discount_rate').css("border", "1px solid rgb(184 190 204 / 50%)");

                }
                if (quo_description == ''){
                    $('#quo_description').css("border", "1px solid red");
                }else {
                    $('#quo_description').css("border", "1px solid rgb(184 190 204 / 50%)");
                }
                return;

            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });
            // alert(quo_description);
            $.ajax ({

                url: "{{url('dashboard/quotations/store')}}",
                data: {
                    employee_id: employee,
                    customer_id: customer,
                    project_name: project_name,
                    discount_rate: discount_rate,
                    purchase_info: reqProductInfo,
                    quo_description:quo_description
                },
                type: 'POST',
                datatype: 'json',
                success: function (result) {
                    var obj = JSON.parse(result);
                    if (obj == "success"){
                        window.location.assign("/dashboard/quotations/all");
                    }


                }
            });
        });

        $("#addPro").click(function () {
            // var content = $('#products').html();
            $('#products').append("<div class=\"form-group product-row row \">\n" +
                "                                            <div class=\"col-md-7\">\n" +
                "                                                <label>{{__('Systems/SystemFour/quotations.selectProduct')}}</label>\n" +
                "                                                <select class=\"form-control product\" required id=\"pro"+index+"\">\n" +
                "                                                    @foreach($products as $product)\n" +
                "                                                    <option value={{$product->id}}>{{$product->name}}</option>\n" +
                "                                                    @endforeach\n" +
                "                                                </select>\n" +
                "                                            </div>\n" +
                "                                            <div class=\"col-md-3\">\n" +
                "                                                <label for=\"quantity\">{{__('Systems/SystemFour/quotations.quantity')}}</label>\n" +
                "                                                <input type=\"number\" min=\"0\" class=\"form-control quantity\" id=\"quantity"+index+"\">\n" +
                "                                            </div>\n" +
                "                                            <div class=\"col-md-2\">\n" +
                "                                                <label>_</label>\n" +
                "                                                <a href=\"javascript:void(0);\" class=\"removeButton btn-danger-rgba form-control\">x</a>\n" +
                "                                            </div>\n" +
                "                                        </div>");
            $(document).on('click','.removeButton',function() {
                $(this).closest("div.row").remove();
            });
            index += 1;
        });



    </script>
@endsection
