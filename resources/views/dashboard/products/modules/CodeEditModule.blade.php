

<div class="modal fade text-left" id="states_dark" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title get_code_title" id="exampleModalScrollableTitle"></span>
                </span>
                <span style="margin-left: 20px; "><button
                        class="add_code_button btn btn-dark btn-sm">{{ __('products.add_new_code') }}</button></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div style="overflow-y: scroll;">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('products.code') }}</th>
                        <th>{{__('general.edit')}}</th>
                        <th>{{__('general.delete')}}</th>
                    </tr>
                    </thead>
                    <tbody class="states_model">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('general.close') }}</span>
                </button>

            </div>

        </div>
    </div>
</div>

<div class="modal fade text-left" id="edit_dark" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title" id="exampleModalScrollableTitle">{{ __('products.edit_code') }}</span>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('codes.update') }}" id="edit_code_on_model" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <input type="hidden" name="id" class="code_id_hidden">
                        <label for="code">{{ __('products.code') }}</label>
                        <input type="text" id="code" name="code" placeholder="{{ __('products.code') }}"
                               class="form-control code_name_form">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">{{ __('general.edit') }}</button>
                </form>
            </div>



        </div>
    </div>
</div>

<div class="modal fade text-left" id="add_code" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title" id="exampleModalScrollableTitle">{{ __('settings/countries.stateAdd') }}</span>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('codes.store') }}" id="add_code_on_model" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <input type="hidden" name="product_id" class="add_code_id">
                        <label for="code">{{ __('products.code') }}</label>
                        <input type="text" id="code" name="code" placeholder="{{ __('products.code') }}"
                               class="form-control">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">{{ __('general.add') }}</button>
                </form>
            </div>


        </div>
    </div>
</div>
