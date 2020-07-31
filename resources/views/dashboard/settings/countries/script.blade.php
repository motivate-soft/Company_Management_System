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


    $('body').on('click','.get_cities',function(){
      var id = $(this).attr('data-id');
      var html = $(this).attr('data-states');
      var url = '{{url('dashboard/settings/get_cities')}}/'+id;

      $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
            $('.add_city_button').attr('data-id',id);
            $('#states_dark').modal('hide');
            $('.edit_states').attr('data-id',id);
            $('.delete_state').attr('data-id',id);
             $('.get_cities_title').html('');
             $('.get_cities_title').html(html);
             $('.cities_model').html('');
             $('.cities_model').html(response);
             $('#cities_dark').modal('show');
          }
      });


    });

    function get_all_cities(){
      var id = $('.add_city_button').attr('data-id');
      var url = '{{url('dashboard/settings/all_get_cities')}}/'+id;

      $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
             $('.cities_model').html('');
             $('.cities_model').html(response);
             // $('#states_dark').modal('show');
          }
      });

    }

    function get_all_states(){
      var id = $('.add_state_button').attr('data-id');
      var url = '{{url('dashboard/settings/all_get_state')}}/'+id;

      $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
             $('.states_model').html('');
             $('.states_model').html(response);
             // $('#states_dark').modal('show');
          }
      });

    }

    function get_all_neibri(){
      var id = $('.add_neiber_button').attr('data-id');
      var url = '{{url('dashboard/settings/all_get_nebri')}}/'+id;

      $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
             $('.neibher_model').html('');
             $('.neibher_model').html(response);
             // $('#states_dark').modal('show');
          }
      });

    }

    

    $('.get_states').on('click',function(){
      var id = $(this).attr('data-id');
      var html = $(this).attr('data-country');
      var url = '{{url('dashboard/settings/get_state')}}/'+id;
     

      $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
            $('.add_state_button').attr('data-id',id);
             $('.get_states_title').html('');
             $('.get_states_title').html(html);
             $('.states_model').html('');
             $('.states_model').html(response);
             $('#states_dark').modal('show');
          }
      });
    });


    $('body').on('click','.get_neiber',function(){
      var id = $(this).attr('data-id');
      var html = $(this).attr('data-neiber');
      var url = '{{url('dashboard/settings/get_neiber')}}/'+id;
     
      $.ajax({  
           url: url,  
           method: 'get', 
           success: function(response) {
            $('.add_neiber_button').attr('data-id',id);
            $('#cities_dark').modal('hide');  
             $('.get_neighborhood_title').html('');
             $('.get_neighborhood_title').html(html);
             $('.neibher_model').html('');
             $('.neibher_model').html(response);
             $('#neighborhood').modal('show');
          }
      });
    });


    $('.add_state_button').on('click',function(){
      var id = $(this).attr('data-id');
      $('.add_state_city_id').val(id);
      $('#add_states').modal('show');
    });

    $('.add_city_button').on('click',function(){
      var id = $(this).attr('data-id');
      $('.add_city_city_id').val(id);
      $('#add_city').modal('show');

    });

    $('.add_neiber_button').on('click',function(){
      var id = $(this).attr('data-id');
      $('.add_neiber_city_id').val(id);      
      $('#add_neiberhood').modal('show');

    });


    $('body').on('click','.edit_states',function(){
      var id = $(this).attr('data-id');
      var html = $(this).attr('data-name');
      $('.state_name_form').val(html);
      var ar = $(this).attr('data-ar');
      $('.state_name_form_ar').val(ar);
      var dl = $(this).attr('data-deli');  
      $('.delievery_fee').val(dl);  
      $('.state_id_hidden').val(id);  
      $('#cities_dark').modal('hide');
      $('#edit_dark').modal('show');

    });


    $('body').on('click','.edit_cities',function(){
      var id = $(this).attr('edit-id');
      var html = $(this).attr('data-name');
      $('.city_name_form').val(html);
      var ar = $(this).attr('ar-name');
      $('.city_name_form_ar').val(ar);
      var al = $(this).attr('data-deli');
      $('.edit_deliery_city').val(al);
      $('.city_id_hidden').val(id);  
      $('#edit_cityesese').modal('show');

    });


    $('body').on('click','.edit_neibri',function(){
      var id = $(this).attr('edit-id');
      var html = $(this).attr('data-name');
      $('.neiberi_name_form').val(html);
      var ar = $(this).attr('ar-name');
      $('.neiberi_name_form_ar').val(ar);
      var al = $(this).attr('data-deli');
      $('.neiberi_name_form_delievery_fee').val(al);
      $('.neiber_id_hidden').val(id);  
      $('#edit_neiberhood').modal('show');

    });



    $('#add_neibe_on_model').submit(function(e){
      e.preventDefault();
      var form = $(this).serialize();
      var url = $(this).attr('action');
      $.ajax({
           url: url,
           method: 'post', 
           data: form,
           success: function(response) {
           	get_all_neibri();
           	$("#add_neibe_on_model")[0].reset();
            $('#add_neiberhood').modal('hide');
            // $('#neighborhood').modal('hide');
            $('#toaster_me').css('display','block');
                $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          }
      });

    });

    $('#edit_neibri_on_model').submit(function(e){
      e.preventDefault();
      var form = $(this).serialize();
      var url = $(this).attr('action');
      $.ajax({
           url: url,
           method: 'post', 
           data: form,
           success: function(response) {
           	get_all_neibri();
           	$("#edit_neibri_on_model")[0].reset();
            $('#edit_neiberhood').modal('hide');
            // $('#neighborhood').modal('hide');
            $('#toaster_me').css('display','block');
                $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          }
      });

    });

    $('#edit_city_on_model').submit(function(e){
      e.preventDefault();
      var form = $(this).serialize();
      var url = $(this).attr('action');
      $.ajax({
           url: url,
           method: 'post', 
           data: form,
           success: function(response) {
           	get_all_cities();
           	$("#edit_city_on_model")[0].reset();
            $('#edit_cityesese').modal('hide');
            // $('#cities_dark').modal('hide');
            $('#toaster_me').css('display','block');
                $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          }
      });

    });


    $('#edit_states_on_model').submit(function(e){
      e.preventDefault();
      var form = $(this).serialize();
      var url = $(this).attr('action');
      $.ajax({
           url: url,
           method: 'post',   
           data: form,
           success: function(response) {
            get_all_states();
            $("#edit_states_on_model")[0].reset();
            $('#edit_dark').modal('hide');
            // $('#states_dark').modal('hide');
            $('#toaster_me').css('display','block');
            $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          
          }
      });

    });  

    $('#add_city_on_model').submit(function(e){
      e.preventDefault();
      var form = $(this).serialize();
      var url = $(this).attr('action');
      $.ajax({
           url: url,
           method: 'post', 
           data: form,
           success: function(response) {
           	get_all_cities();
           	$("#add_city_on_model")[0].reset();
            $('#add_city').modal('hide');
            // $('#cities_dark').modal('hide');
            $('#toaster_me').css('display','block');
            $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          }
      });

    });



    $('body').on('click','.del_citie',function(){
      var id = $(this).attr('del-id');
      var r = confirm("Are you sure you want to delete!");
      if (r == true) {
      var url = '{{url('dashboard/settings/delete_city')}}/'+id;
        $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
           	get_all_cities();
            $('#edit_dark').modal('hide');
            // $('#cities_dark').modal('hide');
            $('#toaster_me').css('display','block');
            $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          }
      });
      
      }

    });

    $('body').on('click','.delete_state',function(){
      var id = $(this).attr('data-id');
      var r = confirm("Are you sure you want to delete!");
      if (r == true) {
      var url = '{{url('dashboard/settings/delete_state')}}/'+id;
        $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
            // $('#states_dark').modal('hide');
            get_all_states();
            $('#toaster_me').css('display','block');
            $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          }
      });
      
      }

    });


    $('body').on('click','.del_neibri',function(){
      var id = $(this).attr('del-idb');
      var r = confirm("Are you sure you want to delete!");
      if (r == true) {
      var url = '{{url('dashboard/settings/delete_neiber')}}/'+id;
        $.ajax({
           url: url,
           method: 'get', 
           success: function(response) {
            // $('#edit_neiberhood').modal('hide');
            get_all_neibri();
            // $('#neighborhood').modal('hide');
            $('#toaster_me').css('display','block');
            $('#message_created_body').html(response.msg_text);

            $("#toaster_ho").toast({
                delay: 3000  
            });

            $("#toaster_ho").toast("show"); 
          }
      });
      
      }

    });
    
        $('#default-datatable').DataTable();
        
        

    });
</script>
@endsection
