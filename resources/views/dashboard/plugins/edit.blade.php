@section('title') 
Edit Plugin
@php
$lang_current = Config::get('app.locale');
@endphp
@endsection 
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
<!-- Dropzone css -->
<link href="{{ asset('assets/dashboard/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Select2 css -->
<link href="{{ asset('assets/dashboard/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Tagsinput css -->
<link href="{{ asset('assets/dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Add Plugin</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">Plugins</li>
                    
                    <li class="breadcrumb-item active" aria-current="page">Edit Plugin</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ url('plugins') }}" >list Plugin</a>
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
            <form method="post" action="{{ url('edit_plugin') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="plug_id" value="{{ $plugin->id }}">
            <div class="card m-b-30">

                <div class="card-body">
            <ul class="nav nav-pills nav-justified mb-3" @if($lang_current == 'ar') style="padding-right: 0 !important;" @endif role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" style="font-family: 'Tajawal', sans-serif;" id="pills-arabic-product-information-tab-justified" data-toggle="pill" href="#pills-arabic-product-information-justified" role="tab" aria-controls="pills-profile" aria-selected="false">تفاصيل البرنامج المساعد باللغة الإنجليزية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-english-product-information-tab-justified" data-toggle="pill" href="#pills-english-product-information-justified" role="tab" aria-controls="pills-home" aria-selected="true">Plugin Details in English</a>
                </li>
            </ul>
        </div>
        <div class="card-body tab-content" style="text-align: left;">
            <div class="form-group row tab-pane fade show" id="pills-english-product-information-justified" role="tabpanel" aria-labelledby="pills-english-product-information-tab-justified">
                <label for="productTitle" class="col-sm-12 col-form-label">Plugin Name</label>
                <div class="col-sm-12">
                    <input type="text" name="name_en" value="{{ $plugin->en_name }}" class="form-control font-20" id="name" required>
                </div>
                <label class="col-sm-12 col-form-label">Plugin Description</label>
                <div class="col-sm-12">
                    <textarea class="form-control input-block-level" rows="5" name="description_en" >{{ $plugin->en_description }}</textarea>
                </div>
            </div>
            
            
            <div class="form-group row tab-pane fade show active" style="text-align: right;" id="pills-arabic-product-information-justified" role="tabpanel" aria-labelledby="pills-arabic-product-information-tab-justified">
                <label style="font-family: 'Tajawal', sans-serif;" for="productTitle" class="col-sm-12 col-form-label">اسم البرنامج المساعد</label>
                <div class="col-sm-12">
                    <input style="text-align: right; font-family: 'Tajawal', sans-serif;" type="text" name="name_ar" value="{{ $plugin->ar_name }}" class="form-control font-20" id="name" required>
                </div>
                <label style="font-family: 'Tajawal', sans-serif;" class="col-sm-12 col-form-label">وصف البرنامج المساعد</label>
                <div style="font-family: 'Tajawal', sans-serif;" class="col-sm-12">
                    <textarea class="form-control input-block-level" name="description_ar" rows="5">{{ $plugin->ar_description }}</textarea>
                </div>
            </div>
        
                
            <div class="row"> 


                    <div class="col-lg-6 mb-4">
                        <div class="form-group mb-0">
                            <label>Plugin Url:</label>
                            <input type="text" class="form-control" name="url" placeholder="Plugin Url" required="" value="{{ $plugin->url }}">
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="form-group mb-0">
                            <label>Status:</label>
                            <select name="status" id="" class="form-control" required="">
                                <option value="">select</option>
                                <option value="0" @if($plugin->status == 0) selected="" @endif>In Active</option>
                                <option value="1" @if($plugin->status == 1) selected="" @endif>Active</option>
                            </select>
                        </div>
                    </div>

                    
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">{{ __('products/productAdd.image') }}</h5>
                </div>
                <div class="card-body">
                    <div class="d-inline-block mb-1">
                        <img id="imagePreview" @if(!is_null($plugin->image)) src="{{url('/')}}/uploads/plugins_images/{{ $plugin->image }}" @else src="{{ url('/') }}/assets/dashboard/images/default.png" @endif   alt="Rounded Image" class="img-fluid rounded" style="width: 200px;height: 200px;object-fit: cover;">  
                    </div>
                </div>   
                <div class="card-footer">
                    <input type="file" name="image" id="imageUpload" class="btn btn-primary-rgba btn-lg btn-block">
                </div>
            </div>

                <div class="col-lg-12 mt-4">
                    <div class="form-group mb-0">
                         <button type="submit" class="btn btn-primary pl-5 pr-5">Save</button>
                    </div>
                </div>
                
                    
            </form>

                    </div>

                                                                    
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
 
<!-- End Contentbar -->
@endsection 
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

<script>
function readURL(input, previewId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(previewId).attr('src', e.target.result);
            $(previewId).hide();
            $(previewId).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload").change(function() {
    readURL(this, '#imagePreview');
});     
</script>

@endsection  