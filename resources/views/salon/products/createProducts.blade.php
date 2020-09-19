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
                <div class="card-block">
                    @php
                    $times = App\DeliveryTimes::where('salon_id',Auth::user()->id)->first();
                     @endphp
                    @if($times === null)
                        <strong style="color: red;">{{trans('admin.plzAddDeliverTime')}}</strong>
                        <a class='btn btn-raised btn-info btn-sml'
                           href=" {{url('deliverytimes/create')}}"><i
                                class="icon-box-add"></i></a>

                    @endif

                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['products'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}

                        <div class="form-group">
                             {{ Form::text('name',old('name'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.name') ]) }}
                        </div>

                        <div class="form-group">
                             {{ Form::file('main_image',array('accept'=>'image/*','class'=>'form-control round')) }}
                        </div>

                        <div class="form-group">
                             {{ Form::number('price_before',old('price_before'),["class"=>"form-control round" ,"step"=>"0.01" ,"required",'placeholder'=>trans('admin.serv_price_before') ]) }}
                        </div>

                        <div class="form-group">
                             {{ Form::select('cat_id',App\Category::where('type','product')->pluck('name','id'),old('cat_id')
                             ,["class"=>"form-control dept_id round" ,'placeholder'=>trans('admin.serv_choose_Category') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::select('deliverytime_id',App\DeliveryTimes::where('salon_id',Auth::user()->id)->pluck('delivery_time','id'),old('deliverytime_id')
                            ,["class"=>"form-control  round" ,'placeholder'=>trans('admin.serv_choose_deliveryTime') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::number('stock',old('stock'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.stock') ]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('desc',old('desc'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.desc') ]) }}
                        </div>

                        
                        <!--  -->
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

