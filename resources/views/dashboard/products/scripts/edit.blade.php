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
        var removedImages = [];
        function renderDropZone () {
            var myDropzone = $('#mydropzone').dropzone({
                previewTemplate: document.querySelector('#preview-template').innerHTML,
                autoProcessQueue: false,
                addRemoveLinks: true,
                parallelUploads: 2,
                thumbnailHeight: 120,
                thumbnailWidth: 120,
                maxFilesize: 3,
                filesizeBase: 1000,
                thumbnail: function(file, dataUrl) {
                    if (file.previewElement) {
                      file.previewElement.classList.remove("dz-file-preview");
                      var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                      for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                      }
                      setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
                    }
                },
                init: function () {
                    var zone = this;
                    this.on('addedfile', function (files) {
                        $('.dz-remove').html('<i class="fa fa-close"></i>');
                        $('.dz-message.needsclick').hide();
                    });
                    this.on('removedfile', function (files) {
                        if (!Dropzone.forElement("#mydropzone").files.length) {
                            $('.dz-message.needsclick').show();
                        }
                    });
                },
                sending: function(file, xhr, formData) {
                    formData.append("_token", "{{ csrf_token() }}");
                },
            });
            $('.dz-remove.for-saved-image').on('click', function () {
                removedImages[removedImages.length] = $(this).parent().attr('id');
                $(this).parent().remove();
                if (!Dropzone.forElement("#mydropzone").files.length) {
                    $('.dz-message.needsclick').show();
                }
            });
        }
        function readURL(input, wrapperId) {
            $(wrapperId).html('');
            if (input.files && input.files[0]) {
                var reader;
                for (var f = 0; f < input.files.length; f ++) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        $($.parseHTML('<img>'))
                            .css({width: '200px', height: '200px', objectFit: 'cover', marginBottom: '5px', borderRadius: '5px'})
                            .attr('src', event.target.result)
                            .appendTo(wrapperId);
                    }
                    reader.readAsDataURL(input.files[f]);
                }
                
                
                /*console.log(input.files.length);
                console.log(input.files[1]);
                //console.log(input.files[3]);
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    console.log(reader);
                    reader.onload = function (e) {
                        $(previewId).attr('src', e.target.result);
                        $(previewId).hide();
                        $(previewId).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[i]);
                }*/
                /* var reader = new FileReader();
                reader.onload = function (e) {
                    $(previewId).attr('src', e.target.result);
                    $(previewId).hide();
                    $(previewId).fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]); */
            }
        }
        function getCodes() {
            var id = $('.add_code_button').attr('data-id');
            var url = '{{route('products.codes')}}';

            $.ajax({
                url: url,
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                data: {
                    id: id,
                },
                async: true,
                success: function (response) {
                    $('.states_model').html('');
                    $('.states_model').html(response);
                    // $('#states_dark').modal('show');
                }
            });

        }
        $("#imageUpload").change(function () {
            readURL(this, '#imgPreviewWrapper');
            // readURL(this, '#imagePreview');
        });
        $(document).ready(function () {
            renderDropZone();
            
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
            $('.get-codes').on('click', function () {
                var id = $(this).attr('data-id');
                var html = $(this).attr('data-product');
                var url = '{{route('products.codes')}}';


                $.ajax({
                    url: url,
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: {
                        id: id,
                    },
                    async: true,
                    success: function (response) {
                        $('.add_code_button').attr('data-id', id);
                        $('.get_code_title').html('');
                        $('.get_code_title').html(html);
                        $('.states_model').html('');
                        $('.states_model').html(response);
                        $('#states_dark').modal('show');
                    }
                });
            });

            $('body').on('click', '.edit_code', function () {
                var id = $(this).attr('data-id');
                var html = $(this).attr('data-name');
                $('.code_name_form').val(html);
                var dl = $(this).attr('data-deli');
                $('.code_id_hidden').val(id);
                $('#edit_dark').modal('show');

            });

            $('.add_code_button').on('click', function () {
                var id = $(this).attr('data-id');
                $('.add_code_id').val(id);
                $('#add_code').modal('show');
            });

            $('#add_code_on_model').submit(function (e) {
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    url: url,
                    method: 'post',
                    data: form,
                    success: function (response) {
                        getCodes();
                        $("#add_code_on_model")[0].reset();
                        $('#add_code').modal('hide');
                        // $('#cities_dark').modal('hide');
                        $('#toaster_me').css('display', 'block');
                        $('#message_created_body').html(response.msg_text);

                        $("#toaster_ho").toast({
                            delay: 3000
                        });

                        $("#toaster_ho").toast("show");
                    }
                });

            });

            $('#edit_code_on_model').submit(function (e) {
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    url: url,
                    method: 'post',
                    data: form,
                    success: function (response) {
                        getCodes();
                        $("#edit_code_on_model")[0].reset();
                        $('#edit_dark').modal('hide');
                        // $('#states_dark').modal('hide');
                        $('#toaster_me').css('display', 'block');
                        $('#message_created_body').html(response.msg_text);

                        $("#toaster_ho").toast({
                            delay: 3000
                        });

                        $("#toaster_ho").toast("show");

                    }
                });

            });

            $('body').on('click', '.delete_code', function () {
                var id = $(this).attr('data-id');
                var r = confirm("Are you sure you want to delete!");
                if (r == true) {
                    var url = '{{route('codes.destroy')}}';
                    $.ajax({
                        url: url,
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            // $('#states_dark').modal('hide');
                            getCodes();
                            $('#toaster_me').css('display', 'block');
                            $('#message_created_body').html(response.msg_text);

                            $("#toaster_ho").toast({
                                delay: 3000
                            });

                            $("#toaster_ho").toast("show");
                        }
                    });

                }

            });


            var save = function () {
                $('.save').on("click", function () {
                    $(".loadingMask").css('display', 'inline-block');
                    // Dropzone.forElement("#mydropzone").processQueue();
                    const files = Array.from(Dropzone.forElement("#mydropzone").files)
                    let formData = new FormData($("#product_form")[0]);
                    files.forEach((file, i) => {
                        formData.append("images[]", file);
                    });
                    formData.append("image_removed", removedImages);
 
                    $.ajax({
                        method: "post",
                        beforeSend: function () {
                            $(".loadingMask").css('display', 'inline-block');
                        },
                        url: "{{route('products.update')}}",

                        data:
                            formData
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
                                    '{{__('general.updated_successfully')}}!',
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

        });
    </script>

@endsection
