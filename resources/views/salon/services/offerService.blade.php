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
                <li class="breadcrumb-item"> {{trans('admin.ser_Offer')}}
                </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.ser_Offer')}} </h3>
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
                            {{ Form::label('name',$user_data->name,["class"=>"form-control" ,"required"]) }}
                            {{ Form::hidden('name',$user_data->name,["class"=>"form-control" ,"required"]) }}
                        </div>


                        <div class="form-group">
{{--                            <strong>{{trans('admin.serv_time')}}</strong>--}}
                            {{ Form::hidden('time',$user_data->time,["class"=>"form-control" ,"required"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.serv_price_before')}}</strong>
                            {{ Form::hidden('price_before',$user_data->price_before,["class"=>"form-control" ,"required"]) }}
                            {{ Form::label('price_before',$user_data->price_before,["class"=>"form-control" ,"required"]) }}
                        </div>

                        <div class="form-group">
                            <strong>{{trans('admin.serv_price_after')}}</strong>
                            {{ Form::number('price_after',$user_data->price_after,["class"=>"form-control","step"=>"0.01" ,"required"]) }}
                        </div>


                        <div class="form-group">
{{--                            <strong>{{trans('admin.serv_price_after')}}</strong>--}}
                            {{ Form::hidden('cat_id',$user_data->cat_id,["class"=>"form-control" ]) }}
                        </div>

                        <div class="form-group">
{{--                            <strong>{{trans('admin.desc')}}</strong>--}}
                            {{ Form::hidden('desc',$user_data->desc,["class"=>"form-control" ,"required"]) }}
                        </div>

                        <div class="form-group">
{{--                            <strong>{{trans('admin.serv_image')}}</strong>--}}
{{--                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}--}}

                            @if(!empty($user_data->image))
                                <img src="{{ url('uploads/services/'.$user_data->image) }}" style="width:250px;height:250px;" />

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

