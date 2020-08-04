<style>
    thead th { position: sticky; top: 0; background: #fff; }
    thead tr:first-child th { position: sticky; top: -1; background: #fff; }
</style>
<div class="modal fade text-left" id="add_product" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title get_code_title" id="exampleModalScrollableTitle"></span>
                </span>
                <!--Add Search Bar on Here-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div style="overflow-y: scroll;">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10%; text-align: center;">{{ __('products/products.id') }}</th>
                        <th style="width: 15%; text-align: center;">{{ __('products/productAdd.image') }}</th>
                        <th style="width: 30%; @if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif">{{ __('products/products.name') }}</th>
                        <th style="width: 10%; text-align: center;">{{ __('orders/orderDetails.qty') }}</th>
                        <th style="width: 10%; text-align: center;">{{ __('products/products.price') }}</th>
                        <th style="width: 10%; text-align: center;">{{ __('products/products.totalPrice') }}</th>
                        <th style="width: 15%; text-align: center;">{{ __('products/products.select') }}</th>
                    </tr>
                    </thead>
                    <tbody class="states_model">
                        <form id="products_form">
                            {{ csrf_field() }}
                            <input type="hidden" name="order_id" value="{{$order->id}}">

                            @foreach($items as $itm)
                            <?php
                                if(empty($itm['product'])) {continue;}
                            ?>
                            <input type="hidden" name="product_ids[]" value="{{$itm['product']['id']}}">
                            <tr>
                                <td style="text-align: center;" scope="row">
                                    {{$itm['product']['id']}}
                                </td>       
                                <td style="text-align: center;">
                                    @if($itm['product']['image'] != '')
                                        <img style="height: 50px;width: 50px;border-radius: 10px;" src="{{ url('uploads/product_images') }}/{{ $itm['product']['image'] }}" class="img-fluid" width="35">
                                    @else
                                        <img style="height: 50px;width: 50px;border-radius: 10px;" src="{{ url('assets/dashboard/images/no-image.jpg') }}" class="img-fluid" width="35">
                                    @endif
                                </td> 
                                <td style="@if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif">
                                    @if(app()->getLocale() == "en") {{ $itm['product']['name'] }} @else {{ $itm['product']['name_ar'] }} @endif
                                </td>
                                <td style="text-align: center;">
                                    <input type="number" style="text-align: center;" class="form-control product-qty" value="{{$itm['quantity']}}" name="product_quantity[]" data-id="{{$itm['product']['id']}}" data-price="{{ $itm['product']['price'] }}" placeholder="{{ __('orders/orderDetails.qty') }}">
                                </td>
                                <td style="text-align: center;">
                                    ${{ $itm['product']['price'] }}
                                </td>
                                <td style="text-align: center;">
                                    <input style="text-align: center;" type="number" class="form-control" name="product_total_price[]" id="total_price_{{$itm['product']['id']}}" value="{{ $itm['product']['price']*$itm['quantity'] }}" readonly>
                                </td>

                                <td style="text-align: center;">
                                    <input style="text-align: center;" type="checkbox" class="form-control" name="product_checked[]" checked>
                                </td>
                            </tr>
                           
                            @endforeach

                            @foreach($products as $product)
                                @if(in_array($product->id, $productIds)) @continue @endif
                            <input type="hidden" name="product_ids[]" value="{{$product->id}}">
                            <tr>
                                <td style="text-align: center;" scope="row">
                                    {{ $product->id }}
                                </td>                                        
                                <td style="text-align: center;">
                                    @if($product->image != '')
                                        <img style="height: 50px;width: 50px;border-radius: 10px;" src="{{ url('uploads/product_images') }}/{{ $product->image }}" class="img-fluid" width="35">
                                    @else
                                        <img style="height: 50px;width: 50px;border-radius: 10px;" src="{{ url('assets/dashboard/images/no-image.jpg') }}" class="img-fluid" width="35">
                                    @endif
                                </td> 
                                <td style="@if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif">
                                    @if(app()->getLocale() == "en") {{ $product->name }} @else {{ $product->name_ar }} @endif
                                </td>
                                <td>
                                    <input style="text-align: center;" type="number" class="form-control product-qty" name="product_quantity[]" data-id="{{$product->id}}" data-price="{{$product->price}}" placeholder="{{ __('orders/orderDetails.qty') }}">
                                </td>
                                <td style="text-align: center;">
                                    {{ $product->price }}
                                </td>
                                <td style="text-align: center;" >
                                    <input style="text-align: center;" type="number" class="form-control" name="product_total_price[]" id="total_price_{{$product->id}}" readonly>
                                </td>
                                <td style="text-align: center;">
                                    <input type="checkbox" class="form-control" name="product_checked[]">
                                </td>
                            </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">{{ __('general.close') }}</span>
                </button>

                <button type="button" class="btn btn-primary" onclick="updateProduct()">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Update</span>
                </button>

            </div>

        </div>
    </div>
</div>


