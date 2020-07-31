<div class="modal fade text-left" id="neighborhood" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title get_neighborhood_title" id="exampleModalScrollableTitle"></span>
               </span>
                <span style="margin-left: 20px; "><button class="add_neiber_button btn btn-dark btn-sm" >{{ __('settings/countries.neighborhoodAdd') }}</button></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <div style="overflow-y: scroll;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('settings/countries.neighborhoodEN') }}</th>
                        <th>{{ __('settings/countries.neighborhoodAR') }}</th>
                        <th>{{ __('settings/countries.deliveryFees') }}</th>
                        <!--<th>{{ __('settings/countries.editBTN') }}</th>-->
                        <!--<th>{{ __('settings/countries.delete') }}</th>-->
                    </tr>
                </thead>
                <tbody class="neibher_model" >

                </tbody>
            </table>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('settings/countries.close') }}</span>
                </button>

            </div>
  
        </div>
    </div>
</div>