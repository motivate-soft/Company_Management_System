<!--Add New Image Popup Starts-->
<style>
    #fileManager_AddNewImage {
        margin-top: 200px;
    }
</style>

<div class="modal fade text-left" id="fileManager_AddNewImage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Create New Image</span>
                <button type="button" class="close" id="closeImageCreateWindow" class= aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <fieldset class="form-group">
                    <label for="image_file_input">Image:</label>
                    <input type="file" class="form-control-file" name="image" id="image_file_input" accept="image/x-png,image/jpg,image/jpeg"/>
                    <p id="fileManager_error"></p>
                </fieldset>
                {{--<button type="submit" onclick="addFolder()" class="btn btn-primary">Add</button>--}}
                <a style="color:white" onclick="addFolder()" class="btn btn-primary">Add</a>
            </div>
        </div>
    </div>
</div>