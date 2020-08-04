<!--Add Show Folder Popup Starts-->
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



<div class="modal fade text-left" id="fileManager_ShowFolder" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="folder_name">{{$folder->name}}</span>
                <button type="button" class="close back" data-dismiss="modal" data-folder-id="{{ $folder->folder_id }}" style="padding-top: 22px;text-align: right;" aria-label="Back">
                    <span aria-hidden="true">&#8678;</span>
                </button>
            </div>
            <div style="overflow-y: scroll;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 95%; @if(app()->getLocale() == "en") text-align: right; @else text-align: left; @endif">
                                <button type="button" class="btn btn-round btn-success fileManager_AddNewFolder_Window" data-id="{{$folder->id}}">
                                    <i class="feather icon-plus"></i> 
                                </button>
                            </th>
                            <th style="width: 5%; @if(app()->getLocale() == "en") text-align: right; @else text-align: left; @endif">
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
                    <tbody class="states_model" id="allShowFolders">
                        @foreach (\App\Model\Folder::where('folder_id', $folder->id)->get() as $folder)
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
                                    <button type="button" data-route = "{{ route('folder.update', $folder->id) }}" data-folder-id="{{ $folder->folder_id }}" data-folder-name="{{ $folder->name }}" class="btn btn-round btn-secondary-rgba fileManager_RenameFile_Window"><i class="mdi mdi-rename-box"></i></button>
                                </td>
                                <td style="width: 10%; text-align: center;">
                                    <button type="button" data-route = "{{ route('folder.delete', $folder->id) }}" data-folder-id="{{ $folder->id }}" data-folder-name="{{ $folder->name }}" class="btn btn-round btn-danger-rgba fileManager_DeleteFolder_Window"><i class="feather icon-trash-2"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>