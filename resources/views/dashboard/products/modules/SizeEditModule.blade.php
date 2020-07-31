<div class="modal fade text-left" id="edit_sizes" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title get_code_title" id="exampleModalScrollableTitle"></span>
                </span>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div style="overflow-y: scroll;">
                <table class="table table-striped table-sizes">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('plugins/applications/meatApplication/meatSizes.size_name') }}</th>
                        <th>{{__('general.active')}}</th>
                        <th>{{__('general.price')}}</th>
                    </tr>
                    </thead>
                    <tbody class="states_model">
                    @foreach($sizes as $key => $size)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$size->name_ar}}</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input product_size" value="{{$size->id}}" @foreach($product->sizes as $item) @if($item->id == $size->id) checked @endif @endforeach name="sizes[]" id="sizes_checkbox{{$key}}">
                                    <label class="custom-control-label product_size" for="sizes_checkbox{{$key}}"></label>
                                </div>
                            </td>
                            <td>
                                <input type="number" step="any" @foreach($product->sizes as $item) @if($item->id == $size->id) name="size_price[]"
                                 value="{{$item->pivot->price}}" @endif
                                @endforeach  class="form-control size-price-input">
                            </td>
                        </tr>
                    @endforeach
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