@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item">{{trans('admin.nav_reservations')}}
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
                            <div class="btn-group mr-1 mb-1">
                                <button type="button" class="btn btn-outline-secondary btn-min-width dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{trans('admin.'.session('reser_status'))}}
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                       href="{{url('reservations')}}">{{trans('admin.all')}}</a><a
                                        class="dropdown-item"
                                        href="{{url('reservation/waiting')}}">{{trans('admin.waiting')}}</a>
                                    <a class="dropdown-item"
                                       href="{{url('reservation/accepted')}}">{{trans('admin.accepted')}}</a>
                                    <a class="dropdown-item"
                                       href="{{url('reservation/rejected')}}">{{trans('admin.rejected')}}</a>
                                    <a class="dropdown-item"
                                       href="{{url('reservation/canceled')}}">{{trans('admin.canceled')}}</a>
                                    <a class="dropdown-item"
                                       href="{{url('reservation/finished')}}">{{trans('admin.finished')}}</a>
                                </div>
                            </div>
                            <a class="heading-elements-toggle">
                                <i class="icon-ellipsis font-medium-3"></i></a>
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
                                            <th class="text-lg-center">#</th>
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
                                        @foreach($reservations as $reserve)
                                            <tr>
                                                <th scope="row"
                                                    class="text-lg-center">{{$reserve->id}}</th>
                                                @if($reserve->service_id !=null)
                                                    <td class="text-lg-center">{{$reserve->getService->name}}</td>
                                                @else
                                                    <td class="text-lg-center">{{$reserve->getProduct->name}}</td>
                                                @endif
                                                <td class="text-lg-center"><a
                                                        href="{{url('reviews/'.$reserve->getUser->id)}}"
                                                        class="info">{{$reserve->getUser->name}}   </a></td>
                                                <td class="text-lg-center">{{$reserve->time}}</td>
                                                <td class="text-lg-center">{{$reserve->date}}</td>
                                                <td class="text-lg-center">{{trans('admin.'.$reserve->type)}}</td>
                                                <td class="text-lg-center">{{trans('admin.'.$reserve->status)}}</td>
                                                <td class="text-lg-center">
                                                    @if($reserve->status=='waiting')
                                                        <a data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="{{trans('admin.acceptReservation')}}"
                                                           class='btn btn-raised btn-outline-warning btn-sml'
                                                           href=" {{url('reservations/'.$reserve->id.'/accepted')}}">
                                                            <i class="icon-check2"></i>
                                                        </a>
                                                        <a data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="{{trans('admin.rejectReservation')}}"
                                                           class='btn btn-raised btn-outline-danger btn-sml'
                                                           href=" {{url('reservations/'.$reserve->id.'/rejected')}}"><i
                                                                class="icon-cancel-circle"></i></a>
                                                    @elseif($reserve->status=='accepted')
                                                        <a data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="{{trans('admin.cancelReservation')}}"
                                                           class='btn btn-raised btn-danger btn-sml'
                                                           href=" {{url('reservations/'.$reserve->id.'/canceled')}}"><i
                                                                class="icon-android-cancel"></i>
                                                        </a>
                                                        <a data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="{{trans('admin.finishReservation')}}"
                                                           class='btn btn-raised btn-success btn-sml'
                                                           href=" {{url('reservations/'.$reserve->id.'/finished')}}"><i
                                                                class="icon-check2"></i>
                                                        </a>
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

