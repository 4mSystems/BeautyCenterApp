@extends('admin_temp')

@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.nav_Salons')}}
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
            @include('layouts.errors')

            @include('layouts.messages')

                <!-- stats -->
                <div class="row">

                    <div class="card">
                        <div class="card-body">

                            <div class="card-body collapse in">


                                <div style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <h3 class="card-title">{{trans('admin.nav_Salons')}} </h3>
                                </div>


                                <div class="" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <a href="{{url('salons/create')}} "
                                       class="btn btn-info btn-bg">{{trans('admin.Add_Salon')}} </a>
                                </div>

                                <div class="table-responsive" style=' padding-top: 10px;  padding-right: 15px; padding-left: 20px;'>
                                    <table class="table">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin.name')}}</th>
                                            <th>{{trans('admin.email')}}</th>
                                            <th>{{trans('admin.phone')}}</th>
                                            <th>{{trans('admin.address')}}</th>
                                            <th>{{trans('admin.status')}}</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($salons as $employees)
                                            <tr>
                                                <th scope="row">{{$employees->id}}</th>
                                                <td>{{$employees->name}}</td>
                                                <td>{{$employees->email}}</td>
                                                <td>{{$employees->phone}}</td>
                                                <td>{{$employees->address}}</td>


                                                <td>
                                                    @if($employees->status == "active")
                                                    <a class='btn btn-raised btn-success btn-sml'
                                                       href=" {{url('salons/'.$employees->id.'/edit')}}">{{trans('admin.'.$employees->status)}}</a>

                                                    @else
                                                        <a class='btn btn-raised btn-danger btn-sml'
                                                           href=" {{url('salons/'.$employees->id.'/edit')}}">
                                                            {{trans('admin.'.$employees->status)}}</a>

                                                    @endif
                                                </td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>


                        @endsection

