@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('salons')}}">{{trans('admin.nav_Salons')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.Add_Salon')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="card-body">
        <div class="app-content content container-fluid">
            <div class="content-wrapper">
                <div class="content-body"><!-- stats -->
                    <div class="row">

                        <div class="card">

                            <div class="card-header" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                <h3 class="card-title">{{trans('admin.Add_Salon')}} </h3>
                            </div>

                        @include('layouts.errors')

                        @include('layouts.messages')

                        <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card-block">
                                    {{ Form::open( ['url' => ['salons'],'method'=>'post', 'files'=>'true'] ) }}
                                    {{ csrf_field() }}


                                    <div class="form-group">
                                        <strong>{{trans('admin.salonName')}}</strong>
                                        {{ Form::text('name',old('name'),["class"=>"form-control" ,"required"]) }}
                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.email')}}</strong>
                                        {{ Form::email('email',old('email'),["class"=>"form-control" ,"required" ]) }}
                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.phone')}}</strong>
                                        {{ Form::number('phone',old('phone'),["class"=>"form-control" ,"required",'max'=>'9999999999999'   ]) }}
                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.address')}}</strong>
                                        {{ Form::text('address',old('address'),["class"=>"form-control" ,"required" ]) }}
                                    </div>


                                    <div class="form-group">
                                        <strong>{{trans('admin.password')}}</strong><br>
                                        <input type="password" name="password" class="form-control"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.package')}}</strong><br>
                                        {{ Form::select('package_id',App\package::pluck('name','id'),old('package_id')
                            ,["class"=>"form-control dept_id" ,'placeholder'=>trans('admin.choosePackage') ]) }}

                                    </div>

                                    <div class="form-group">
                                        <strong>{{trans('admin.payStatus')}}</strong><br>

                                        <select id="salon_payment_status" name="salon_payment_status" required
                                                class="form-control">
                                            <option value="no">{{trans('admin.noStatus')}}</option>
                                            <option value="yes">{{trans('admin.yesStatus')}}</option>
                                        </select>
                                        <span class="text-danger" id=type_error"></span>
                                    </div>


                                    {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


