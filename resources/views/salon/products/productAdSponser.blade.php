@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('products')}}">{{trans('admin.nav_prod')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.setAds')}}
                </li>

            </ol>
        </div>
    </div>


    <!-- /.card-header -->


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body">


                <!-- stats -->
                <div class="row">
                    @include('layouts.errors')

                    @include('layouts.messages')

                    <div class="card">
                        <div class="card-header">
                            <h4>{{trans('admin.sponser_title')}} </h4>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                {{ Form::open( ['url' => ['sponser/'.$selectedProduct->id.'/'.$page_type.'/storeSponser'],'method'=>'post'] ) }}
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <strong>{{trans('admin.period_Lable')}} </strong>
                                    {{ Form::number('period',null,["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.period') ]) }}
                                </div>

                                <div class="center">
                                    {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}

                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>


@endsection

