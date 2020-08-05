<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ url('dashboard/edit_category') }}" method="post">

                @csrf

                <div class="modal-body">
                    <input type ="hidden" name="editid" id ="edit_id" @if(isset($cut->id)) value="{{ $cut->id }}"@endif>

                    <label for="cutting_method" class="col-form-label">{{ __('category.categoryName') }}</label>
                    <input type="text" name="categoryName" id = "edit_name" class="form-control" @if(isset($cut->category_name)) value="{{ $cut->category_name }}"@endif placeholder="{{__('category.AddnewName')}}" required="">

                    <label for="cutting_method" class="col-form-label">{{ __('category.categoryCode') }}</label>
                    <input type="text" name="categoryCode" id = "edit_code" class="form-control" @if(isset($cut->category_code)) value="{{ $cut->category_code }}"@endif placeholder="{{__('category.AddnewCode')}}" required="">

                    <label for="cutting_method" class="col-form-label">{{ __('category.nameOfAdd') }}</label>
                    <input type="text" name="nameOfAdd" id="edit_nameadd" class="form-control" @if(isset($cut->name_of_who_added)) value="{{ $cut->name_of_who_added }}"@endif placeholder="{{__('category.AddnewNameof')}}" required="">

                    <label for="cutting_method" class="col-form-label">{{ __('category.dateOfAdd') }}</label>
                    <div class="input-group">
                        <input type="text" id="default-date" class="form-control"
                               placeholder="yyyy/mm/dd" aria-describedby="basic-addon2"
                               name="dateOfAdd" autocomplete="off" @if(isset($cut->date_of_addition)) value="{{ $cut->date_of_addition }}"@endif />
                        <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                        </div>
                    </div>
                </div>

                {{--<div class="modal-body">--}}
                {{--<label for="cutting_method" class="col-form-label">English Name:</label>--}}
                {{--<input type="text" name="name" id="edit_name" class="form-control" placeholder="Add Cutting Method Name" required=""> --}}
                {{----}}
                {{--<label for="cutting_method" class="col-form-label">Arabic Name:</label>--}}
                {{--<input type="text" name="name_ar" id="edit_name_ar" class="form-control" placeholder="Add Cutting Method Name" required=""> --}}
                {{----}}
                {{--<label for="cutting_method" class="col-form-label">Parent:</label>--}}
                {{--<select name="parent" class="form-control" id="edit_parent"  required="">--}}
                {{--<option value="0">Main</option>--}}
                {{--@foreach($cuttings as $cate)--}}
                {{--<option value="{{$cate->id}}">{{$cate->name}}</option>--}}
                {{--@endforeach--}}
                {{--</select> --}}
                {{--</div>--}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>