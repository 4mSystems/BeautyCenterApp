@extends('admin_temp')

@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">

        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('subscribers')}}">{{trans('admin.nav_Subscribers')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.editPackge')}}
                </li>
            </ol>
        </div>
    </div>

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"
                                id="basic-layout-colored-form-control">{{trans('admin.Update_Sub_title')}}</h4>

                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                {!! Form::model($data, ['route' => ['subscribers.update',$data->id] , 'method'=>'put']) !!}
                                {{ csrf_field() }}
                                <div class="form-body">

                                    <div class="form-group">
                                        <strong>{{trans('admin.name')}}</strong>

                                        {!! Form::text('name',$data->name,['class'=>'form-control', 'placeholder'=>trans('admin.EnterName')]) !!}
                                        @if ($errors->has('name'))
                                            <span class="danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.price')}}</strong>
                                        {!! Form::text('price',$data->price,['class'=>'form-control', 'placeholder'=>trans('admin.EnterPrice')]) !!}
                                        @if ($errors->has('price'))
                                            <span class="danger" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.period')}}</strong>
                                        {!! Form::text('period',$data->period,['class'=>'form-control', 'placeholder'=>trans('admin.EnterPeriod')]) !!}
                                        @if ($errors->has('period'))
                                            <span class="danger" role="alert">
                                        <strong>{{ $errors->first('period') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.description')}}</strong>
                                        {!! Form::textarea('desc',$data->desc,['class'=>'form-control', 'placeholder'=>trans('admin.EnterDesc')]) !!}
                                        @if ($errors->has('desc'))
                                            <span class="danger" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>
                                {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

