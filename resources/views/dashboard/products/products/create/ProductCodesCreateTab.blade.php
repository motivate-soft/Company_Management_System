<!-- Start col -->
<div class="card m-b-30">
    <div class="col-9">
        <h5 class="card-title">
            
        </h5>
    </div>
    <div class="col-3">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" name="digital_product" id="digital_product">
            <label class="custom-control-label" for="digital_product">{{__('products.digital_product')}}</label>
        </div>
    </div>
    <div class="col-12">
        <div class="card-code">
            {{__('products.codes')}}
            <div class="row mt-3">
                <div class="col-11">
                    <input type="text" class="form-control" name="codes[]">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-success btn-plus"><i class="la la-plus"></i>
                    </button>
                </div>
            </div>
            <div class="new-code"></div>
        </div>
    </div>
</div>
