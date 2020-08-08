@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.nav_Manager')}}
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
                        <div class="card-body">

                            <div class="card-body collapse in">


                                <div style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <h3 class="card-title">{{trans('admin.nav_Manager')}} </h3>
                                </div>
                                @include('layouts.errors')

                                @include('layouts.messages')

                                <div class="" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <a href="{{url('managers/create')}} "
                                       class="btn btn-info btn-bg">{{trans('admin.Add_Manager')}} </a>
                                </div>

                                <div class="table-responsive" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <table class="table">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin.name')}}</th>
                                            <th>{{trans('admin.email')}}</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($managers as $employees)
                                            <tr>
                                                <th scope="row">{{$employees->id}}</th>
                                                <td>{{$employees->name}}</td>
                                                <td>{{$employees->email}}</td>
                                                <td><a class='btn btn-raised btn-success btn-sml'
                                                       href=" {{url('managers/'.$employees->id.'/edit')}}"><i
                                                            class="icon-edit"></i></a>

                                                    <form method="get" id='delete-form-{{ $employees->id }}'
                                                          action="{{url('managers/'.$employees->id.'/delete')}}"
                                                          style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('are you sure to delete this record?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $employees->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }

                                                        "
                                                            class='btn btn-raised btn-danger btn-sml' href=" "><i
                                                            class="icon-android-delete" aria-hidden='true'>
                                                        </i>


                                                    </button>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>


                        @endsection

