<div class="modal fade text-left" id="edit_cityesese" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title" id="exampleModalScrollableTitle">{{ __('settings/countries.cityEdit') }}</span>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('countries.cities.edit') }}" id="edit_city_on_model" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <input type="hidden" name="city_id" class="city_id_hidden">
                    <label for="basicInput">{{ __('settings/countries.cityEN') }}</label>
                        <input type="text" name="city_name" placeholder="{{ __('settings/countries.cityEN') }}" class="form-control city_name_form">
                    <label for="basicInput">{{ __('settings/countries.cityAR') }}</label>
                        <input type="text" name="ar_city_name" placeholder="{{ __('settings/countries.cityAR') }}" class="form-control city_name_form_ar">

                    <label for="basicInput">{{ __('settings/countries.deliveryFees') }}</label>
                        <input type="number" name="delievery_fee" placeholder="{{ __('settings/countries.deliveryFees') }}" class="form-control edit_deliery_city">

                    </fieldset>
                    <button type="submit" class="btn btn-primary">{{ __('settings/countries.editBTN') }}</button>
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