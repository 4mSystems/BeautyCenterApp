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
                <li class="breadcrumb-item"> {{trans('admin.prod_add')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.prod_add')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['products'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <strong>{{trans('admin.name')}}</strong>
                            {{ Form::text('name',old('name'),["class"=>"form-control" ,"required"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.serv_image')}}</strong>
                            {{ Form::file('main_image',array('accept'=>'image/*','class'=>'form-control')) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.serv_price_before')}}</strong>
                            {{ Form::number('price_before',old('price_before'),["class"=>"form-control" ,"required"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.serv_cat_name')}}</strong>
                            {{ Form::select('cat_id',App\Category::pluck('name','id'),old('cat_id')
                             ,["class"=>"form-control dept_id" ,'placeholder'=>trans('admin.serv_choose_Category') ]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.desc')}}</strong>
                            {{ Form::textarea('desc',old('desc'),["class"=>"form-control" ,"required"]) }}
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

