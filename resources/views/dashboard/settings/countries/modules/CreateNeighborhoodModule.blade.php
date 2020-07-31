<div class="modal fade text-left" id="add_neiberhood" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title" id="exampleModalScrollableTitle">{{ __('settings/countries.neighborhoodAdd') }}</span>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('countries.neiber.add') }}" id="add_neibe_on_model" method="post">
                    @csrf
                    <input type="hidden" name="neiber_id" class="add_neiber_city_id">
                    <fieldset class="form-group">
                        <label for="basicInput">{{ __('settings/countries.neighborhoodEN') }}</label>
                        <input type="text" name="neighborhood_name" placeholder="{{ __('settings/countries.neighborhoodEN') }}" class="form-control neiber_name_form">
                        <label for="basicInput">{{ __('settings/countries.neighborhoodAR') }}</label>
                        <input type="text" name="ar_neighborhood_name" placeholder="{{ __('settings/countries.neighborhoodAR') }}" class="form-control neiber_name_form_ar">
                        <label for="basicInput">{{ __('settings/countries.deliveryFees') }}</label>
                        <input type="number" name="delievery_fee" placeholder="{{ __('settings/countries.deliveryFees') }}" class="form-control delievery_fee_neiber">

                    </fieldset>
                    <button type="submit" class="btn btn-primary">{{ __('settings/countries.neighborhoodAdd') }}</button>
                </form>  
            </div>
        
            <!--<div class="modal-footer">-->
            <!--    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">-->
            <!--        <i class="bx bx-x d-block d-sm-none"></i>-->
            <!--        <span class="d-none d-sm-block">{{ __('settings/countries.close') }}</span>-->
            <!--    </button>-->
            <!--</div>  -->

        </div>
    </div>
</div>