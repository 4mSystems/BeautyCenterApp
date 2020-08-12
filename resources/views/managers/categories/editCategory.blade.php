@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('categories')}}">{{trans('admin.nav_cat')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_cat')}}
                </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.update_cat')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {!! Form::model($user_data, ['route' => ['categories.update',$user_data->id] , 'method'=>'put' ,'files'=> true]) !!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <strong>{{trans('admin.name')}}</strong>
                            {{ Form::text('name',$user_data->name,["class"=>"form-control"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.type')}}</strong>
                            {{ Form::text('type',$user_data->type,["class"=>"form-control"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.salon_name')}}</strong>
                            {{ Form::text('salon_name',$user_data->salon_name,["class"=>"form-control"  ]) }}
                        </div>

                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

