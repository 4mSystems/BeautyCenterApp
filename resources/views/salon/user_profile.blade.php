@extends('admin_temp')
@section('content')
    {{--Main Menu--}}
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl9f16ldYjK2x8vmMnkf_ytiM0bb2zjwc&callback=initMap&libraries=&v=weekly"
        defer
    ></script>

    <script type="text/javascript"
            src='{{ asset('/app-assets/js/locationpicker.jquery.js') }}'></script>


    <script>
        $('#us1').locationpicker({
            location: {
                latitude: 46.15242437752303,
                longitude: 2.7470703125
            },
            radius: 300,
            markerIcon: 'http://www.iconsdb.com/icons/preview/tropical-blue/map-marker-2-xl.png',
            inputBinding: {
                latitudeInput: $('#lat'),
                longitudeInput: $('#lng'),
                // radiusInput: $('#us2-radius'),
                // locationNameInput: $('#us2-address')
            }

            });
    </script>

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->
                @include('layouts.errors')

                @include('layouts.messages')

                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-card-center">{{trans('admin.prof_title')}}</h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">

                                    {!! Form::model(Auth::user(), ['route' => ['salon_profile.update',Auth::user()->id] , 'method'=>'put' ,'files'=> true]) !!}
                                    <div class="card-header  text-xs-center">
                                        <a href="#">

                                            <img width="150" height="150"
                                                 src="{{ asset('/uploads/users/'.Auth::user()->image) }}" alt=""
                                                 class="rounded-circle  center-block" onclick="openFile()">
                                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control','style'=>'display:none','id'=>'salon-image')) }}
                                        </a>
                                    </div>

                                    <div class="form-body">
                                        <h4 class="form-section"><i
                                                class="icon-head"></i> {{trans('admin.prof_basic_info')}}</h4>
                                        <div class="form-group">
                                            <label for="eventRegInput1">{{trans('admin.prof_fullName')}}</label>
                                            <input type="text" id="name" class="form-control"
                                                   value="{{Auth::user()->name}}" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventRegInput2">{{trans('admin.email')}}</label>
                                            <input type="email" id="email" class="form-control"
                                                   value="{{Auth::user()->email}}" name="email">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventRegInput3">{{trans('admin.phone')}}</label>
                                            <input type="text" id="phone" class="form-control"
                                                   value="{{Auth::user()->phone}}" name="phone">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventRegInput4">{{trans('admin.address')}}</label>
                                            <input type="text" id="address" class="form-control"
                                                   value="{{Auth::user()->address}}" autocomplete="off" name="address">
                                        </div>
                                        <h4 class="form-section"><i
                                                class="icon-pie-graph2"></i> {{trans('admin.prof_Opening_Time')}}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="userinput1">{{trans('admin.prof_open_from')}}</label>
                                                    <input type="time" id="open_from"
                                                           class="form-control border-primary"
                                                           value="{{date('H:i',strtotime(Auth::user()->open_from))}}"
                                                           name="open_from">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="userinput2">{{trans('admin.prof_open_to')}}</label>
                                                    <input type="time" id="open_to"
                                                           class="form-control border-primary"
                                                           value="{{date('H:i',strtotime(Auth::user()->open_to))}}"
                                                           name="open_to">
                                                </div>
                                            </div>

                                        </div>

                                        <div id="us1" style="width: 500px; height: 400px;"></div>

                                        {!! Form::model(Auth::user(), ['route' => ['salon_profile.show',Auth::user()->id] , 'method'=>'put']) !!}

                                        <h4 class="form-section"><i
                                                class="icon-lock4"></i> {{trans('admin.prof_Password')}}</h4>
                                        <div id="pass_pnl">
                                            <div class="form-group">
                                                <label for="eventRegInput4">{{trans('admin.prof_new_password')}}</label>
                                                <input type="password" id="password" name="password" autocomplete="off"
                                                       class="form-control">
                                            </div>

                                            <div class="form-group" id="pass_pnl">
                                                <label
                                                    for="eventRegInput4">{{trans('admin.prof_confirm_password')}}</label>
                                                <input type="password" id="password_confirmation"
                                                       name="password_confirmation" autocomplete="off"
                                                       class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="icon-check2"></i> {{trans('admin.public_Edit')}}
                                            </button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>


                                </div>
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    </div>

@endsection
@section("scripts")



    <script>
        function openFile() {
            $('#salon-image').click();
        }


    </script>
@endsection
