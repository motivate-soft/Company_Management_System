<div class="modal fade text-left" id="add_codes" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header ">
                <span class="modal-title get_cities_title" id="exampleModalScrollableTitle"></span>
                <span style="margin-left: 20px; "><button
                        class="add_city_button btn btn-dark btn-sm">{{ __('products.add_new_codes') }}</button></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="overflow-y: scroll;">
                    <div class="row">
                        <div class="col-4">
                            <h5 class="card-title">
                                {{__('products.digital_product')}}
                            </h5>
                        </div>
                    </div>


                    <div class="card-code">
                        {{__('products.codes')}}
                        <div class="row mt-3">
                            <div class="col-9">
                                <input type="text" class="form-control" name="codes[]">
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-success btn-plus"><i class="la la-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="new-code"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



