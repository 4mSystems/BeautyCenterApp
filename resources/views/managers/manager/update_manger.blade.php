@extends('admin_temp')


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/colors/palette-gradient.css') }}">
@endsection
@section('content')
<br>

<div class="app-content content container-fluid">
                  <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('employee')}}">{{trans('admin.employee')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.edit')}}
                </li>
              </ol>
            </div>
       </div>

<div class="card-body">


        <div class="app-content content container-fluid">
                         <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                  <div class="content-body"><!-- stats -->
                            <div class="row">

                                      <div class="card">
                                                  <div class="card-body">
                                            <div class="card-body collapse in">

          <div class="card" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
            <div class="card-header">
              <h3 class="card-title">{{trans('admin.edit')}} </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>

            {!! Form::model($user_data, ['route' => ['managers.update',$user_data->id] , 'method'=>'put' ,'files'=> true]) !!}
            {{ csrf_field() }}


            <div class="form-group">
            <strong>{{trans('admin.empName')}}</strong>
            {{ Form::text('name',$user_data->name,["class"=>"form-control" ]) }}
            </div>

            <div class="form-group">
            <strong>{{trans('admin.phone')}}</strong>
                 {{ Form::number('phone',$user_data->phone,["class"=>"form-control" ,'max'=>'9999999999999'   ]) }}
            </div>

            <div class="form-group">
            <strong>{{trans('admin.address')}}</strong>
             {{ Form::text('address',$user_data->address,["class"=>"form-control"  ]) }}
            </div>

            <div class="form-group">
            <strong>{{trans('admin.email')}}</strong>
             {{ Form::email('email',$user_data->email,["class"=>"form-control"  ]) }}
            </div>
                <div class="form-group">
                    <strong>{{trans('admin.image')}}</strong><br>
                    {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                </div>
                <div class="fileupload-new thumbnail">
                    <img  src="{{ asset('uploads/users/'.$user_data->image) }}" alt="image" width="100px" height="80px">
                </div>


            {{ Form::submit( trans('admin.edit') ,['class'=>'btn btn-info']) }}
            {{ Form::close() }}
            </div>




@endsection

              @section('scripts')
                  <script src="{{ asset('/app-assets/js/scripts/pages/dashboard-lite.js') }}" type="text/javascript"></script>
@endsection


