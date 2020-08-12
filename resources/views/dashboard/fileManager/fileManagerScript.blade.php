<script>

    ///////////////Folders////////////////
    // For File Manager Popup Starts
    $(document).ready(function () {
        $('#fileManager_Popup').on('change', function () {
            if ($(this)) {
                swal({
                    title: 'Are you sure that you want to upload the selected image ?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '{{__('general.yes')}}!',
                    cancelButtonText: '{{__('general.no_cancel')}}!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10',
                    buttonsStyling: false
                }).then(function () {
                    // $('.fileManager_Popup_btn').hide();
                    $('.card-code').hide();

                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                        $('#fileManager_Popup').prop('checked', true);
                    }
                });
            }
        });


        // Add new folder Popup Window
        $(document).on("click", ".fileManager_AddNewFolder_Window" , function() {
            var id = $(this).data('id');
            console.log(id);
            $("#parent").val(id);
            $('#fileManager_folder').data('folder-id', id);
            $('#fileManager_AddNewFolder').modal('show');
        });

        // Delete folder Popup Window
        $(document).on("click", ".fileManager_DeleteFolder_Window" , function() {
            var folder_name = $(this).data('folder-name');
            $('#deleteFolderInput').data('name', folder_name);
            var route = $(this).data('route');
            $('#deleteFolderInput').data('route', route);
            $('#fileDeleteConfirmationFolder').modal('show');
        });

        // Rename file Popup Window
        $(document).on("click", ".fileManager_RenameFile_Window" , function() {
            var folder_name = $(this).data('folder-name');
            $('#fileManager_Rename').val(folder_name);
            var route = $(this).data('route');
            $('#fileManager_Rename').data('route', route);
            $('#fileManager_Rename').data('name', folder_name);
            $('#fileManager_Rename').data('folder-id', $(this).data('folder-id'));
            $('#fileManager_RenameFile').modal('show');
        });


        $(document).on("click", ".fileManager_ShowFolder_Window" , function() {
            var folder_id = $(this).data('folder-id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: $(this).data('route'),
                type: 'POST',
                data: {
                    id: folder_id
                },
                dataType: 'text',
                success: function (response) {
                    processing = false;
                    if(response.status == 'error') {
                        alert(response.message);
                    } else {
                        var html = response;
                        $('#fileManager_Popup').modal('hide');
                        $('#show_folder_window').html(html);
                        $('.modal-backdrop').first().remove();
                        $('#fileManager_ShowFolder').modal('show');
                    }
                },
                error: function (jqXHR) {
                    processing = false;
                    alert('Something went wrong');
                }
            })
        });
    });

    $(document).on("click", ".back" , function() {
        console.log($(this).data('folder_id'));
    });


    // Get the modal
    var ImageViewModal = document.getElementById("fileManagerItemModule");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("fileManagerItem");
    if(img != null) {
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            ImageViewModal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }

    // Create folder
    function addFolder() {
        // Get folder name
        var name = $('#fileManager_folder').val();
        // Check if name isn't null
        if(name != '') {
            sendFolderAjax($('#fileManager_folder'),
                function (response) {
                    // Hide The Folder Creation Window
                    $('#fileManager_AddNewFolder').modal('hide');
                    $('#fileManager_folder').val("");
                    // Replace folders
                    var folder = response.folder;
                    if($('#fileManager_folder').data('folder-id') == null) {
                        $('#allFolders').append('<tr>\
                                <td style="width: 10%; text-align: center;">\
                                    <img id="fileManagerItem" src="{{ asset('assets/dashboard/images/dashboard/fileManager/folder.png') }}" alt="Folder Name, Or Image Nmae">\
                                </td>\
                                <td style="@if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif" class="folder_name-'+folder.name+'">'
                            +folder.name+
                            '</td>\
                            <td style="width: 10%; text-align: center;">\
                                <button type="button" class="btn btn-round btn-success-rgba fileManager_ShowFolder_Window" data-route = "'+response.getAllHtml+'" data-folder-id="'
                            +folder.id+
                            '"><i class="feather icon-eye"></i></button>\
                        </td>\
                        <td style="width: 10%; text-align: center;">\
                            <button type="button" data-route = "'+response.update_route+'" data-folder-name='
                            +folder.name+
                            ' data-folder-id='
                            +folder.folder_id+
                            ' class="btn btn-round btn-secondary-rgba fileManager_RenameFile_Window"><i class="mdi mdi-rename-box"></i></button>\
                        </td>\
                        <td style="width: 10%; text-align: center;">\
                            <button type="button" data-route = "'+response.delete_route+'" data-folder-name='
                            +folder.name+
                            ' class="btn btn-round btn-danger-rgba fileManager_DeleteFolder_Window"><i class="feather icon-trash-2"></i></button>\
                            </td>\
                        </tr>');
                    } else {
                        $('#allShowFolders').append('<tr>\
                                <td style="width: 10%; text-align: center;">\
                                    <img id="fileManagerItem" src="{{ asset('assets/dashboard/images/dashboard/fileManager/folder.png') }}" alt="Folder Name, Or Image Nmae">\
                                </td>\
                                <td style="@if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif" class="folder_name-'+folder.name+'">'
                            +folder.name+
                            '</td>\
                            <td style="width: 10%; text-align: center;">\
                                <button type="button" class="btn btn-round btn-success-rgba fileManager_ShowFolder_Window" data-route = "'+response.getAllHtml+'" data-folder-id="'
                            +folder.id+
                            '"><i class="feather icon-eye"></i></button>\
                        </td>\
                        <td style="width: 10%; text-align: center;">\
                            <button type="button" data-route = "'+response.update_route+'" data-folder-name='
                            +folder.name+
                            '  data-folder-id='
                            +folder.folder_id+
                            ' class="btn btn-round btn-secondary-rgba fileManager_RenameFile_Window"><i class="mdi mdi-rename-box"></i></button>\
                        </td>\
                        <td style="width: 10%; text-align: center;">\
                            <button type="button" data-route = "'+response.delete_route+'" data-folder-name='
                            +folder.name+
                            ' class="btn btn-round btn-danger-rgba fileManager_DeleteFolder_Window"><i class="feather icon-trash-2"></i></button>\
                            </td>\
                        </tr>');
                    }
                }, name);
        } else {
            // Show error
            $('#fileManager_error').text('Write folder name');
            $('#fileManager_error').css("color", "red");
        }
    }

    // Rename folder
    function renameFile() {
        // Get folder name
        var name = $('#fileManager_Rename').val();
        // Check if name isn't null
        if(name != '') {
            sendFolderAjax($('#fileManager_Rename'),
                function (response) {
                    var folder = response.folder;
                    // Hide The Folder Update Window
                    $('#fileManager_RenameFile').modal('hide');
                    $('#fileManager_Rename').val("");
                    // Replace folders
                    var folder_name = $('.folder_name-'+$('#fileManager_Rename').data('name'));
                    folder_name.parent().html('<td style="width: 10%; text-align: center;">\
                                    <img id="fileManagerItem" src="{{ asset('assets/dashboard/images/dashboard/fileManager/folder.png') }}" alt="Folder Name, Or Image Nmae">\
                                </td>\
                                <td style="@if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif" class="folder_name-'+folder.name+'">'
                        +folder.name+
                        '</td>\
                        <td style="width: 10%; text-align: center;">\
                            <button type="button" class="btn btn-round btn-success-rgba fileManager_ShowFolder_Window" data-route = "'+response.getAllHtml+'" data-folder-id="'
                        +folder.id+
                        '"><i class="feather icon-eye"></i></button>\
                    </td>\
                    <td style="width: 10%; text-align: center;">\
                        <button type="button" data-route = "'+response.update_route+'" data-folder-name='
                        +folder.name+
                        '  data-folder-id='
                        +folder.folder_id+
                        ' class="btn btn-round btn-secondary-rgba fileManager_RenameFile_Window"><i class="mdi mdi-rename-box"></i></button>\
                    </td>\
                    <td style="width: 10%; text-align: center;">\
                        <button type="button" data-route = "'+response.delete_route+'" data-folder-name='
                        +folder.name+
                        ' class="btn btn-round btn-danger-rgba fileManager_DeleteFolder_Window"><i class="feather icon-trash-2"></i></button>\
                        </td>');
                }, name);
        } else {
            // Show error
            $('#fileManager_error').text('Write folder name');
            $('#fileManager_error').css("color", "red");
        }
    }

    // Delete folder
    $(document).on("click", "#deleteFolderInput" , function() {
        var btn = $(this);
        sendFolderAjax($(this), function(response) {
            btn.parent().parent().parent().parent().modal('hide');
            var folder_name = $('.folder_name-'+$('#deleteFolderInput').data('name'));
            folder_name.parent().remove();
        });
    });

    // Not Delete folder
    $(document).on("click", "#notDeleteFolderInput" , function() {
        $(this).parent().parent().parent().parent().modal('hide');
    });







    ///////////////Images//////////////////////
    $(document).on("click", "#closeFolderWindow" , function() {
        $(this).parent().parent().parent().parent().modal('hide');
        $('modal-backdrop').first().remove();
    });
    $(document).on("click", "#closeImageCreateWindow" , function() { $(this).parent().parent().parent().parent().modal('hide'); });

    $(document).on("click", '.createImageWindow', function() {
        $('#fileManager_AddNewImage').modal('show');
    });

    $(document).on("click", ".swal2-confirm" , function() {
        var route = $('#image_btn_input').data('route');
        var file_data = $('#image_input').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file',file_data);
        // alert(file_data);
        sendImageAjax(form_data, route, function(response) {
            alert("You selected image!");
        });
    });







    ///////////////Functions/////////////////////////
    // Function that sends an AJAX request
    var processing = false;
    function sendFolderAjax(input, success_callback, name=null) {
        if(!processing){
            processing = true;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: input.data('route'),
                type: 'POST',
                data: {
                    name: name,
                    folder_id: input.data('folder-id')
                },
                success: function (response) {
                    processing = false;
                    if(response.status == 'error') {
                        alert(response.message);
                    } else {
                        success_callback(response);
                    }
                },
                error: function (jqXHR) {
                    processing = false;
                    alert('Something went wrong');
                }
            })
        }
    }

    function sendImageAjax(image, route, success_callback) {
        if(!processing){
            processing = true;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: route,
                type: 'POST',
                data:image,

                processData: false,
                contentType: false,
                success: function (response) {
                    processing = false;
                    if(response.status == 'error') {
                        alert(response.message);
                    } else {
                        success_callback(response);
                    }
                },
                error: function (jqXHR) {
                    processing = false;
                    alert('Something went wrong');
                }
            })
        }
    }
</script>
