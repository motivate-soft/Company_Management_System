@section('title')
{{__('brand.title')}}
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
            <h4 class="page-title">{{__('brand.title')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.products') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('side.brands')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('brands.create') }}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>{{__('brand.brandAdd')}}</a>
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
                                    <th>{{ __('brand.id') }}</th>
                                    <th>{{ __('brand.brandName') }}</th>
                                    <th>{{ __('brand.brandCode') }}</th>

                                    <th>{{ __('brand.nameOfAdd') }}</th>
                                    <th>{{ __('brand.dateOfAdd') }}</th>
                                    <th>{{ __('brand.brandDetail') }}</th>
                                    <th>{{ __('brand.brandEdit') }}</th>
                                    <th>{{ __('brand.brandDelete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($cuttings) > 0)
                                    @foreach($cuttings as $key => $cut)
                                        <tr>
                                            <td scope="row">{{ $key+1 }}</td>
                                            <td>{{ $cut->brand_name }}</td>
                                            <td>{{ $cut->brand_code }}</td>

                                            <td>{{ $cut->name_of_who_added }}</td>
                                            <td>{{ $cut->date_of_addition }}</td>
                                            <td>
                                                <div class="button-list">
                                                    <a href="{{route('brands.detail', $cut->id)}}" class="btn btn-success-rgba"><i class="feather icon-eye"></i></a>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="button-list">
                                                    <a href="{{route('brands.editview', $cut->id)}}" class="btn btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="button-list">
                                                    <a href="{{ url('dashboard/delete_brand/'.$cut->id) }}" class="btn btn-danger-rgba" onclick="return confirm('Are you sure？')"><i class="feather icon-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
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
