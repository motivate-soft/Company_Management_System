v<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/dashboard')}}" class="mobile-logo"><img src="{{ url('/') }}/assets/images/logo.png" class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void(0)">
                                    <img src="{{ url('/') }}/assets/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                    <img src="{{ url('/') }}/assets/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void(0)">
                                    <img src="{{ url('/') }}/assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                    <img src="{{ url('/') }}/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                 </a>
                             </div>  
                        </li>                                
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Topbar -->
    <div class="topbar">
        <!-- Start row -->
        <div class="row align-items-center">
            <!-- Start col -->
            <div class="col-md-12 align-self-center">
                <div class="togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void(0)">
                                   <img src="{{ url('/') }}/assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                   <img src="{{ url('/') }}/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">  
                                 </a>
                             </div>
                        </li>
                        
                    </ul>
                </div>
                <div class="infobar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="settingbar">
                                <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                    <img src="{{ url('/') }}/assets/images/svg-icon/settings.svg" class="img-fluid" alt="settings">
                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="notifybar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('/') }}/assets/images/svg-icon/notifications.svg" class="img-fluid" alt="notifications">
                                    <span class="live-icon"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                        <div class="notification-dropdown-title">
                                            <h4>Notifications</h4>                            
                                        </div>
                                        <ul class="list-unstyled">  
                                            @foreach(order_notif() as $nof_order)                                                  
                                            <li class="media dropdown-item">
                                                <span class="mr-3 action-icon badge badge-primary-inverse"><i class="feather icon-dollar-sign"></i></span>
                                                <div class="media-body">
                                                    <h5 class="action-title"> $ {{$nof_order->total}}</h5>
                                                    <p><span class="timing">{{date('m/d/Y', strtotime($nof_order->created_at))}}</span></p>                            
                                                </div>
                                            </li>
                                            @endforeach
                                            @foreach(product_notif() as $nof_pro)                                                  
                                            <li class="media dropdown-item">
                                                <span class="mr-3 action-icon badge badge-success-inverse"><i class="feather icon-file"></i></span>
                                                <div class="media-body">
                                                    <h5 class="action-title">{{$nof_pro->name}}</h5>
                                                    <p><span class="timing">{{date('m/d/Y', strtotime($nof_pro->created_at))}}</span></p>                            
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>                                
                        <li class="list-inline-item">
                            <div class="languagebar">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                        <a class="dropdown-item" href="{{ url('locale/en') }}"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                        <a class="dropdown-item" href="{{ url('locale/ar') }}"><i class="flag flag-icon-sa flag-icon-squared"></i>Arabic</a>
                                                                                        
                                    </div>
                                </div>
                            </div>                                   
                        </li>
                        <li class="list-inline-item">
                            <div class="profilebar">
                                <div class="dropdown">
                                  <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('/') }}/assets/images/users/profile.svg" class="img-fluid" alt="profile"><span class="feather icon-chevron-down live-icon"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                        <div class="dropdown-item">
                                            <div class="profilename">
                                              <h5>John Doe</h5>
                                            </div>
                                        </div>
                                        <div class="userbox">
                                            <ul class="list-unstyled mb-0">
                                                <li class="media dropdown-item">
                                                    <a href="#" class="profile-icon"><img src="{{ url('/') }}/assets/images/svg-icon/user.svg" class="img-fluid" alt="user">My Profile</a>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <a href="{{ route('logout') }}" class="profile-icon" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img src="{{ url('/') }}/assets/images/svg-icon/logout.svg" class="img-fluid" alt="logout">Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                                   
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End col -->
        </div> 
        <!-- End row -->
    </div>
    <!-- End Topbar -->
    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">{{ __('general.copyRights') }}</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>

