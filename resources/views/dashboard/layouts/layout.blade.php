<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
        <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
        <meta name="author" content="Themesbox">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title') </title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ asset('assets/dashboard/images/favicon.ico') }}">
        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
        <!-- Start CSS -->   
        @yield('style')
        <link href="{{ asset('assets/dashboard/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/dashboard/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/dashboard/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
        
        @if(app()->getLocale() != "en")
		<link href="{{ asset('assets/dashboard/css/style-rtl.css') }}" rel="stylesheet" type="text/css">
		@else
		<link href="{{ asset('assets/dashboard/css/style.css') }}" rel="stylesheet" type="text/css">
        @endif
        <link href="{{ asset('assets/dashboard/css/main.css') }}" rel="stylesheet" type="text/css">
        {{-- --}}
        <!-- End CSS -->
    </head>
    <body class="vertical-layout">
        <!-- Start Infobar Setting Sidebar -->
        <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
            <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
                <h4>Notifications setting</h4><a href="javascript:void(0)" id="infobar-settings-close" class="infobar-settings-close"><img src="assets/dashboard/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close"></a>
            </div>
            <div class="infobar-settings-sidebar-body">
                <div class="custom-mode-setting">
                    <div class="row align-items-center pb-3">
                        <div class="col-8"><h6 class="mb-0">New Customers notifictaion</h6></div>
                        @if(app()->getLocale() != "en")
                        <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                        @else
                        <div class="col-4 text-left"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                        @endif
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-8"><h6 class="mb-0">Out of stock reminder</h6></div>
                        @if(app()->getLocale() != "en")
                        <div class="col-4 text-left"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                        @else
                        <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                        @endif
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-8"><h6 class="mb-0">New order notification</h6></div>
                        @if(app()->getLocale() != "en")
                        <div class="col-4 text-left"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                        @else
                        <div class="col-4 text-right"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="infobar-settings-sidebar-overlay"></div>
        <!-- End Infobar Setting Sidebar -->
        <!-- Start Containerbar -->
        <div id="containerbar">     
            <!-- Start Leftbar -->
            @include('dashboard.layouts.sideMenu')
            <!-- End Leftbar -->
            <!-- Start Rightbar -->
            @include('dashboard.layouts.notificationsMenu')          
            @yield('content')
            <!-- End Rightbar --> 
        </div>
        
        @if($message = \Session::get('success')) 

        <div aria-live="polite" aria-atomic="true">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 30px; right: 30px;" id="simple-toasts">
                <div class="toast-header">
                    <i class="feather icon-alert-triangle text-success mr-2"></i>  
                    <span class="toast-title mr-auto">Success</span>
                    
                </div>
                <div class="toast-body">
                    {{ $message  }}
                </div>
            </div>
        </div>
        @endif
        @if($message = \Session::get('error'))
        <div aria-live="polite" aria-atomic="true">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 30px; right: 30px;" id="simple-toasts_error">
                <div class="toast-header">
                    <i class="feather icon-alert-triangle text-danger mr-2"></i>  
                    <span class="toast-title mr-auto">Error</span>
                    
                </div>
                <div class="toast-body">  
                    {{ $message  }}
                </div>
            </div>
        </div>
        @endif
        <!-- End Containerbar -->
        <!-- Start JS -->        
        <script src="{{ asset('assets/dashboard/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/detect.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/dashboard/js/vertical-menu.js') }}"></script> 
        <script src="{{ asset('assets/dashboard/plugins/switchery/switchery.min.js') }}"></script> 
        <!-- Core JS -->
        <script src="{{ asset('assets/dashboard/js/core.js') }}"></script>

        <script type="text/javascript">
            function remove_new_order_notif(){
                $.ajax({
                    url:"{{route('remove.order_notif')}}",
                    type:"post",
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(data){
                        console.log(data);
                    },
                    error:function(e){
                        console.log(e)
                    }
                })
            }
            $("#notoficationlink").click(function(){
                remove_new_order_notif();
            })
           
            
        </script>
        <!-- End JS -->
        @yield('script')
        
        <!-- Core JS -->
        <!-- <script src="{{ asset('assets/dashboard/js/core.js') }}"></script> -->
        <!-- End JS -->
        <script>
            @if($message = \Session::get('error'))
            $("#simple-toasts_error").toast({
                delay: 3000
            });
            $("#simple-toasts_error").toast("show");
            @endif
            @if($message = \Session::get('success')) 
            $("#simple-toasts").toast({
                delay: 3000  
            });
            $("#simple-toasts").toast("show");    
            @endif  


            


        </script>    

    </body>
</html>    
