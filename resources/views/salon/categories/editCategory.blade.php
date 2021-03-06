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
                            {{ Form::text('name',$user_data->name,["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.name')]) }}
                        </div>

                        <div class="form-group">
                            {!! Form::select('type', ['product'=>trans('admin.product') , 'service'=>trans('admin.service')] ,$user_data->type ,['class'=>'form-control round' ,"required",null]) !!}

                        </div>


                        <div class="form-group">
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round')) }}
                            @if(!empty($user_data->image))
                                <img src="{{ url($user_data->image) }}"
                                     style="width:250px;height:250px;"/>

                            @endif

                        </div>


                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

