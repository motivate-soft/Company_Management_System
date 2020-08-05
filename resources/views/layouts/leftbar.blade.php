<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/dashboard')}}" class="logo logo-large"><img src="{{ url('/') }}/assets/images/logo.png" class="img-fluid" alt="logo"></a>
            <a href="{{url('/dashboard')}}" class="logo logo-small"><img src="{{ url('/') }}/assets/images/small_logo.svg" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ url('/dashboard') }}">
                      <img src="/assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>{{__('side.dashboard')}}</span>
                    </a>

                </li>

                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ asset('assets/images/svg-icon/ecommerce.svg') }}" class="img-fluid" alt="Products"><span>{{ __('side.products') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('products.index') }}"> {{ __('side.productList') }} </a></li>

                         <li><a href="{{url('/categories')}}">{{ __('side.categories') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/images/svg-icon/components.svg" class="img-fluid" alt="Orders"><span>{{ __('side.sliders') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('sliders.index')}}">{{ __('side.sliders') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/images/svg-icon/components.svg" class="img-fluid" alt="Orders"><span>{{ __('side.orders') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/orders')}}">{{ __('side.ordersList') }}</a></li>
                        <li><a href="#">{{ __('side.orderNew') }}</a></li>
                        <li><a href="#">{{ __('side.orderStatus') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/images/svg-icon/notifications.svg" class="img-fluid" alt="Marketing"><span>{{ __('side.marketing') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('coupons.index') }}">{{ __('side.coupons') }}</a></li>
                        <li><a href="{{route('malath.smsView')}}">{{ __('side.smsNotifications') }}</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/images/svg-icon/widgets.svg" class="img-fluid" alt="Plugins"><span>{{ __('side.plugins') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ url('plugins') }}">{{ __('side.pluginList') }}</a></li>


                    </ul>
                </li>

                @php
                $plug = get_plugin_if_active(2);
                @endphp
                @if($plug->status == 1)
                <li>
                    <a href="javaScript:void(0)">
                        <img src="{{ url('/') }}/assets/images/svg-icon/components.svg" class="img-fluid" alt="dashboard"><span>{{ __('plugins/applications/meatApplication/pluginInformation.sidePluginName') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('sizes.index') }}">{{ __('side.sizes') }}</a></li>
                        <li><a href="{{ route('cuttings.index') }}">{{ __('side.cutting') }}</a></li>
                        <li><a href="{{ route('packings.index') }}">{{ __('side.packing') }}</a></li>
                    </ul>
                </li>
                @endif

                <li>
                    <a href="javaScript:void(0)">
                      <img src="{{ url('/') }}/assets/images/svg-icon/user.svg" class="img-fluid" alt="dashboard"><span>{{ __('side.customers') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ url('/list-customers') }}">{{ __('side.customersList') }}</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javaScript:void(0)">
                      <img src="{{ url('/') }}/assets/images/svg-icon/settings.svg" class="img-fluid" alt="dashboard"><span>{{ __('side.settings') }}</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">

                        <li><a href="{{ url('/bank-information') }}">{{ __('side.bank') }}</a></li>
                        <li><a href="{{ url('/countries') }}">{{ __('settings/countries.countryList') }}</a></li>
                        <li><a href="{{ url('/vat-tax') }}">TAX (VAT)</a></li>
                        <li><a href="{{ url('/social-links') }}">Social Links</a></li>
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
