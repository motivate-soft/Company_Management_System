@section('title') 
{{ __('side.ordersList') }}
@endsection 
@extends('dashboard.layouts.layout')

@section('style')

@endsection 

@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('side.ordersList') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.orders') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('side.ordersList') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{ __('orders/orderList.ordersNew') }}</button>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">{{ __('orders/orderList.orderId') }}</th>
                                    <th style="width: 25%;">{{ __('orders/orderList.name') }}</th>
                                    <th style="width: 12.5%;">{{ __('orders/orderList.date') }}</th>
                                    <th style="width: 12.5%;">{{ __('orders/orderList.total') }}</th>
                                    <th style="width: 20%;">{{ __('orders/orderList.status') }}</th>                                                
                                    <th style="width: 20%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $indx = 1;
                                @endphp
                                 @foreach ($orders as $order)
                                    
                                <tr>
                                    <th scope="row">{{ $indx }}</th>
                                    <td>@php
                                            $user_name = get_user_by_id($order->user_id);
                                            if(!is_null($user_name)){
                                                echo $user_name->name;
                                            }
                                        @endphp
                                    </td>
                                    <td>{{ substr($order->created_at,0,10) }}</td>
                                    <?php
                                     $productIds = [];
                                     $tax = 0;
                                     $carts = \App\Model\Cart::where('order_id', $order->id)->get();
                                     $subtotal = 0;
                                     foreach($carts as $cart){
                                         if (!empty($cart->product)) {
                                            $subtotal += $cart->product->price*$cart->quantity; 
                                            $perc = !empty($cart->tax) ? $cart->tax : $order->vat;
                                            $tax +=  $cart->product->price*$cart->quantity*$perc/100;
                                         }
                                     }
                                     $total = $tax + $subtotal + $order->delivery_fee;
                                     
                                 ?>
                                     

                                    ?>
                                    <td>{{ number_format($total, 0) }}</td>
                                    <td><span class="badge badge-primary-inverse">{{ ucfirst($order->status) }}</span></td>
                                    <td>
                                        <div class="button-list">
                                            <a href="{{url('dashboard/order') }}/{{ $order->id }}" class="btn btn-primary-rgba"><i class="feather icon-eye"></i></a>
                                            <a href="{{url('dashboard/order') }}/{{ $order->id }}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                            <a onclick="return confirm('Confirm to delete this order?');" href="{{url('dashboard/order-del').'/'.$order->id}}" class="btn btn-danger-rgba"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                   $indx++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right" >{{ $orders->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')

@endsection 