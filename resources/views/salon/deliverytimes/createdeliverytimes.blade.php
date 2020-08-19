@extends('admin_temp')


@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('deliverytimes')}}">{{trans('admin.deliverytimes')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.add_deliverytimes')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.add_deliverytimes')}} </h3>
                </div>
            @include('layouts.errors')

            @include('layouts.messages')
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['deliverytimes'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{ Form::text('delivery_time',old('delivery_time'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.delivery_time  ') ]) }}
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

