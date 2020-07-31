<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
// function restoreDefaultInvoiceTemplate_English()
// {
//     document.getElementById("invoice_english").value='@include('dashboard.orders.invoice.invoice_english')';
//     location.reload(); 
// }

// function restoreDefaultInvoiceTemplate_Arabic()
// {
//     document.getElementById("invoice_arabic").value='@include('dashboard.orders.invoice.invoice_arabic')';
//     location.reload(); 
// }


$(document).ready(function(){
    $('textarea[name=template_content_ar]').summernote({
        height:300
    });
    $('textarea[name=template_content]').summernote({
        height:300
    });
})
</script>