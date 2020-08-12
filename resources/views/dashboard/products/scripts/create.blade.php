@section('script')
    <!-- Select2 js -->
    <script src="{{ asset('assets/dashboard/plugins/select2/select2.min.js') }}"></script>
    <!-- Tagsinput js -->
    <script src="{{ asset('assets/dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/bootstrap-tagsinput/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-form-select.js') }}"></script>
    <!-- Summernote js -->
    <script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Dropzone js -->
    <script src="{{ asset('assets/dashboard/plugins/dropzone/dist/dropzone.js') }}"></script>
    <!-- eCommerce Page js -->
    <script src="{{ asset('assets/dashboard/js/custom/custom-ecommerce-product-detail-page.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>
    <script>
        function readURL(input, previewId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewId).attr('src', e.target.result);
                    $(previewId).hide();
                    $(previewId).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_input").change(function () {
            readURL(this, '#imagePreview');
        });

        $(document).ready(function () {
            $('.product_size').on('change', function () {
                if ($(this).is(':checked')) {
                    $(this).parent().parent().parent().find('.size-price-input').attr('name', 'size_price[]')
                }else{
                    $(this).parent().parent().parent().find('.size-price-input').attr('name', '')
                }
            });
            $('#digital_product').on('change', function () {
                if ($(this).is(':checked')) {
                    swal({
                        title: '{{(__('products.are_you_sure_you_want_to_activate_the_digital_product'))}}',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: '{{__('general.yes')}}!',
                        cancelButtonText: '{{__('general.no_cancel')}}!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10',
                        buttonsStyling: false
                    }).then(function () {
                        $('.btn-digital-codes').show();
                        $('.card-code').show()
                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            $('#digital_product').prop('checked', false);
                        }
                    });
                    // $('.card-code').show();
                } else {
                    swal({
                        title: '{{(__('products.are_you_sure_you_want_to_deactivate_the_digital_product'))}}',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: '{{__('general.yes')}}!',
                        cancelButtonText: '{{__('general.no_cancel')}}!',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10',
                        buttonsStyling: false
                    }).then(function () {
                        $('.btn-digital-codes').hide();
                        $('.card-code').hide();

                    }, function (dismiss) {
                        if (dismiss === 'cancel') {
                            $('#digital_product').prop('checked', true);
                        }
                    });
                }
            });

            var new_code = function () {
                $('.btn-plus').on('click', function () {
                    var html = ` <div class="row mt-3">
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="codes[]">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-danger btn-remove"><i class="la la-close"></i></button>
                                    </div>
                                </div>`;
                    $('.new-code').append(html);
                    remove_code();
                });
            };

            var remove_code = function () {
                $('.btn-remove').on('click', function () {
                    $(this).parent().parent().remove();
                });
            };
            var save = function () {
                $('.save').on("click", function () {
                    $(".loadingMask").css('display', 'inline-block');

                    $.ajax({
                        method: "post",
                        beforeSend: function () {
                            $(".loadingMask").css('display', 'inline-block');
                        },
                        url: "{{route('products.store')}}",

                        data:
                            new FormData($("#product_form")[0])
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
                                if (data.errors.hasOwnProperty("name_en") || data.errors.hasOwnProperty("description_en")) {
                                    $('#pills-english-product-information-tab-justified').tab('show');
                                } else if (!data.errors.hasOwnProperty("name_en") || !data.errors.hasOwnProperty("description_en")) {
                                    $('#pills-arabic-product-information-tab-justified').tab('show');
                                }
                                jQuery.each(data.errors, function (key, value) {
                                    var errorValue = `<label class="errors-m">` + value + `</label>`;
                                    if (key == "name_ar") {
                                        $('.error_name_ar').append(errorValue);
                                    }
                                    if (key == "name_en") {
                                        $('.error_name_en').append(errorValue);
                                    }
                                    if (key == "description_en") {
                                        $('.error_description_en').append(errorValue);
                                    }
                                    if (key == "description_ar") {
                                        $('.error_description_ar').append(errorValue);
                                    }
                                    if (key == "price") {
                                        $('.error_price').append(errorValue);
                                    }
                                    if (key == "purchase_price") {
                                        $('.error_purchase_price').append(errorValue);
                                    }
                                    if (key == "stock_quantity") {
                                        $('.error_stock_quantity').append(errorValue);
                                    }
                                    if (key == "image") {
                                        $('.error_image').append(errorValue);
                                    }

                                });
                            } else {
                                $(".loadingMask").css('display', 'none');
                                swal(
                                    '{{__('general.done')}}!',
                                    '{{__('general.add_successfully')}}!',
                                    'success'
                                ).then(function () {
                                    window.location = "{{route('products.index')}}"
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
            };

            save();
            new_code();
            remove_code();
        });


    </script>

@endsection  
