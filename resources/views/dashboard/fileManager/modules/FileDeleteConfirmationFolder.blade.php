<!--Add Delete Confirmation Popup Starts-->
<div class="modal fade text-left" id="fileDeleteConfirmationFolder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Delete</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="fileManager_Rename">Are you sure you want to delete this folder?</label><br><br><br>
                <button type="button" data-route = "" data-folder-name="" class="btn btn-danger" id="deleteFolderInput">Yes</button><br><br>
                <button type="button" class="btn btn-success" id="notDeleteFolderInput">No</button>
            </div>
        </div>
    </div>
</div>