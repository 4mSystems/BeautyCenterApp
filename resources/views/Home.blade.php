@extends('admin_temp')
@section('styles')
    {{--    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>--}}
    {{--    <script--}}
    {{--        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl9f16ldYjK2x8vmMnkf_ytiM0bb2zjwc&callback=initMap&libraries=&v=weekly"--}}
    {{--        defer--}}
    {{--    ></script>--}}
    {{--    <style type="text/css">--}}
    {{--        /* Always set the map height explicitly to define the size of the div--}}
    {{--         * element that contains the map. */--}}
    {{--        #map {--}}
    {{--            height: 100%;--}}
    {{--        }--}}

    {{--        /* Optional: Makes the sample page fill the window. */--}}
    {{--        html,--}}
    {{--        body {--}}
    {{--            height: 100%;--}}
    {{--            margin: 0;--}}
    {{--            padding: 0;--}}
    {{--        }--}}
    {{--    </style>--}}
@endsection
@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->
                <div class="row">

                    @include('layouts.errors')

                    @include('layouts.messages')

                    @if(Auth::user()->type == "manager")
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="{{url('managers')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="teal">{{ count($data['managers'])}}</h3>
                                                    <span>{{trans('admin.nav_Manager')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-users teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="{{url('subscribers')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="pink">{{ count($data['packages'])}}</h3>
                                                    <span>{{trans('admin.nav_Subscribers')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-briefcase4 pink font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="{{url('salons')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="deep-orange">{{ count($salons)}}</h3>
                                                    <span>{{trans('admin.nav_Salons')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-weather24 deep-orange font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="{{url('sponsered')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="cyan">{{ count($data['ads'])}}</h3>
                                                    <span>{{trans('admin.nav_sponsered')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-cash cyan font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="media-body text-xs-left">
                                                <h3 class="pink">{{ count($data['booking']->where('status','finished'))}}</h3>
                                                <span>{{trans('admin.completed_booking')}}</span>
                                            </div>
                                            <div class="media-right media-middle">
                                                <i class="icon-shopping-basket cyan font-large-2 float-xs-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="media-body text-xs-left">
                                                <h3 class="teal">{{ count($data['booking']->where('status','pending'))}}</h3>
                                                <span>{{trans('admin.pending_booking')}}</span>
                                            </div>
                                            <div class="media-right media-middle">
                                                <i class="icon-arrow3 pink font-large-2 float-xs-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="media-body text-xs-left">
                                                <h3 class="teal">{{ count($data['booking']->where('status','accepted'))}}</h3>
                                                <span>{{trans('admin.approved_booking')}}</span>
                                            </div>
                                            <div class="media-right media-middle">
                                                <i class="icon-check green font-large-2 float-xs-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="media-body text-xs-left">
                                                <h3 class="cyan">{{ count($data['booking']->where('status','inprogress'))}}</h3>
                                                <span>{{trans('admin.inProgress_booking')}}</span>
                                            </div>
                                            <div class="media-right media-middle">
                                                <i class="icon-book2 cyan font-large-2 float-xs-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>Z
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="media-body text-xs-left">
                                                <h3 class="cyan">{{ count($data['booking']->where('status','canceled'))}}</h3>
                                                <span>{{trans('admin.canceled_booking')}}</span>
                                            </div>
                                            <div class="media-right media-middle">
                                                <i class="icon-times red font-large-2 float-xs-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="media-body text-xs-left">
                                                <h3 class="cyan">{{ count($data['booking']->unique('customer_id'))}}</h3>
                                                <span>{{trans('admin.total_customers')}}</span>
                                            </div>
                                            <div class="media-right media-middle">
                                                <i class="icon-user4 blue font-large-2 float-xs-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="media-body text-xs-left">
                                                <h3 class="cyan">{{ $data['booking']->where('status','!=','canceled')->sum('price')}}</h3>
                                                <span>{{trans('admin.total_earnings')}}</span>
                                            </div>
                                            <div class="media-right media-middle">
                                                <i class="icon-money1 blue font-large-2 float-xs-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
                <!--/ stats -->
                <!--/ project charts -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{trans('admin.home_par_chart')}}</h4>
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
                                    <div id="chart" class="height-400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->type == "manager")

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{url('salons/create')}} "
                                   class="btn btn-info btn-bg">{{trans('admin.Add_Salon')}} </a>
                                <a class="heading-elements-toggle"><i
                                        class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
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
                                        @foreach($salons as $employees)
                                            <tr>
                                                <th scope="row" class="text-lg-center">{{$employees->id}}</th>
                                                <td class="text-lg-center">{{$employees->name}}</td>
                                                <td class="text-lg-center">{{$employees->email}}</td>
                                                <td class="text-lg-center">{{$employees->phone}}</td>
                                                <td class="text-lg-center">{{$employees->address}}</td>
                                                <td class="text-lg-center">
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
                                        @endforeach                                    </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                @else

                    <div class="row">

                        <div class="card">
                            <div class="card-header">

                                <a href="{{url('reservations')}}"
                                   class="btn btn-outline-secondary btn-min-width">{{trans('admin.Public_See_more')}}</a>
                                <a class="heading-elements-toggle"><i
                                        class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i
                                                    class="icon-minus4"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="card-block">

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
                                            @foreach($salonReservation as $reserve)
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
                                                            class="info">{{$reserve->getUser->name}}   </a>
                                                    </td>
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
                        </div>
                    </div>
                @endif
                <div id="map"></div>
            </div>
        </div>
    </div>


    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('salon_chart')",
            hooks: new ChartisanHooks()
                .colors(['#4299E1'])
                .datasets([{type: 'bar', fill: true}, 'bar']),
        });
    </script>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection
@section('scripts')
    {{--    <script>--}}
    {{--        let map;--}}

    {{--        function initMap() {--}}
    {{--            map = new google.maps.Map(document.getElementById("map"), {--}}
    {{--                center: {lat: -34.397, lng: 150.644},--}}
    {{--                zoom: 8--}}
    {{--            });--}}
    {{--        }--}}
    {{--    </script>--}}
@endsection
