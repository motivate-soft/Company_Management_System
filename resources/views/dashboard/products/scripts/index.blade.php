    <script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>
    <script>
        $(document).ready(function () {

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

            function readURL(input, previewId) {
                if (input.files && input.files[0]) {

                    console.log(input.files[0]);
                    console.log(input);

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
                // console.log(this);
                readURL(this, '#imagePreview');
            });


            // For Digital Codes Popup Starts
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
            // For Digital Codes Popup Ends

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
            //  $('#default-datatable').DataTable();

            $('.delete').on("click", function () {
                var this_item = $(this);
                var id = $(this).parent().find('.product_id').val();

                swal({
                    title: '{{__('general.are_you_sure')}}',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{__('general.yes')}}!',
                    cancelButtonText: '{{__('general.no_cancel')}}!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10',
                    buttonsStyling: false
                }).then(function () {
                    $.ajax({
                        method: "post",
                        url: "{{route('products.destroy')}}",
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').val()
                        },
                        data: {
                            id: id,
                        },
                        async: true,
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
                                    '{{__('general.deleted_successfully')}}!',
                                    'success'
                                ).then(function () {
                                    this_item.parent().parent().parent().remove();
                                });
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

                },)


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
        });
    </script>
