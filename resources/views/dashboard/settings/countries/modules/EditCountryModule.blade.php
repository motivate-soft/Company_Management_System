<div class="modal fade text-left" id="edit_countries{{ $country->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">    

            <div class="modal-header">
                <span class="modal-title" id="exampleModalScrollableTitle">{{ __('settings/countries.editCountry') }}</span>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('countries.edit') }}"  method="post">
                    @csrf
                    <fieldset class="form-group">
                        <input type="hidden" name="country_id" value="{{ $country->id }}">
                    <label for="basicInput">{{ __('settings/countries.nameEN') }}</label>
                        <input type="text" name="country_name" placeholder="{{ __('settings/countries.nameEN') }}" value="{{ $country->name  }}" class="form-control">

                        <label for="basicInput">{{ __('settings/countries.nameAR') }}</label>
                        <input type="text" name="ar_country_name" placeholder="{{ __('settings/countries.nameAR') }}" value="{{ $country->ar_name  }}" class="form-control">
  
                        <label for="basicInput">{{ __('settings/countries.phoneCode') }}</label>
                        <input type="text" name="country_code" placeholder="{{ __('settings/countries.phoneCode') }}" value="{{ $country->phonecode  }}" class="form-control">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">{{ __('settings/countries.editBTN') }}</button>
                </form>  
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