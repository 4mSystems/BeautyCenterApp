@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('chairs')}}">{{trans('admin.nav_chairs')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_chairs')}}
                </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.update_chairs')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {!! Form::model($user_data, ['route' => ['chairs.update',$user_data->id] , 'method'=>'put']) !!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            {{ Form::text('chair_name',$user_data->chair_name,["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.chair_name')]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('desc',$user_data->desc,["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.desc')]) }}
                        </div>


                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

