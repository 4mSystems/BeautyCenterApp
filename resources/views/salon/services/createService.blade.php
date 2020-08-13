@extends('admin_temp')


@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('services')}}">{{trans('admin.nav_serv')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.serv_add')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.serv_add')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['services'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            {{ Form::text('name',old('name'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.name') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round' ,"required",'placeholder'=>trans('admin.serv_image') )) }}
                        </div>

                        <div class="form-group">
                            {{ Form::text('time',old('time'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.serv_time') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::number('price_before',old('price_before'),["class"=>"form-control round" ,"step"=>"0.01" ,"required",'placeholder'=>trans('admin.serv_price_before') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::select('cat_id',App\Category::pluck('name','id'),old('cat_id')
                            ,["class"=>"form-control dept_id round" ,'placeholder'=>trans('admin.serv_choose_Category') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::textarea('desc',old('desc'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.desc') ]) }}
                        </div>
                        <div class="center">
                            {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

