@section('title') 
{{ __('customers/customers.customersList') }}
@endsection 
@extends('layouts.main')
@section('style')

<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('customers/customers.Send Notifications') }}</h4>  
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.customers') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('customers/customers.Send Notifications') }}</li>
                </ol>
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
                    <form method="post" action="{{route('submitnotification')}}">
                        @csrf
                        <label>{{ __('customers/customers.Notification Title') }}</label>
                        <input type="text" name="notificationtitle" class="form-control" placeholder="Enter Notification Title">
                        <label>{{ __('customers/customers.Enter Notification') }}</label>
                        <textarea name="notification" class="form-control" placeholder="{{ __('customers/customers.Enter Notification') }}"></textarea>
                        <label>{{ __('customers/customers.Server Key') }}</label>
                        <input name="serverkey" class="form-control" placeholder="Enter Server Key">
                        <button type="submit" class="btn btn-primary" style="margin-top:10px;">Send Notification</button>
                    </form>
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

<script>
    
    function status_change(token, id, route) {
        $.ajax({
            url : route,
            type: "POST",
            data: {_token: token, id: id},  
            success: function (response) {
                //$(".table").load(location.href + " .table>*", "");
            }
        });
    }
</script>


<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/js/custom/custom-toasts.js') }}"></script>

<script>
    $(document).ready(function() {
    
        $('#default-datatable').DataTable();
    
    });
</script>
@endsection 