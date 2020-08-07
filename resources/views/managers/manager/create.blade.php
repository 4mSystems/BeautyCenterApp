@extends('admin_temp')


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/colors/palette-gradient.css') }}">
@endsection
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('employee')}}">{{trans('admin.employee')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.Add')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="card-body">


        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-header row">

                </div>
                <div class="content-body"><!-- stats -->
                    <div class="row">

                        <div class="card">
                            <div class="card-body">
                                <div class="card-body collapse in">
                                    <div class="card">
                                        <div class="card-header" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                            <h3 class="card-title">{{trans('admin.Add')}} </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>

                                            {{ Form::open( ['url' => ['managers'],'method'=>'post', 'files'=>'true'] ) }}
                                            {{ csrf_field() }}


                                            <div class="form-group">
                                                <strong>{{trans('admin.managerName')}}</strong>
                                                {{ Form::text('name',old('name'),["class"=>"form-control" ,"required"]) }}
                                            </div>

                                            <div class="form-group">
                                                <strong>{{trans('admin.email')}}</strong>
                                                {{ Form::email('email',old('email'),["class"=>"form-control" ,"required"
                            ,'pattern'=>"/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" ]) }}
                                            </div>

                                            <div class="form-group">
                                                <strong>{{trans('admin.phone')}}</strong>
                                                {{ Form::number('phone',old('phone'),["class"=>"form-control" ,"required",'max'=>'9999999999999'   ]) }}
                                            </div>

                                            <div class="form-group">
                                                <strong>{{trans('admin.address')}}</strong>
                                                {{ Form::text('address',old('address'),["class"=>"form-control" ,"required" ]) }}
                                            </div>


                                            <div class="form-group">
                                                <strong>{{trans('admin.password')}}</strong><br>
                                                <input type="password" name="password" class="form-control"
                                                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                                       required>
                                            </div>

                                            <div class="form-group">
                                                <strong>{{trans('admin.image')}}</strong><br>
                                                {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                                            </div>


                                            {{ Form::submit( trans('admin.Add') ,['class'=>'btn btn-info']) }}
                                            {{ Form::close() }}
                                        </div>

                                        @endsection

                                        @section('scripts')
                                            <script src="{{ asset('/app-assets/js/scripts/pages/dashboard-lite.js') }}"
                                                    type="text/javascript"></script>
@endsection

