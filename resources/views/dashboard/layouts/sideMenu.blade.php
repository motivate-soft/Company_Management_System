<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/dashboard')}}" class="logo logo-large"><img src="{{ url('/') }}/assets/dashboard/images/logo.png" class="img-fluid" alt="logo"></a>
            <a href="{{url('/dashboard')}}" class="logo logo-small"><img src="{{ url('/') }}/assets/dashboard/images/small_logo.svg" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ url('/dashboard') }}">
                      <img src="/assets/dashboard/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>{{__('side.dashboard')}}</span>
                    </a>
                    
                </li>
                
                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ asset('assets/dashboard/images/svg-icon/ecommerce.svg') }}" class="img-fluid" alt="Products"><span>{{ __('side.products') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('products.index') }}"> {{ __('side.productList') }} </a></li>
                        
                         <li><a href="{{ route('categories.index') }}">{{ __('side.categories') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/components.svg" class="img-fluid" alt="Orders"><span>{{ __('side.sliders') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('sliders.index') }}">{{ __('side.sliders') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/components.svg" class="img-fluid" alt="Orders"><span>{{ __('side.orders') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('orders.index') }}">{{ __('side.ordersList') }}</a></li>
                        <li><a href="#">{{ __('side.orderNew') }}</a></li>
                        <li><a href="#">{{ __('side.orderStatus') }}</a></li>
                    </ul>
                </li> 

                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/components.svg" class="img-fluid" alt="Orders"><span>{{ __('side.invoice') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <!-- <li><a href="{{ route('invoice.list') }}">{{ __('side.invoiceList') }}</a></li> -->
                        <li><a href="{{ route('invoice.template.list') }}">{{ __('side.invoiceTemplateList') }}</a></li>
                    </ul>
                </li> 

                
                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/notifications.svg" class="img-fluid" alt="Marketing"><span>{{ __('side.marketing') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('coupons.index') }}">{{ __('side.coupons') }}</a></li>
                        <li><a href="{{ route('malath.smsView') }}">{{ __('side.smsNotifications') }}</a></li>
                    </ul>
                </li> 
                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/widgets.svg" class="img-fluid" alt="Plugins"><span>{{ __('side.plugins') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('plugins.index') }}">{{ __('side.pluginList') }}</a></li>
                        
                       
                    </ul>
                </li> 
                
                
                
                

                <li>
                    <a href="{{ route('customers.index') }}">
                      <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/user.svg" class="img-fluid" alt="dashboard"><span>{{ __('side.customers') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
{{--                    <li><a href="{{ route('customer.create') }}">{{ __('customers/customers.customerAdd') }}</a></li>--}}
                    <li><a href="{{ route('customers.index') }}">{{ __('side.customersList') }}</a></li>
                    <li><a href="{{ route('customers.purchases') }}">Customer Purchases</a></li>
                    <li><a href="{{ route('customers.disbursements') }}">Customer Disbursements</a></li>

                    </ul>
                </li>
                
                <li>
                    <a href="javaScript:void(0)">
                      <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/settings.svg" class="img-fluid" alt="dashboard"><span>{{ __('side.settings') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        
                        <li><a href="{{ route('bank-information.index') }}">{{ __('side.bank') }}</a></li>
                        <li><a href="{{ route('countries.index') }}">{{ __('settings/countries.countryList') }}</a></li>
                        <li><a href="{{ route('tax.index') }}">TAX (VAT)</a></li>
                        <li><a href="{{ route('social.index') }}">Social Links</a></li>
                        <li><a href="{{ url('/help-privacy') }}">Help & Privacy</a></li>
                        <li><a href="{{ route('settings.underMaintenanceView') }}">Under Maintenance</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="{{url('sendnotifications')}}">
                     <i class="fa fa-bell" aria-hidden="true"></i><span>{{ __('side.Send Notifcations') }}</span>
                    </a>
                    
                </li>
                

            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
