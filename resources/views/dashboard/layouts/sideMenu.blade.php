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
                        <li><a href="{{ route('categories.index') }}">{{ __('side.categories') }}</a></li>
                        <li><a href="{{ route('brands.index') }}">{{ __('side.brands') }}</a></li>
                        <li><a href="{{ route('products.index') }}"> {{ __('side.products') }} </a></li>
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
                    <a href="javascript:void(0);">
                        <img src="{{ url('/') }}/assets/dashboard/images/svg-icon/user.svg" class="img-fluid" alt="dashboard">
                        <span>{{ __('side.customers') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                    <li><a href="{{ route('customers.create') }}">{{ __('customers/customers.customerAdd') }}</a></li>
                    <li><a href="{{ route('customers.index') }}">{{ __('side.customersList') }}</a></li>
                    <li><a href="{{ route('customers.purchases') }}">{{__('Systems/SystemOne/sidebar.customerPurchases')}}</a></li>
                    <li><a href="{{ route('customers.disbursements') }}">{{__('Systems/SystemOne/sidebar.customerDisbursements')}}</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-sticky-note-o" aria-hidden="true"></i><span>{{ __('Systems/SystemFour/quotations.quotations') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        {{--                    <li><a href="{{ route('customer.create') }}">{{ __('customers/customers.customerAdd') }}</a></li>--}}
                        <li><a href="{{ route('quotations.create') }}">{{ __('Systems/SystemFour/quotations.addQuotation') }}</a></li>
                        <li><a href="{{ route('quotations.all') }}">{{ __('Systems/SystemFour/quotations.listQuotation') }}</a></li>

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

                <li>
                    <a href="javaScript:void(0)">
                      <i class="fa fa-tasks"></i><span>{{__('Systems/SystemTwo/sidebar.job_tasks')}}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        
                        <li><a href="{{ route('jobtasks.index') }}">All</a></li>
                        {{--<li><a href="{{ route('countries.index') }}">not_finished</a></li>--}}
                        {{--<li><a href="{{ route('tax.index') }}">expired</a></li>--}}
                    </ul>
                </li>

                <li>
                    <a href="{{route('staffs.index')}}">
                     <i class="fa fa-user-o" aria-hidden="true"></i><span>{{__('Systems/SystemTwo/sidebar.staffs')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('entryexits.index')}}">
                     <i class="fa fa-exchange" aria-hidden="true"></i><span>{{__('Systems/SystemTwo/sidebar.entry_exits')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('communications.index')}}">
                     <i class="fa fa-wechat" aria-hidden="true"></i><span>{{__('Systems/SystemTwo/sidebar.communications')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('transactions.index')}}">
                        <i class="fa fa-wechat" aria-hidden="true"></i><span>{{__('Systems/SystemTwo/sidebar.transactions')}}</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('jobtypes.index')}}">
                        <i class="fa fa-wechat" aria-hidden="true"></i><span>{{__('Systems/SystemTwo/sidebar.jobtypes')}}</span>
                    </a>
                </li>
                

            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
