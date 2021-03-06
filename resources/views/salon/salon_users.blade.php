@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.nav_users')}}
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{trans('admin.salon_user_title')}} </h3>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">

                                @include('layouts.errors')

                                @include('layouts.messages')


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">#</th>
                                            <th class="text-lg-center">{{trans('admin.name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.email')}}</th>
                                            <th class="text-lg-center">{{trans('admin.phone')}}</th>
                                            <th class="text-lg-center">{{trans('admin.address')}}</th>
                                            <th class="text-lg-center">{{trans('admin.status')}}</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($salon_users as $employees)
                                            <tr>
                                                <th scope="row" class="text-lg-center">{{$employees->id}}</th>
                                                <td class="text-lg-center">{{$employees->name}}</td>
                                                <td class="text-lg-center">{{$employees->email}}</td>
                                                <td class="text-lg-center">{{$employees->phone}}</td>
                                                <td class="text-lg-center">{{$employees->address}}</td>
                                                <td class="text-lg-center">
                                                    @if($employees->status == "active")
                                                        <a class='btn btn-raised btn-success btn-sml'
                                                           href=" {{url('salonUsers/'.$employees->id.'/edit')}}">{{trans('admin.'.$employees->status)}}</a>

                                                    @else
                                                        <a class='btn btn-raised btn-danger btn-sml'
                                                           href=" {{url('salonUsers/'.$employees->id.'/edit')}}">
                                                            {{trans('admin.'.$employees->status)}}</a>

                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{$salon_users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

