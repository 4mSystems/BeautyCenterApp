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
                <li class="breadcrumb-item"> {{trans('admin.add_cat')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.add_cat')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['categories'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::text('name',old('name'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.name') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::select('type', ['product'=>trans('admin.product') , 'service'=>trans('admin.service')],null ,
                           ['class'=>'form-control round' ,"required",null]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round' ,"required",'placeholder'=>trans('admin.cat_image'))) }}
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

