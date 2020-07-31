@section('title') 
{{ __('side.invoiceTemplateList') }}
@endsection 
@extends('dashboard.layouts.layout')

@section('style')
<!-- include summernote css/js-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .btn{
        color: black !important;
    }
</style>
@endsection 

@section('rightbar-content')
<!-- Start Breadcrumbbar -->

<form action="{{route('invoice.template.store')}}" method="post">  
                    {{csrf_field()}}  

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __('side.invoiceTemplateList') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item">{{ __('side.invoice') }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('side.invoiceTemplateList') }}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button type="submit" class="btn btn-primary">Save</button>
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
                            <div class="form-group">
                                <label for="">Short Code</label><br>
                                <span>
                                    Store Name = [s.name]<br>
                                    Store Logo = [s.logo]<br>
                                    Order ID = [o.id]<br>
                                    Client Name = [o.client]<br>
                                    Payment Method = [o.paymethod]<br>
                                    Client Phone Number = [c.phoneno]<br>
                                    Client Address = [c.address]<br>
                                    Product Name = [p.name]<br>
                                    Product Image = [p.img]<br>
                                    Product Quantitiy = [p.qty]<br>
                                    Product Options = [p.options]<br>
                                    Order Date = [o.date]<br>
                                    Sub Total = [o.subtotal]<br>
                                    Shipping Fee = [o.fee]<br>
                                    Tax = [o.tax]<br>
                                    Total Due = [o.total]<br>
                                    Note = [o.note]<br>
                                    Order Status = [o.status]
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Template Content</label><br>
                                <textarea id="invoice_english" class="form-control" cols="30" rows="5" name="template_content" style="width:100%;" placeholder="please type template content">
                                    {!! $template->content !!}
                                </textarea>
                                <!--<div class="widgetbar">-->
                                <!--    <button class="btn btn-primary" onclick="restoreDefaultInvoiceTemplate_English()">Save</button>-->
                                <!--</div>    -->
                            </div>
                        </div>
                    </div>

                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Template Content(ar)</label><br>
                                <textarea id="invoice_arabic" class="form-control" cols="30" rows="5" name="template_content_ar" style="width:100%;" placeholder="please type template content">
                                    {!! $template->content_ar !!}
                                </textarea>
                                <!--<div class="widgetbar">-->
                                <!--    <button class="btn btn-primary" onclick="restoreDefaultInvoiceTemplate_Arabic()">Save</button>-->
                                <!--</div>    -->
                            </div>
                        </div>
                    </div>

            </div>
            <!-- End col -->
    </div>
    <!-- End row -->
</div>

</form>
<!-- End Contentbar -->

@endsection 

@section('script')
    @include('dashboard.orders.invoice.script')
@endsection 



