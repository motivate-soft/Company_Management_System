@extends('frontend.themes.mobile_themes.theme_1.layouts.app')
@section('title')
    {{$product->name_ar}}
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
@section('head_title')
    {{$product->name_ar}}
@endsection
@section('content')
    <div class="modal fade" id="exampleModalOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog max-327" role="document">
            <div class="modal-content">
                <div class="account-created text-center">
                    <div class="ok"><img src="{{asset('assets/site/mobileView/assets/img/Check.png')}}" alt=""></div>
                    <h4>{{__('general.add_successfully')}}</h4>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('carts.index')}}" class="got-it" style="font-size: 17px;">{{__('general.go_to_cart')}}</a>
                        </div>
                        <div class="col-6">
                            <a href="{{route('home')}}" class="got-it" >{{__('general.Keep_browsing')}}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="detaisl-sldier-area">
        <div class="details-main-slider owl-carousel">
            @php
            $images = explode(',', $product->image);
            @endphp
            
            @foreach($images as $img) 
                <div class="details-single-slider">
                    <a onclick="goBack()"><i class="@if(app()->getLocale() == "en") fa fa-arrow-right @else fa fa-arrow-left @endif details-back-arrow" aria-hidden="true"></i></a>
                    @if(app()->getLocale() == "en")
                        <img src="{{asset('uploads/product_images/'.$img)}}" alt="{{$product->name}}">
                    @else
                        <img src="{{asset('uploads/product_images/'.$img)}}" alt="{{$product->name_ar}}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="details-content-wrp">
        <div class="details-maintexts">
            @if(app()->getLocale() != "en")
                <h3>{{$product->name_ar}}<span>Brand name</span></h3>
                <h2>{{$product->price}} ريال</h2>
                <p>{!! $product->description_ar !!}</p>
            @else
                <h3>{{$product->name}}<span>Brand name</span></h3>
                <h2>{{$product->price}} ريال</h2>
                <p>{!! $product->description_en !!}</p>
            @endif
        </div>
        @if($plugin->status == 1)
        <div class="details-content-dropmenu">
            <select name="size" id="size" class="details-content-options size ">
                <option disabled selected>{{__('frontend/mobileViews/theme_1.sizes')}}</option>
                @foreach($product->sizes as $size)
                    <option value="{{$size->id}}"
                            data-price="{{$size->pivot->price}}">{{$size->name_ar .' - '. $size->pivot->price .'ريال'}}</option>
                @endforeach
            </select>
        </div>

        <div class="details-content-dropmenu">
            <select name="cutting" id="cutting" class="details-content-options cutting">
                <option disabled selected>{{__('frontend/mobileViews/theme_1.cutting_method')}}</option>
                @foreach($product->cuttings as $cutting)
                    <option value="{{$cutting->id}}"
                            data-price="{{$cutting->price}}">{{$cutting->name_ar .' - '. $cutting->price .'ريال'}}</option>
                @endforeach
            </select>
        </div>

        <div class="details-content-dropmenu">
            <select name="packing" id="packing" class="details-content-options packing">
                <option disabled selected>{{__('frontend/mobileViews/theme_1.packaging_method')}}</option>
                @foreach($product->packings as $packing)
                    <option value="{{$packing->id}}"
                            data-price="{{$packing->price}}">{{$packing->name_ar .' - '. $packing->price .'ريال'}}</option>
                @endforeach
            </select>
        </div>
        @else
        <input type="hidden" name="size" value="0">
        <input type="hidden" name="cutting" value="0">
        <input type="hidden" name="packing" value="0">
        @endif
    </div>
    <div class="category-blk dts-blk">
        @csrf
        <!-- Drop menus for item options (Sizes - Cutting - Packing) -->
        <a href="javascript:;" class="add-to-cart-btn">{{__('frontend/mobileViews/theme_1.add_to_cart')}} - <span
                dir="rtl"><span
                    class="total-cart">{{$product->price}}</span> ريال</span></a>

    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-sweet-alert.js') }}"></script>
    <script>
        // Start Back Button using history list
        function goBack() {
            window.history.back();
        }
        // End Back Button using history list

        $(document).ready(function () {

            $('.add-to-cart-btn').on("click", function () {
                $(".loadingMask").css('display', 'inline-block');
                var id = {{$product->id}};
                    var size = $('#size').val();
                    var cutting = $('#cutting').val();
                    var packing = $('#packing').val();
                $.ajax({
                    method: "post",
                    beforeSend: function () {
                        $(".loadingMask").css('display', 'inline-block');
                    },
                    url: "{{route('carts.addToCart')}}",

                    data: {
                        id: id,
                        size: size,
                        cutting: cutting,
                        packing: packing,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    async: true,
                    success: function (data) {
                        console.log(data);
                        //  wait.resolve();
                        $(".loadingMask").css('display', 'none');
                        if (data.errors) {
                            $('select').removeClass('wrong-format');
                            jQuery.each(data.errors, function (key, value) {

                                if (key == "size") {
                                    $('#size').addClass('wrong-format');
                                }
                                if (key == "cutting") {
                                    $('#cutting').addClass('wrong-format');
                                }
                                if (key == "packing") {
                                    $('#packing').addClass('wrong-format');
                                }
                            });
                        } else {
                            $('select').removeClass('wrong-format');
                            $('#exampleModalOne').modal('show');
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

            $('.size').on('change', function () {
                var size = $(this).find(':selected').data('price');
                var cutting = $('.cutting').find(':selected').data('price');
                var packing = $('.packing').find(':selected').data('price');
                if (isNaN(cutting)) {
                    cutting = 0;
                } else {
                    cutting = cutting;
                }
                if (isNaN(packing)) {
                    packing = 0;
                } else {
                    packing = packing;
                }
                var total_cart =  {{$product->price}};
                $('.total-cart').text(parseInt(size) + parseInt(total_cart) + parseInt(cutting) + parseInt(packing));
            });
            $('.cutting').on('change', function () {
                var cutting = $(this).find(':selected').data('price');
                var size = $('.size').find(':selected').data('price');
                var packing = $('.packing').find(':selected').data('price');
                if (isNaN(size)) {
                    size = 0;
                } else {
                    size = size;
                }
                if (isNaN(packing)) {
                    packing = 0;
                } else {
                    packing = packing;
                }
                var total_cart =  {{$product->price}};
                $('.total-cart').text(parseInt(size) + parseInt(total_cart) + parseInt(cutting) + parseInt(packing));
            });
            $('.packing').on('change', function () {
                var packing = $(this).find(':selected').data('price');
                var size = $('.size').find(':selected').data('price');
                var cutting = $('.cutting').find(':selected').data('price');
                if (isNaN(size)) {
                    size = 0;
                } else {
                    size = size;
                }
                if (isNaN(cutting)) {
                    cutting = 0;
                } else {
                    cutting = cutting;
                }
                var total_cart =  {{$product->price}};
                $('.total-cart').text(parseInt(size) + parseInt(total_cart) + parseInt(cutting) + parseInt(packing));
            });
        });
    </script>
@endsection
