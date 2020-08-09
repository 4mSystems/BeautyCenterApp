@extends('admin_temp')

@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">{{trans('admin.SubUpdateDetail')}}</h4>

                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">

                            @include('layouts.errors')

                            @include('layouts.messages')
                            <div class="card-block">



                                {!! Form::model($data, ['route' => ['DetailSubscriber.update',$data->id] , 'method'=>'put']) !!}
                                {{ csrf_field() }}
                                    <div class="form-body">

                                        <div class="form-group">
                                            <strong>{{trans('admin.name')}}</strong>

                                            {!! Form::label('name', 'name') !!}
                                            {!! Form::text('name',$data->name,['class'=>'form-control', 'placeholder'=>trans('admin.EnterName')]) !!}
                                            {!! Form::hidden('package_id',$data->package_id,['class'=>'form-control',]) !!}

                                        @if ($errors->has('name'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('limit', 'Limit') !!}
                                            {!! Form::text('limit',$data->limit,['class'=>'form-control', 'placeholder'=>trans('admin.EnterLimit')]) !!}
                                            @if ($errors->has('limit'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('limit') }}</strong>
                                    </span>
                                            @endif
                                        </div>


                                    </div>

                                    <div class="form-actions right">
                                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-info']) }}
                                        {{ Form::close() }}
                                    </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

