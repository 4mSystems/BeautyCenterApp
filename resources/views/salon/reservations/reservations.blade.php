@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.nav_reservations')}}
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

                                @include('layouts.errors')

                                @include('layouts.messages')


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.client_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_time')}}</th>
                                            <th class="text-lg-center">{{trans('admin.reservation_date')}}</th>
                                            <th class="text-lg-center">{{trans('admin.reservation_type')}}</th>
                                            <th class="text-lg-center">{{trans('admin.reservation_status')}}</th>
                                            <th class="text-lg-center"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                        @foreach($categories as $cat)--}}
                                        {{--                                            <tr>--}}
                                        {{--                                                <th scope="row" class="text-lg-center">{{$cat->id}}</th>--}}
                                        {{--                                                <td class="text-lg-center">{{$cat->name}}</td>--}}
                                        {{--                                                <td class="text-lg-center">{{$cat->email}}</td>--}}
                                        {{--                                                <td class="text-lg-center">{{$cat->email}}</td>--}}
                                        {{--                                                <td class="text-lg-center"><a class='btn btn-raised btn-success btn-sml'--}}
                                        {{--                                                                              href=" {{url('services/'.$cat->id.'/edit')}}"><i--}}
                                        {{--                                                            class="icon-edit"></i></a>--}}

                                        {{--                                                    <form method="get" id='delete-form-{{ $cat->id }}'--}}
                                        {{--                                                          action="{{url('services/'.$cat->id.'/delete')}}"--}}
                                        {{--                                                          style='display: none;'>--}}
                                        {{--                                                    {{csrf_field()}}--}}
                                        {{--                                                    <!-- {{method_field('delete')}} -->--}}
                                        {{--                                                    </form>--}}
                                        {{--                                                    <button onclick="if(confirm('are you sure to delete this record?'))--}}
                                        {{--                                                        {--}}
                                        {{--                                                        event.preventDefault();--}}
                                        {{--                                                        document.getElementById('delete-form-{{ $cat->id }}').submit();--}}
                                        {{--                                                        }else {--}}
                                        {{--                                                        event.preventDefault();--}}
                                        {{--                                                        }--}}

                                        {{--                                                        "--}}
                                        {{--                                                            class='btn btn-raised btn-danger btn-sml' href=" "><i--}}
                                        {{--                                                            class="icon-android-delete" aria-hidden='true'>--}}
                                        {{--                                                        </i>--}}


                                        {{--                                                    </button>--}}
                                        {{--                                                </td>--}}

                                        {{--                                            </tr>--}}
                                        {{--                                        @endforeach--}}
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>


@endsection
