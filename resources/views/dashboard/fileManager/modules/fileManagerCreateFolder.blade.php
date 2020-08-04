<!--Add New Folder Popup Starts-->
<div class="modal fade text-left" id="fileManager_AddNewFolder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Create New Folder</span>
                <button type="button" class="close" class="closeFolder" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="form-group">
                    <input type="hidden" name="id" class="fileManager_AddNewFolder_hidden">
                    <label for="fileManager_folder">Folder Name</label>
                    <input type="text" id="fileManager_folder" data-route = "{{ route('folder.store') }}" data-folder-id="null" name="fileManager_folder" placeholder="Folder Name" class="form-control">
                    <p id="fileManager_error"></p>
                </fieldset>
                <button type="submit" onclick="addFolder()" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>