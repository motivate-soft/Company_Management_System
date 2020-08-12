@section('title')
    {{__('Systems/SystemTwo/staffs.staffs_edit')}}
@endsection
@extends('dashboard.layouts.layout')
@section('style')

<link href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/dashboard/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{__('Systems/SystemTwo/staffs.edit_staff')}}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">{{ __('side.dashboard') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('staffs.index')}}">{{__('Systems/SystemTwo/staffs.staffs')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Systems/SystemTwo/staffs.edit_staff')}}</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{ route('staffs.index') }}" >{{__('Systems/SystemTwo/staffs.back')}}</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <form method="post" action="{{ url('dashboard/edit-staff') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="staff_id" value="{{ $staff->id }}">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.firstname')}}</label>
                                <input type="text" placeholder="firstname" class="form-control" @if(isset($staff->firstname)) value="{{ $staff->firstname }}"@endif name="firstname" placeholder="No firstname" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.secondname')}}</label>
                                <input type="text" placeholder="secondname" class="form-control" @if(isset($staff->secondname)) value="{{ $staff->secondname }}"@endif name="secondname" placeholder="No secondname" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.lastname')}}</label>
                                <input type="text" placeholder="lastname" class="form-control" @if(isset($staff->lastname)) value="{{ $staff->lastname }}"@endif name="lastname" placeholder="No lastname" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.mobile_number')}}</label>
                                <input type="text" placeholder="mobile_number" min="0" class="form-control" @if(isset($staff->mobile_number)) value="{{ $staff->mobile_number }}"@endif name="mobile_number" placeholder="No mobile_number" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.monthly_salary')}}</label>
                                <input type="text" placeholder="monthly_salary" class="form-control" @if(isset($staff->monthly_salary)) value="{{ $staff->monthly_salary }}"@endif name="monthly_salary" placeholder="No monthly_salary" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.working_hours')}}</label>
                                <input type="number" placeholder="working_hours" min="0" class="form-control" @if(isset($staff->working_hours)) value="{{ $staff->working_hours }}"@endif name="working_hours" placeholder="No working_hours" required="">
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.email')}}</label>
                                <input type="email" placeholder="email" class="form-control" @if(isset($staff->email)) value="{{ $staff->email }}"@endif name="email" placeholder="No email" required="">
                            </div>
                        </div>
                        {{--<div class="col-lg-3 mb-4">--}}
                            {{--<div class="form-group mb-0">--}}
                                {{--<label>{{__('Systems/SystemTwo/staffs.address')}}</label>--}}
                                {{--<input type="text" placeholder="address" class="form-control" @if(isset($staff->address)) value="{{ $staff->address }}"@endif name="address" placeholder="No address" required="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="country">{{__('Systems/SystemTwo/staffs.country')}}</label>
                                <select id="country" name="country" class="form-control" onchange="region('country')">
                                    @if(isset($sortnames) && count($sortnames) > 0)
                                        @foreach($sortnames as $key => $sortname)
                                            <optgroup label="{{$sortname->sortname}}">
                                                @foreach($countries as $key => $country)
                                                    @if($sortname->sortname == $country->sortname)
                                                        <option @if(isset($staff->country) && $staff->country == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach

                                    @endif
                                </select>
                                {{--<input type="text" placeholder="country" class="form-control" @if(isset($staff->country)) value="{{ $staff->country }}"@endif name="country" placeholder="No country" required="">--}}
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="province">{{__('Systems/SystemTwo/staffs.province')}}</label>
                                <select id="province" name="province" class="form-control" onchange="region('province')">
                                    @if(isset($provinces) && count($provinces) > 0)
                                        @foreach($provinces as $key => $province)
                                            <option @if(isset($staff->province) && $staff->province == $province->id) selected @endif value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="city">{{__('Systems/SystemTwo/staffs.city')}}</label>
                                <select id="city" name="city" class="form-control" onchange="region('city')">
                                    @if(isset($cities) && count($cities) > 0)
                                        @foreach($cities as $key => $city)
                                            <option @if(isset($staff->city) && $staff->city == $city->id) selected @endif value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label for="neighborhood">{{__('Systems/SystemTwo/staffs.neighborhood')}}</label>
                                <select id="neighborhood" name="neighborhood" class="form-control" onchange="region('neighborhood')">
                                    @if(isset($neighborhoods) && count($neighborhoods) > 0)
                                        @foreach($neighborhoods as $key => $neighborhood)
                                            <option @if(isset($staff->neighborhood) && $staff->neighborhood == $neighborhood->name) selected @endif value="{{$neighborhood->id}}">{{$neighborhood->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="form-group mb-0">
                                <label>{{__('Systems/SystemTwo/staffs.permission')}}</label>
                                <select id="permission" name="permission" class="form-control">
                                    @if(isset($permissiongroups) && count($permissiongroups) > 0)
                                        @foreach($permissiongroups as $key => $permissiongroup)
                                            <option @if(isset($staff->permission) && $staff->permission == $permissiongroup->name) selected @endif value="{{$permissiongroup->name}}">@if(app()->getLocale() == "en"){{$permissiongroup->name}} @else {{$permissiongroup->ar_name}} @endif</option>
                                        @endforeach
                                    @endif
                                </select>
                                {{--<select id="permission" name="permission" class="form-control">--}}
{{--                                    <option value="user" @if(isset($staff->permission) && $staff->permission == "user") selected @endif>user</option>--}}
{{--                                    <option value="blogger" @if(isset($staff->permission) && $staff->permission == "blogger") selected @endif>blogger</option>--}}
{{--                                    <option value="visitor" @if(isset($staff->permission) && $staff->permission == "visitor") selected @endif>visitor</option>--}}
                                {{--</select>--}}
                                {{--<input type="text" placeholder="selection_powers" class="form-control" @if(isset($staff->selection_powers)) value="{{ $staff->selection_powers }}"@endif name="selection_powers" placeholder="No selection_powers" required="">--}}
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">{{__('Systems/SystemTwo/staffs.save')}}</button>
                            </div>
                        </div>
                    </form>

                    </div>


                </div>
            </div><p id="locale" style="display: none;"><?php echo app()->getLocale()?></p>
        </div>

        <!-- End col -->
    </div>
    <!-- End row -->
</div>

<!-- End Contentbar -->
@endsection
@section('script')

<script src="{{ asset('assets/dashboard/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datepicker/i18n/datepicker.en.js') }}"></script>


{{-- <script src="{{ asset('assets/dashboard/js/custom/custom-toasts.js') }}"></script> --}}

<script>
    $(document).ready(function() {

        $('#default-date').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });

        $('#default-date12').datepicker({

            dateFormat: 'yyyy/mm/dd',

            language: 'en',
        });


    });

    function region(area) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_token() ?>'
            }
        });

        $.ajax({
            url: "/dashboard/region",
            headers: { 'csrftoken' : '{{ csrf_token() }}' },
            data: JSON.stringify({country:$("#country").val(),
                province:$("#province").val(),
                city:$("#city").val(),
                neighborhood:$("#neighborhood").val(),
                area:area}),
            type: 'POST',
            datatype: 'JSON',
            contentType: 'application/json',
            success: function (response) {

                console.log(response[0]);
                var index;
                var content = "";
                for ( index = 0 ; index < response.length ; index ++ ) {

                    content += "<option";
                    content += " value=";
                    content += "'";
                    content += response[index].id;
                    content += "'";
                    content += ">";
                    if($("#locale") === "en")
                        content += response[index].name;
                    else
                        content += response[index].ar_name;
                    content += "</option>";

                }

                var preoption;

                if (area === "country") {
                    preoption = "<option disabled selected value=\"\">select province</option>";
                    $("#province").html(preoption + content);
                    $("#city").html("");
                    $("#neighborhood").html("");
                }
                if (area === "province") {
                    preoption = "<option disabled selected value=\"\">select city</option>";
                    $("#city").html(preoption + content);
                    $("#neighborhood").html("");
                }
                if (area === "city") {
                    preoption = "<option disabled selected value=\"\">select neighborhood</option>";
                    $("#neighborhood").html(preoption + content);
                }

                // console.log(response);


            },
            error: function (response) {
                $('#errormessage').html(response.message);
            }
        });
    }

</script>
@endsection
