@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('products')}}">{{trans('admin.nav_prod')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.prod_update')}}
                </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.prod_update')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {!! Form::model($user_data, ['route' => ['services.update',$user_data->id] , 'method'=>'put' ,'files'=> true]) !!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <strong>{{trans('admin.name')}}</strong>
                            {{ Form::text('name',$user_data->name,["class"=>"form-control" ,"required"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.prod_image')}}</strong>
                            {{ Form::file('main_image',array('accept'=>'image/*','class'=>'form-control')) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.serv_price_before')}}</strong>
                            {{ Form::number('price_before',$user_data->price_before,["class"=>"form-control" ,"required"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.serv_cat_name')}}</strong>
                            {{ Form::select('cat_id',App\Category::pluck('name','id'),$user_data->cat_id
                             ,["class"=>"form-control dept_id" ,'placeholder'=>trans('admin.serv_choose_Category') ]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.desc')}}</strong>
                            {{ Form::textarea('desc',$user_data->desc,["class"=>"form-control" ,"required"]) }}
                        </div>

                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
