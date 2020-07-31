<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>  
            
            <form action="{{ url('edit_category') }}" method="post">
                
                @csrf
                
                <div class="modal-body">
                    <label for="cutting_method" class="col-form-label">English Name:</label>
                    <input type="text" name="name" id="edit_name" class="form-control" placeholder="Add Cutting Method Name" required=""> 
    
                    <label for="cutting_method" class="col-form-label">Arabic Name:</label>
                    <input type="text" name="name_ar" id="edit_name_ar" class="form-control" placeholder="Add Cutting Method Name" required=""> 
    
                    <label for="cutting_method" class="col-form-label">Parent:</label>
                    <select name="parent" class="form-control" id="edit_parent"  required="">
                        <option value="0">Main</option>
                        @foreach($cuttings as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select> 
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>