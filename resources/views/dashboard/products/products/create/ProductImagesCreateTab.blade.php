<!-- Start col -->
<div class="card m-b-30">
    <div class="card-header">
        <h5 class="card-title">{{ __('products/productAdd.image') }}</h5>
    </div>
    <div class="card-body">
        <div class="d-inline-block mb-1">
            <img id="imagePreview" src="{{asset('assets/dashboard/images/default.png')}}" alt="Rounded Image" class="img-fluid rounded" style="width: 200px;height: 200px;object-fit: cover;">
        </div>
        <div class="error error_image"></div>
    </div>
    <div class="card-footer">
        <input type="file" name="image" id="imageUpload" class="btn btn-primary-rgba btn-lg btn-block">
    </div>
</div>