<!-- Start col -->
<div class="card m-b-30">
    @php
        $plug = get_plugin_if_active(2);
    @endphp
    @if($plug->status == 1)
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{ __('products/productAdd.cuttingMethod') }}</h5>
            </div>
            <div class="card-body pt-3">
                <select class="select2-multi-select form-control" name="cutting_method[]" multiple="multiple">
                    @if(isset($cutting))
                        @if(count($cutting) > 0)
                            @foreach($cutting as $cut)
                                <option value="{{ $cut->id }}">{{ $cut->name_ar }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>
        </div>

        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{ __('products/productAdd.packagingMethod') }}</h5>
            </div>
            <div class="card-body pt-3">
                <select class="select2-multi-select form-control" name="packaging_method[]" multiple="multiple" required>
                    @if(isset($packing))
                        @if(count($packing) > 0)
                            @foreach($packing as $pack)
                                <option value="{{ $pack->id }}">{{ $pack->name_ar }}</option>
                            @endforeach
                        @endif
                    @endif
                </select>
            </div>
        </div>
        
        <div class="card m-b-30">
            <div class="card-header">
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
                                    <input type="checkbox" class="custom-control-input product_size" value="{{$size->id}}" name="sizes[]" id="sizes_checkbox{{$key}}">
                                    <label class="custom-control-label product_size" for="sizes_checkbox{{$key}}"></label>
                                </div>
                            </td>
                            <td>
                                <input type="number" step="any" class="form-control size-price-input">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
