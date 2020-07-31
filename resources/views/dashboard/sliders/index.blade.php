@section('title')
{{ __('sliders.sliders') }}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('sliders.sliders') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.sliders') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="#" data-toggle="modal" data-target="#exampleStandardModal" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{ __('sliders.add_new_slider') }}</a>
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
                    <div class="table-responsive">
                        <table class="table table-borderless" id="default-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('sliders.image') }} AR</th>
                                    <th>{{ __('sliders.image') }} EN</th>
                                    <th>{{ __('general.delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach($sliders as $key => $slider)
                                        <tr>

                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img src="{{asset('uploads/sliders/'.$slider->image_ar)}}" width="200" alt="">
                                        </td>
                                            <td>
                                                <img src="{{asset('uploads/sliders/'.$slider->image_en)}}" width="200" alt="">
                                            </td>
                                            <td>
                                                <div class="button-list">
                                                    <a href="javascript:;" class="btn btn-danger-rgba delete" >
                                                        <input type="hidden" value="{{$slider->id}}" class="slider_id">
                                                        <i class="feather icon-trash"></i></a>
                                                </div>
                                            </td>                                      </tr>
                                    @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

<div class="modal fade" id="exampleStandardModal" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">{{__('sliders.add_new_slider')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="sliders" method="post">
                @csrf
                <div class="modal-body">
                    <label for="image" class="col-form-label">{{__('sliders.image')}} AR:</label>
                    <input type="file" name="image" id="image" class="form-control" required="">
                    <div class="error error_image"></div>

                    <label for="image_en" class="col-form-label">{{__('sliders.image')}} EN:</label>
                    <input type="file" name="image_en" id="image_en" class="form-control" required="">
                    <div class="error error_image_en"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save">Save</button>
                    <div class="loadingMask">
                        <img src="{{asset('assets/dashboard/images/loader.gif')}}" alt="">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- End Contentbar -->
@endsection
@section('script')
<script>

    function status_change(token, id, route) {
        $.ajax({
            url : route,
            type: "POST",
            data: {_token: token, id: id},
            success: function (response) {
                //$(".table").load(location.href + " .table>*", "");
            }
        });
    }
</script>

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
    $(document).ready(function() {

        var save = function () {
            $('.save').on("click", function () {
                $(".loadingMask").css('display', 'inline-block');
                $.ajax({
                    method: "post",
                    beforeSend: function () {
                        $(".loadingMask").css('display', 'inline-block');
                    },
                    url: "{{route('sliders.store')}}",

                    data:
                        new FormData($("#sliders")[0])
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

                            jQuery.each(data.errors, function (key, value) {
                                var errorValue = `<label class="errors-m">` + value + `</label>`;
                                if (key == "image") {
                                    $('.error_image').append(errorValue);
                                }
                                if (key == "image_en") {
                                    $('.error_image_en').append(errorValue);
                                }
                            });
                        } else {
                            $(".loadingMask").css('display', 'none');
                            swal(
                                '{{__('general.done')}}!',
                                '{{__('general.add_successfully')}}!',
                                'success'
                            ).then(function () {
                                window.location = "{{route('sliders.index')}}"
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
        $('.delete').on("click", function () {
            var this_item = $(this);
            var id = $(this).parent().find('.slider_id').val();

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
                    url: "{{route('sliders.destroy')}}",
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
                            ).then(function (){
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

            }, )


        });
        save();



    });
</script>
@endsection
