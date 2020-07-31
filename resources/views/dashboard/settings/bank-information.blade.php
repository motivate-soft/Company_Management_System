@section('title') 
Orbiter - Product List
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
            <h4 class="page-title">Bank List</h4>  
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bank List</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button  class="btn btn-primary-rgba" data-toggle="modal" data-target="#exampleStandardModal"><i class="feather icon-plus mr-2"></i>Add New</button>
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
                                    <th>ID</th>
                                    
                                    <th>English Name</th>
                                    <th>Arabic Name</th>
                                    <th>Account Number</th>
                                    <th>IBAN</th>
                                                                       
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($banks) > 0)
                                @foreach($banks as $key => $cut)                                
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $cut->en_name }}</td>  
                                    <td>{{ $cut->ar_name }}</td>  
                                    <td>{{ $cut->acc_number }}</td>  
                                    <td>{{ $cut->iban }}</td>  
                                      
                                    <td>
                                        <div class="button-list">
                                            <a href="#" class="btn btn-success-rgba" data-toggle="modal" data-target="#edit_cutting_method{{$cut->id}}"><i class="feather icon-edit-2"></i></a>  
                                            <a href="{{ url('dashboard/delete_bank/'.$cut->id) }}" class="btn btn-danger-rgba" onclick="return confirm('Are you sure？')"><i class="feather icon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit_cutting_method{{$cut->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleStandardModalLabel">Edit Bank Information</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>  
                                            <form action="{{ route('bank-information.edit') }}" method="post">
                                            @csrf
                                            <div class="modal-body">   
                                                <input type="hidden" name="cutting_method_id" value="{{ $cut->id }}">
                                                <label for="cutting_method" class="col-form-label">Bank Name English:</label>
                                                <input type="text" name="bank_name_eng" class="form-control" placeholder="Add Bank Name English" required="" value="{{ $cut->en_name }}">
                                                <label for="cutting_method" class="col-form-label">Bank Name Arabic:</label>
                                                <input type="text" name="bank_name_ar" class="form-control" placeholder="Add Bank Name Arabic" required="" value="{{ $cut->ar_name }}">
                                                <label for="cutting_method" class="col-form-label">Account Number:</label>
                                                <input type="Number" name="acc_number" class="form-control" placeholder="Account Number" required="" value="{{ $cut->acc_number }}">
                                                <label for="cutting_method" class="col-form-label">IBAN:</label>
                                                <input type="text" name="iban" class="form-control" placeholder="IBAN" required="" value="{{ $cut->iban }}">  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit</button>
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
            <h5 class="modal-title" id="exampleStandardModalLabel">Add New Bank</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('bank-information.add') }}" method="post">    
        @csrf
        <div class="modal-body">
            <label for="cutting_method" class="col-form-label">Bank Name English:</label>
            <input type="text" name="bank_name_eng" class="form-control" placeholder="Add Bank Name English" required="">
            <label for="cutting_method" class="col-form-label">Bank Name Arabic:</label>
            <input type="text" name="bank_name_ar" class="form-control" placeholder="Add Bank Name Arabic" required="">
            <label for="cutting_method" class="col-form-label">Account Number:</label>
            <input type="Number" name="acc_number" class="form-control" placeholder="Account Number" required="">
            <label for="cutting_method" class="col-form-label">IBAN:</label>
            <input type="text" name="iban" class="form-control" placeholder="IBAN" required="">
        </div>  
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
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