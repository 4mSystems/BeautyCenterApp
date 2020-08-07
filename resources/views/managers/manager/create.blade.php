@extends('admin_temp')

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

                                            {{ Form::open( ['url' => ['managers'],'method'=>'post'] ) }}
                                            {{ csrf_field() }}


                                            <div class="form-group">
                                                <strong>{{trans('admin.managerName')}}</strong>
                                                {{ Form::text('name',old('name'),["class"=>"form-control" ]) }}
                                            </div>

                                            <div class="form-group">
                                                <strong>{{trans('admin.email')}}</strong>
                                                {{ Form::email('email',old('email'),["class"=>"form-control"  ]) }}
                                            </div>

                                            <div class="form-group">
                                                <strong>{{trans('admin.phone')}}</strong>
                                                {{ Form::number('phone',old('phone'),["class"=>"form-control" ,'max'=>'9999999999999'   ]) }}
                                            </div>

                                            <div class="form-group">
                                                <strong>{{trans('admin.address')}}</strong>
                                                {{ Form::text('address',old('address'),["class"=>"form-control"  ]) }}
                                            </div>


                                            <div class="form-group">
                                                <strong>{{trans('admin.password')}}</strong><br>
                                                <input type="password" name="password" class="form-control">
                                            </div>


                                            {{ Form::submit( trans('admin.Add') ,['class'=>'btn btn-info']) }}
                                            {{ Form::close() }}
                                        </div>

@endsection
