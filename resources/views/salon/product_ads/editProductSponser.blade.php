@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('sponser_ads')}}">{{trans('admin.nav_product_sponsered')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.sponser_edit')}}
                </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.sponser_edit')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {!! Form::model($sponser_data, ['route' => ['sponser_ads.update',$sponser_data->id] , 'method'=>'put' ,'files'=> true]) !!}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <strong>{{trans('admin.period_Lable')}} </strong>
                            {{ Form::number('period',$sponser_data->period,["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.period') ]) }}
                        </div>


                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

