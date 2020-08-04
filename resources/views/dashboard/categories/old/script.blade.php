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
    
    <script type="text/javascript">
        $(document).on('click', '.cut-edit', function(){
            console.log("asdf")
            cut=$(this).data('cut');
            console.log("cut", cut);
            name=cut.name;
            name_ar=cut.name_ar;
            parent=cut.parent;
            id=cut.id;
            $("#edit_cut_id").val(id)
            $("#edit_name").val(name)
            $("#name_ar").val(name_ar)
            $("#edit_parent").val(parent)
        })
    </script>
@endsection 