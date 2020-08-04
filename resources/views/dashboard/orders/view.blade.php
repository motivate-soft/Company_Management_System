@section('title') 
{{ __('orders/orderDetails.orderDetail') }} : #{{ $order->id }}
@endsection 
@php
$lang_current = Config::get('app.locale');
@endphp
@extends('dashboard.layouts.layout')
<base href="{{ url('/') }}">
@section('style')
<!-- Datepicker css -->
<link href="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
    .table-striped tbody tr {
        background-color: #e8e8e8 !important;
    }
    .datepicker {
      z-index: 1600 !important; /* has to be larger than 1050 */
    }
    @media screen {
    .printable { display: none;}
    .non-printable { display: block;}
    }
    @media print {
        .non-printable { display: none;}
        .printable { display: block;}
    }

</style>
<link href="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar non-printable">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('orders/orderDetails.orderDetail') }} : #{{ $order->id }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.orders') }}</li>
                    <li class="breadcrumb-item"><a href="{{url('/orders')}}">{{ __('side.ordersList') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('orders/orderDetails.orderDetail') }} : #{{ $order->id }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary">{{ __('orders/orderDetails.update') }}</button>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar non-printable">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-7 col-xl-8">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0">{{ __('orders/orderDetails.orderNo') }} : #{{ $order->id }}</h5>
                        </div>
                        @if(app()->getLocale() != "en")
                        <div class="col-5 text-left">
                            <span class="badge badge-primary-inverse">{{ ucfirst($order->status) }}</span>                                             
                        </div>
                        @else
                        <div class="col-5 text-right">
                            <span class="badge badge-primary-inverse">{{ ucfirst($order->status) }}</span>                                             
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">                                
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-2">
                            <div class="order-primary-detail mb-4">
                            <h6>{{ __('orders/orderDetails.orderDate') }}</h6>
                            <p class="mb-0">
                                {{ $order->created_at }}
                            </p>
                            </div>
                        </div>
                       
                        <div class="col-md-6 col-lg-6 col-xl-2">
                            <div class="order-primary-detail mb-4">
                            <h6>{{ __('orders/orderDetails.clientName') }}</h6>
                            <p class="mb-0">{{ $order->user->name }} </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-2">
                            <div class="order-primary-detail mb-4">
                            <h6>{{ __('orders/orderDetails.contactNumber') }}</h6>
                            <p class="mb-0">
                                    {{ $order->user->phone }}
                            </p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-lg-6 col-xl-6 ">
                            <div class="order-primary-detail mb-4">
                            <h6>{{ __('orders/orderDetails.address') }}</h6>
                            <!--<a href="#" class="badge badge-primary-inverse">Edit</a>-->
                            <p class="mb-p">
                                {{ $order->country.'/'.$order->state.'/'.$order->city.'/'.$order->neighborhood.'/'.$order->address }}
                            </p>
                            </div>
                        </div>
                        <!-- hide map button -->
                        <div class="col-md-12 col-lg-12 col-xl-12 " style="display:none;"> 
                            @if(isset($order['address']['address'])) 
                                <a href="http://maps.google.com/?q={{ urlencode($order['address']['address']) }}" style="width: 100%; margin: 15px 0 -40px 0"  target="_blank" type="button" class="btn btn btn-info-rgba">{{ __('orders/orderDetails.viewOnMap') }}</a>
                            @endif
                        </div>
                        <!-- end -->

                    </div>                                
                </div>
            </div> 

            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-xs-12 col-md-7">
                            <h5 class="card-title mb-0">{{ __('orders/orderDetails.orderDetail') }} : #{{ $order->id }}</h5>
                        </div>
                        
                        <!--/====================================\-->
                        <!--|====== Meat Application Start ======|-->
                        <!--\====================================/-->
                        @php
                        $plug = get_plugin_if_active(2);
                        @endphp
                        @if($plug->status == 1)
                            @if(app()->getLocale() != "en")
                            <div class="col-xs-12 col-md-5 text-left">
                                <a style="width: 100%;" class="btn btn-primary-rgba float-left btn-xs" data-toggle="modal" data-target="#date-time" href="#">{{ __('orders/orderDetails.meatApplicationChangeTimeDate') }}</a>                               
                            </div>
                            @else
                            <div class="col-xs-12 col-md-5 text-right">
                                <a style="width: 100%;" class="btn btn-primary-rgba float-right btn-xs" data-toggle="modal" data-target="#date-time" href="#">{{ __('orders/orderDetails.meatApplicationChangeTimeDate') }}</a>                          
                            </div>
                            @endif
                        @endif
                        <!--/====================================\-->
                        <!--|======  Meat Application END  ======|-->
                        <!--\====================================/-->
                        
                    </div>
                    

                </div>  
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('orders/orderDetails.clientName') }}</th>                                                
                                    <th scope="col">{{ __('orders/orderDetails.paymentMethod') }}</th>
                                    @if(isset($order['pay_method']) && $order['pay_method'] == 'Bank') 
                                        <th scope="col">{{ __('orders/orderDetails.bankName') }}</th>
                                    @endif
                                    
                                    <!--/====================================\-->
                                    <!--|====== Meat Application Start ======|-->
                                    <!--\====================================/-->
                                    @php
                                    $plug = get_plugin_if_active(2);
                                    @endphp
                                    @if($plug->status == 1)
                                    <th scope="col">{{ __('orders/orderDetails.meatApplicationDeliveryDate') }}</th>
                                    <th scope="col">{{ __('orders/orderDetails.meatApplicationDeliveryTime') }}</th>
                                    @endif
                                    <!--/====================================\-->
                                    <!--|======  Meat Application END  ======|-->
                                    <!--\====================================/-->
                                    
                                 </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td>{{ $order['user']['name'] }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    @if(isset($order['pay_method']) && $order['pay_method'] == 'Bank') 
                                        @if(isset($order['bank']['name'])) 
                                            <td>{{ $order['bank']['name'] }}</td>
                                        @endif
                                    @endif
                                    <!--/====================================\-->
                                    <!--|====== Meat Application Start ======|-->
                                    <!--\====================================/-->
                                    @php
                                    $plug = get_plugin_if_active(2);
                                    @endphp
                                    @if($plug->status == 1)
                                    <td>{{ $order['delivery_date'] }}</td>
                                    <td>{{ $order['delivery_time'] }}</td>
                                    @endif
                                    <!--/====================================\-->
                                    <!--|======  Meat Application END  ======|-->
                                    <!--\====================================/-->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                 </div>
             </div>

            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">{{ __('orders/orderDetails.orderItems') }} : #{{ $order->id }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('orders/orderDetails.productIMG') }}</th>
                                    <th scope="col">{{ __('orders/orderDetails.productName') }}</th>
                                    <th scope="col">{{ __('orders/orderDetails.qty') }}</th>
                                    <th scope="col">{{ __('orders/orderDetails.price') }}</th>
                                    <th scope="col" class="text-right">{{ __('orders/orderDetails.total') }}</th>
                                    <!--<th scope="col">Action</th>  -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $incr = 1; $sub_totl = 0;
                                $productIds = [];
                                $tax = 0;
                            ?>
                                @if(isset($items) && count($items) > 0)
                                   <?php $incr = 1; $sub_totl = 0; ?>
                                    @foreach($items as $itm)
                                    <?php
                                        if(empty($itm['product'])) {continue;}
                                        $productIds[] =  $itm['product']['id'];
                                    ?>
                                    <tr>
                                        <th scope="row">{{ $incr }}</th>
                                        
                                        <td>
                                            @if($itm['product']['image'] != '')
                                            <img style="border-radius: 20%; width: 40px; height: 40px;" src="{{ url('uploads/product_images') }}/{{ $itm['product']['image'] }}" class="img-fluid" width="35">
                                            @else
                                            <img style="border-radius: 20%; width: 40px; height: 40px;" src="{{ url('assets/dashboard/images/no-image.jpg') }}" class="img-fluid" width="35">
                                            @endif
                                        </td> 
                                        <td>{{ $itm['product']['name'] }}</td>
                                        <td>{{ $itm['quantity'] }}</td>
                                        <td>${{ $itm['product']['price'] }}</td>
                                        <td class="text-right">${{ $itm['product']['price']*$itm['quantity'] }}</td>
                                        <td>
                                            <a href="#" class="text-success mr-2"><i class="feather icon-edit-2"></i></a>
                                            <a onclick="return confirm('Confirm to delete this item?');" href="{{ url('order-item-del') }}/{{ $itm['item_id'] }}" class="text-danger"><i class="feather icon-trash"></i></a>
                                        </td>
                                    </tr>
                                    @php 
                                    $incr++;
                                    $sub_totl += $itm['product']['price']*$itm['quantity']; 
                                    $perc = !empty($itm['tax']) ? $itm['tax'] : $order['vat'];
                                    $tax +=  $itm['product']['price']*$itm['quantity']*$perc/100;
                                    @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row border-top pt-3">
                        <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
                            <div class="order-note">
                                <!--<p class="mb-5"><span class="badge badge-secondary-inverse">Free Shipping Order</span></p>-->
                                <h6>{{ __('orders/orderDetails.note') }} :</h6>
                                <textarea name="order_note" id="" style="resize: none;" cols="30" rows="4" class="form-control">@if(isset($order->note)) {!! $order->note !!} @endif</textarea>
                                <button style="margin-top:5px; width: 100%;" class="btn btn-secondary note-save-btn">{{ __('general.save') }}</button>
                            </div>
                        </div>
                        <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                            <div class="order-total table-responsive ">
                                <table class="table table-borderless text-right">
                                    <tbody>
                                        <tr>
                                            <td style="@if(app()->getLocale() == "en") text-align: right; @else text-align: right; @endif">{{ __('orders/orderDetails.subTotal') }} :</td>
                                            <td>${{ number_format($sub_totl) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="@if(app()->getLocale() == "en") text-align: right; @else text-align: right; @endif">{{ __('orders/orderDetails.shipping') }} :</td>
                                            <td>${{$order->delivery_fee}}</td>
                                        </tr>
                                        <tr>
                                            <td style="@if(app()->getLocale() == "en") text-align: right; @else text-align: right; @endif">{{ __('orders/orderDetails.tax') }} (@if(isset($order['vat'])){{ $order['vat'] }}@else 0 @endif%) :</td>
                                            <td>
                                            @php
                                                $va_tax = 0;
                                                if(isset($order['vat'])){
                                                    $va_tax = $sub_totl*$order['vat']/100; 
                                                }
                                            @endphp
                                            ${{ number_format($tax,2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="@if(app()->getLocale() == "en") text-align: right; @else text-align: right; @endif" class="text-black f-w-7 font-18">{{ __('orders/orderDetails.totalDue') }} :</td>
                                            <td class="text-black f-w-7 font-18">
                                               ${{ number_format($tax + $sub_totl + $order->delivery_fee,2) }} 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button data-toggle="modal" data-target="#add_product" class="col-12 btn btn-primary-rgba my-1 add_product_btn"><i class="feather icon-plus mr-2"></i>{{ __('orders/orderDetails.addProduct') }}</button>
                </div>
            </div>
            <div class="card m-b-30"> 
                <div class="card-header">                                 
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0">{{ __('orders/orderDetails.ordeHistory') }}</h5>
                        </div>
                     </div>
                </div>
                <div class="card-body" style="max-height: 200px; overflow: scroll;">
                    @foreach($history as $h)
                    <div class="order-primary-detail row mb-2 pb-2" style="border-bottom: 1px solid #eee;">
                            <div class="col-sm-9">
                            {{$h->content}}
                            </div> 
                            <div class="col-sm-3">
                                <small>{{ __('orders/orderDetails.historyBy') }}: {{!empty($h->user) ? $h->user->name : '--'}}<br>
                                {{$h->created_at}}</small>
                            </div>
                     </div>
                     @endforeach
 
                </div>
            </div>                  
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-5 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">    
                    <h6>{{ __('orders/orderDetails.via') }}</h6>
                    <ul class="nav nav-pills nav-justified" id="pills-tab-justified" @if($lang_current == 'ar') style="padding-right: 0 !important;" @endif role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-home-tab-justified" data-toggle="pill" href="#pills-home-justified" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('orders/orderDetails.email') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-justified" data-toggle="pill" href="#pills-profile-justified" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('orders/orderDetails.sms') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-contact-tab-justified" data-toggle="pill" href="#pills-contact-justified" role="tab" aria-controls="pills-contact" aria-selected="false">{{ __('orders/orderDetails.both') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tab-justifiedContent">
                        <div class="tab-pane fade" id="pills-home-justified" role="tabpanel" aria-labelledby="pills-home-tab-justified">
                            <div class="card-body">
                                <form action="{{ url('change-order-status') }}/{{ Request::segment(2) }}" >
                                    <input type="hidden" name="via" id="via-input" value="email" />
                                    <div class="row mb-1">
                                        <select id="orderCategory" name="status" class="form-control">
                                            <option selected>{{ __('orders/orderDetails.selectStatus') }}</option>
                                            <option value="processing">Processing</option>
                                            <option value="on-hold">On-Hold</option>
                                            <option value="shipped">Shipped</option>
                                            <option value="out-for-delivery">Out for Delivery</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <textarea class="form-control" name="specialMessage" id="specialMessage" rows="3" placeholder="{{ __('orders/orderDetails.specialMSG') }}"></textarea>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="col-12 btn btn-primary my-1"><i class="feather icon-send mr-2"></i>{{ __('orders/orderDetails.send') }}</button>
                                        <button type="button" class="col-6 btn btn-warning-rgba my-1"><i class="feather icon-repeat mr-2"></i>{{ __('orders/orderDetails.refund') }}</button>
                                        <button type="button" class="col-6 btn btn-danger-rgba my-1"><i class="feather icon-trash mr-2"></i>{{ __('orders/orderDetails.cancel') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile-justified" role="tabpanel" aria-labelledby="pills-profile-tab-justified">
                            <div class="card-body">
                                <form action="{{ url('change-order-status') }}/{{ Request::segment(2) }}" >
                                    <input type="hidden" name="via" id="via-input" value="email" />
                                    <div class="row mb-1">
                                        <select id="orderCategory" name="status" class="form-control">
                                            <option selected>{{ __('orders/orderDetails.selectStatus') }}</option>
                                            <option value="processing">Processing</option>
                                            <option value="on-hold">On-Hold</option>
                                            <option value="shipped">Shipped</option>
                                            <option value="out-for-delivery">Out for Delivery</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <textarea class="form-control" name="specialMessage" id="specialMessage" rows="3" placeholder="{{ __('orders/orderDetails.specialMSG') }}"></textarea>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="col-12 btn btn-primary my-1"><i class="feather icon-send mr-2"></i>{{ __('orders/orderDetails.send') }}</button>
                                        <button type="button" class="col-6 btn btn-warning-rgba my-1"><i class="feather icon-repeat mr-2"></i>{{ __('orders/orderDetails.refund') }}</button>
                                        <button type="button" class="col-6 btn btn-danger-rgba my-1"><i class="feather icon-trash mr-2"></i>{{ __('orders/orderDetails.cancel') }}</button>
                                    </div>
                                </form>
                            </div>                                </div>
                        <div class="tab-pane fade show active" id="pills-contact-justified" role="tabpanel" aria-labelledby="pills-contact-tab-justified">
                            <div class="card-body">
                                <form action="{{ url('change-order-status') }}/{{ Request::segment(2) }}" >
                                    <input type="hidden" name="via" id="via-input" value="email" />
                                    <div class="row mb-1">
                                        <select id="orderCategory" name="status" class="form-control">
                                            <option selected>{{ __('orders/orderDetails.selectStatus') }}</option>
                                            <option value="processing">Processing</option>
                                            <option value="on-hold">On-Hold</option>
                                            <option value="shipped">Shipped</option>
                                            <option value="out-for-delivery">Out for Delivery</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <textarea class="form-control" name="specialMessage" id="specialMessage" rows="3" placeholder="{{ __('orders/orderDetails.specialMSG') }}"></textarea>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="col-12 btn btn-primary my-1"><i class="feather icon-send mr-2"></i>{{ __('orders/orderDetails.send') }}</button>
                                        <button type="button" class="col-6 btn btn-warning-rgba my-1"><i class="feather icon-repeat mr-2"></i>{{ __('orders/orderDetails.refund') }}</button>
                                        <button type="button" class="col-6 btn btn-danger-rgba my-1"><i class="feather icon-trash mr-2"></i>{{ __('orders/orderDetails.cancel') }}</button>
                                    </div>
                                </form>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="card m-b-30">-->
            <!--    <div class="card-header">-->
            <!--        <h5 class="card-title">Chat with Customers</h5>-->
            <!--    </div>-->
            <!--    <div class="card-body">-->
            <!--        <div class="chat-detail order-chat-detail mb-0">-->
            <!--            <div class="chat-body">-->
            <!--                <div class="chat-day text-center mb-3">-->
            <!--                    <span class="badge badge-secondary">Today</span>-->
            <!--                </div>                                -->
            <!--                <div class="chat-message chat-message-right">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Hello!</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:18 pm<i class="feather icon-check ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-left">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Yes, Sir</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:20 pm<i class="feather icon-check ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-right">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Schedule demo.</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:25 pm<i class="feather icon-check ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-left">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Sure, I will.</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:27 pm<i class="feather icon-check ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-right">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Great. Thanks</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-left">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>I have completed.</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:20 pm<i class="feather icon-check ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-right">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Please, send me.</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:25 pm<i class="feather icon-check ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-left">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Sure, I will email you.</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:27 pm<i class="feather icon-check ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="chat-message chat-message-right">-->
            <!--                    <div class="chat-message-text">-->
            <!--                        <span>Ok, Got it.</span>-->
            <!--                    </div>-->
            <!--                    <div class="chat-message-meta">-->
            <!--                        <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="chat-bottom px-0 pb-0">-->
            <!--                <div class="chat-messagebar">-->
            <!--                    <form>-->
            <!--                        <div class="input-group">-->
            <!--                            <div class="input-group-prepend">-->
            <!--                                <button class="btn btn-secondary-rgba" type="button" id="button-addonmic"><i class="feather icon-mic"></i></button>-->
            <!--                            </div>  -->
            <!--                            <input type="text" class="form-control" placeholder="Type a message..." aria-label="Text">-->
            <!--                            <div class="input-group-append">-->
            <!--                                <button class="btn btn-secondary-rgba" type="submit" id="button-addonlink"><i class="feather icon-link"></i></button>-->
            <!--                                <button class="btn btn-primary-rgba" type="button" id="button-addonsend"><i class="feather icon-send"></i></button>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </form>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="card m-b-30">
                <div class="card-body">
                    <p><button style="width: 100%;" type="button" class="btn btn-primary-rgba my-1" onclick="downloadInvoice('{{ $order->id }}')"><i class="feather icon-file mr-2"></i>{{ __('orders/orderDetails.invoiceDownload') }}</button></p>
                    <p><button style="width: 100%;" type="button" class="btn btn-primary-rgba my-1" onclick="printInvoice('{{ $order->id }}')"><i class="feather icon-printer mr-2"></i>{{ __('orders/orderDetails.invoicePrint') }}</button></p>
                    <!--<p><button style="width: 100%;" type="button" class="btn btn-info-rgba my-1"><i class="feather icon-box mr-2"></i>Packaing Slip</button></p>-->
                    <!--<p><button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-gift mr-2"></i>Gift Wrap Detail</button></p>-->
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->

<!-- printable part -->
<div class="printable">
</div>


<!-- Change order date time modal -->
<div id="date-time" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Order Date/Time</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <form method="post" action="/">
      
            <label>Date:</label>
            <div class="input-group">                                  
                <input type="text" id="default-date" class="datepicker-here form-control" placeholder="dd/mm/yyyy" aria-describedby="basic-addon2"/>
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
              </div>
            </div>
         

          <div class="form-group">
            <label>Time:</label> 
            <input type="time" class="form-control" name="delivery_time" value="{{$order['delivery_time']}}">
          </div> 
 
          <button type="submit" class="btn btn-default">Update</button>
        </form>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@include('dashboard.orders.modules.addProductModule')
@endsection 
@section('script')
    

<script src="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-form-datepicker.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-ecommerce-order-detail-page.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/custom/custom-sweet-alert.js') }}"></script>
 
<script>
"use strict";
$(document).ready(function() {
    $(".via-class").click(function(){
        $('#via-input').val($(this).attr('data-id'));
    });

    $('.product-qty').change(function(){
        var qty = parseInt($(this).val());
        var total = qty * $(this).data('price');
        var product_id = $(this).data('id');
        $('#total_price_' + product_id).val(total);

    });

    $('.note-save-btn').click(function(){
        var note = $('textarea[name=order_note]').val();
        console.log(note);
        $.ajax({
            url:'{{route('order.update.note')}}',
            type:'GET',
            data:{
                note:note,
                order_id: '{{$order->id}}',
                },
            success:function(res){
                swal({
                    title: 'Successfully Updated',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: '{{__('general.yes')}}!',
                    cancelButtonText: '{{__('general.no_cancel')}}!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10',
                    buttonsStyling: false
                }).then(function () {
                    console.log('here');
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        console.log('here_1');
                    }
                });

            }
        })
    })
});
function downloadInvoice(orderId){
    window.open('{{route('invoice.download')}}' + '?order_id=' + orderId);   
}

function printInvoice(orderId){
    var data = {
        _token: '{{csrf_token()}}',
        order_id: orderId,
    }
    $.ajax({
        url:'{{route('invoice.print')}}',
        type:'POST',
        data:data,
        success:function(res){
            $('.printable').html(res);
            window.print();
        },
        error:function(){

        }
    })
}

function updateProduct() {

    var data = $('#products_form').serializeArray();

    $('input[name^=product_checked]').each(function(ele){
        if($(this).prop('checked')) {
            data.push({
            name: 'selected[]',
            value: 'on' 
        });
        } else {
            data.push({
            name: 'selected[]',
            value: 'off' 
        });
        }
    });

    swal({
        title: 'Are you sure update products for this order?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: '{{__('general.yes')}}!',
        cancelButtonText: '{{__('general.no_cancel')}}!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger m-l-10',
        buttonsStyling: false
    }).then(function () {
        $('#add_product').modal('hide');
        $.ajax({
            data:data,
            url:'{{route('order.products.update')}}',
            type: 'POST',
            success: function(res){
                location.reload();
            }
        })
    }, function (dismiss) {
        if (dismiss === 'cancel') {
            console.log('here_1');
        }
    });


    // var conf = confirm('Are you sure update products for this order?');
    // if (conf) {
    //     $('#add_product').modal('hide');
    //     $.ajax({
    //         data:data,
    //         url:'{{route('order.products.update')}}',
    //         type: 'POST',
    //         success: function(res){
    //             location.reload();
    //         }
    //     })
    // }

}
</script>
@endsection 
