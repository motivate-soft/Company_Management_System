<style>
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #eee !important;
    }
    .fileManagerContent td img {
        max-width: 50px !important;
    }
    .fileManager {
        @if(app()->getLocale() == "en")
        margin-left: 0px;
        @else
        margin-right: 0px;
        @endif
    }
    .FileManagerSingleItem img {
        max-width: 128px;
        @if(app()->getLocale() == "en")
        float: left;
        @else
        float: right;
        @endif
        margin: 10px 16px 8px 16px;
        border-radius: 20px;
    }
    .FileManagerSingleItem img:hover {
        /*opacity: 0.2;*/
        transition: .5s ease;
        opacity: 0.6;
        /*background-color: #0080ff;*/
    }
    .FileManagerSingleItem p {
        bottom: 0px;
        text-align: center;
    }
    .fileManager-UploadButton input[type=file] {
        font-size: 100px;
        position: absolute;
        @if(app()->getLocale() == "en")
        right: 12px;
        left: auto;
        @else
        left: 12px;
        right: auto;
        @endif
        top: auto;
        opacity: 0;
        width: 40px;
        height: 40px;
    }
    .modal-body button {
        width: 100%;
    }
    .modal-header span {
        color: #fff;
    }
    thead th { 
        position: sticky; top: 0; 
    }

</style>




<div class="modal fade text-left" id="fileManager_Popup" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="modal-title">File Manager - Made With Love</span>
                <button type="button" class="close" id="closeMainFolderWindow" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div style="overflow-y: scroll;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 95%; @if(app()->getLocale() == "en") text-align: right; @else text-align: left; @endif">
                                <button type="button" class="btn btn-round btn-success fileManager_AddNewFolder_Window">
                                    <i class="feather icon-plus"></i> 
                                </button>
                            </th>
                            <th style="width: 5%; @if(app()->getLocale() == "en") text-align: right; @else text-align: left; @endif">
                                @csrf
                                <form method="post" id="image_form" enctype="multipart/form-data">
                                    <div class="fileManager-UploadButton">
                                        <button type="button" class="btn btn-round btn-warning" id="image_btn_input" data-route="{{ route('image.store') }}">
                                            <i class="feather icon-upload"></i>
                                        </button>
                                        <input type="file" name="myfile" id="image_input" accept="image/x-png,image/jpg,image/jpeg"/>
                                    </div>
                                </form>
                            </th>
                        </tr>
                    </thead>
                </table>
                
                <table class="table table-striped fileManagerContent">
                    <thead>
                        <tr>
                            <th style="width: 10%; text-align: center;">
                                Image
                            </th>
                            <th style="width: 60%; @if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif">
                                Name
                            </th>
                            
                            <th style="width: 10%; text-align: center;">
                                View
                            </th>
                            <!--<th style="width: 10%; text-align: center;">-->
                            <!--    Resize Image-->
                            <!--</th>-->
                            <th style="width: 10%; text-align: center;">
                                Rename
                            </th>
                            <th style="width: 10%; text-align: center;">
                                Delete
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody class="states_model" id="allFolders">
                        @foreach (\App\Model\Folder::where('parent', 0)->get() as $folder)
                            <tr>
                                <td style="width: 10%; text-align: center;">
                                    <!--Folder, Or Image-->
                                    <img id="fileManagerItem" src="{{ asset('assets/dashboard/images/dashboard/fileManager/folder.png') }}" alt="Folder Name, Or Image Nmae">
                                </td>

                                <td style="@if(app()->getLocale() == "en") text-align: left; @else text-align: right; @endif" class="folder_name-{{$folder->name}}">
                                    <!--Folder Name, Or Image Nmae-->
                                    {{$folder->name}}
                                </td>
                                <td style="width: 10%; text-align: center;">
                                    <button type="button" class="btn btn-round btn-success-rgba fileManager_ShowFolder_Window" data-route = "{{ route('folder.getAllHtml') }}" data-folder-id="{{ $folder->id }}"><i class="feather icon-eye"></i></button>
                                </td>
                                <!--<td style="width: 10%; text-align: center;">-->
                                <!--    <button type="button" class="btn btn-round btn-warning-rgba"><i class="mdi mdi-move-resize"></i>.</button>-->
                                <!--</td>-->
                                <td style="width: 10%; text-align: center;">
                                    <button type="button" data-route = "{{ route('folder.update', $folder->id) }}" data-folder-name="{{ $folder->name }}" class="btn btn-round btn-secondary-rgba fileManager_RenameFile_Window"><i class="mdi mdi-rename-box"></i></button>
                                </td>
                                <td style="width: 10%; text-align: center;">
                                    <button type="button" data-route = "{{ route('folder.delete', $folder->id) }}" data-folder-name="{{ $folder->name }}" class="btn btn-round btn-danger-rgba fileManager_DeleteFolder_Window"><i class="feather icon-trash-2"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="show_folder_window"></div>


<!--Create New Folder Window-->
@include('dashboard.fileManager.modules.fileManagerCreateFolder')

<!--Rename Folder Window-->
@include('dashboard.fileManager.modules.fileManagerRenameFolder')

<!--Delete Confirmation Module-->
@include('dashboard.fileManager.modules.FileDeleteConfirmationFolder')










