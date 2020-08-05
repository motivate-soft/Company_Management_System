{{--@section('style')--}}


    {{--<link href="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">--}}

{{--@endsection--}}

<div class="modal fade" id="createNewCategory" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleStandardModalLabel">{{__('category.categoryAdd')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{ route('categories.add') }}" method="post">
                
                @csrf

                <div class="modal-body">
                    <label for="cutting_method" class="col-form-label">{{ __('category.categoryName') }}</label>
                    <input type="text" name="categoryName" class="form-control" placeholder="{{__('category.AddnewName')}}" required="">
        
                    <label for="cutting_method" class="col-form-label">{{ __('category.categoryCode') }}</label>
                    <input type="text" name="categoryCode" class="form-control" placeholder="{{__('category.AddnewCode')}}" required="">

                    <label for="cutting_method" class="col-form-label">{{ __('category.nameOfAdd') }}</label>
                    <input type="text" name="nameOfAdd" class="form-control" placeholder="{{__('category.AddnewNameof')}}" required="">

                    <label for="cutting_method" class="col-form-label">{{ __('category.dateOfAdd') }}</label>
                    <div class="input-group">
                        <input type="text" id="default-date" class="form-control"
                               placeholder="yyyy/mm/dd" aria-describedby="basic-addon2"
                               name="dateOfAdd" autocomplete="off"/>
                        <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                        </div>
                    </div>

                    {{--<input type="text" name="dateOfAdd" class="form-control" placeholder="{{__('category.AddnewDateof')}}" required="">--}}

                    {{--<label for="cutting_method" class="col-form-label">Parent Category:</label>--}}
                    {{--<select name="parent" class="form-control"  required="">--}}
                        {{--<option value="0">Main</option>--}}
                        {{--@foreach($cuttings as $cate)--}}
                            {{--<option value="{{$cate->id}}">{{$cate->name}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            
            </form>
        </div>
    </div>
</div>

{{--@section('script')--}}


{{--<script src="{{ asset('assets/dashboard//plugins/datepicker/datepicker.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/dashboard//plugins/datepicker/i18n/datepicker.en.js') }}"></script>--}}


{{--<script src="{{ asset('assets/dashboard//js/custom/custom-toasts.js') }}"></script>--}}

{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('#default-date').click(function () {--}}
            {{--$('#default-date').datepicker({--}}
                {{--language: 'en',--}}
                {{--dateFormat: 'yyyy/mm/dd',--}}
            {{--});--}}
        {{--});--}}

        {{--$('#default-date').datepicker({--}}
            {{--language: 'en',--}}
            {{--dateFormat: 'yyyy/mm/dd',--}}
        {{--});--}}
        {{--$('#default-date12').datepicker({--}}
            {{--language: 'en',--}}
            {{--dateFormat: 'yyyy/mm/dd',--}}
        {{--});--}}

        {{--$('#default-datatable').DataTable();--}}

    {{--});--}}
{{--</script>--}}
{{--@endsection--}}
