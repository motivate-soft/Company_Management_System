@section('title') 
{{ __('side.packing') }}
@endsection 
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('plugins/applications/meatApplication/meatPackaging.packList') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/plugins')}}">{{ __('side.plugins') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/plugins/applications/meatApplication')}}">{{ __('plugins/applications/meatApplication/pluginInformation.pluginName') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('side.packing') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button  class="btn btn-primary-rgba" data-toggle="modal" data-target="#exampleStandardModal"><i class="feather icon-plus mr-2"></i>{{ __('plugins/applications/meatApplication/meatPackaging.packAdd') }}</button>
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
                        <table class="table table-borderless" id="default-datatable">  
                            <thead>
                                <tr>
                                    <th>{{ __('plugins/applications/meatApplication/meatPackaging.id') }}</th>
                                    
                                    <th>{{ __('plugins/applications/meatApplication/meatPackaging.packAR') }}</th>
                                    
                                    <th>{{ __('plugins/applications/meatApplication/meatPackaging.packEN') }}</th>
                                    <th>{{ __('general.price') }}</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($cuttings) > 0)
                                @foreach($cuttings as $key => $cut)                                
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $cut->name_ar }}</td>
                                    <td>{{ $cut->name_en }}</td>
                                    <td>{{ $cut->price }}</td>
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba" data-toggle="modal" data-target="#edit_cutting_method{{$cut->id}}"><i class="feather icon-edit-2"></i></a>  
                                            <a href="{{ url('/delete_packing/'.$cut->id) }}" class="btn btn-danger-rgba" onclick="return confirm('Are you sure？')"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit_cutting_method{{$cut->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleStandardModalLabel">{{ __('plugins/applications/meatApplication/meatPackaging.packEdit') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>  
                                            <form action="{{ route('packings.update') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="cutting_method_id" value="{{ $cut->id }}">
                                                <label for="name_ar" class="col-form-label">{{ __('plugins/applications/meatApplication/meatPackaging.packAR') }}</label>
                                                <input type="text" name="name_ar" id="name_en" class="form-control" required="" value="{{ $cut->name_ar }}">
                                                <label for="name_en" class="col-form-label">{{ __('plugins/applications/meatApplication/meatPackaging.packEN') }}</label>
                                                <input type="text" name="name_en" id="name_en" class="form-control" required="" value="{{ $cut->name_en }}">
                                                <label for="price" class="col-form-label">{{ __('general.price') }}</label>
                                                <input type="number" step="any" id="price" name="price" class="form-control" value="{{ $cut->price }}" required="">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('plugins/applications/meatApplication/meatPackaging.close') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ __('plugins/applications/meatApplication/meatPackaging.edit') }}</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>

                                @endforeach  
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>

<div class="modal fade" id="exampleStandardModal" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleStandardModalLabel">{{ __('plugins/applications/meatApplication/meatPackaging.packAdd') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('packings.store') }}" method="post">
        @csrf
        <div class="modal-body">
            <label for="name_ar" class="col-form-label">{{ __('plugins/applications/meatApplication/meatPackaging.packAR') }}</label>
            <input type="text" name="name_ar" id="name_ar" class="form-control" required="">
            <label for="name_en" class="col-form-label">{{ __('plugins/applications/meatApplication/meatPackaging.packEN') }}</label>
            <input type="text" id="name_en" name="name_en" class="form-control" required="">
            <label for="price" class="col-form-label">{{ __('general.price') }}</label>
            <input type="number" step="any" id="price" name="price" class="form-control" required="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('plugins/applications/meatApplication/meatPackaging.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('plugins/applications/meatApplication/meatPackaging.add') }}</button>
        </div>
        </form>
    </div>
</div>
</div>


<!-- End Contentbar -->
@endsection 
@section('script')


<script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script>

<script>
    $(document).ready(function() {
    
        $('#default-datatable').DataTable();
    
    });
</script>
@endsection 
