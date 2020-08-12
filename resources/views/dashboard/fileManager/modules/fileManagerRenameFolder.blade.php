<!--Add Rename File Popup Starts-->
<div class="modal fade text-left" id="fileManager_RenameFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Rename</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="form-group">
                    <input type="hidden" name="id" class="fileManager_RenameFile_hidden">
                    <label for="fileManager_Rename">Rename File</label>
                    <input value="" type="text" data-route="" data-name="" data-folder-id="null" id="fileManager_Rename" name="fileManager_Rename" placeholder="Enter New Name" class="form-control">
                </fieldset>
                {{--<button type="submit" onclick="renameFile()" class="btn btn-primary">Add</button>--}}
                <a style="color:white" onclick="renameFile()" class="btn btn-primary">Rename</a>
            </div>
        </div>
    </div>
</div>