@extends('admin_temp')
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
                            <a href="{{url('categories')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="pink">{{ count($data['salonCategories'])}}</h3>
                                                    <span>{{trans('admin.nav_cat')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-ios-list teal font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="{{url('services')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="teal">{{ count($data['salonServices'])}}</h3>
                                                    <span>{{trans('admin.nav_serv')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-ios-paper pink font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="{{url('products')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="deep-orange">{{ count($data['salonProducts'])}}</h3>
                                                    <span>{{trans('admin.nav_prod')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-ios-medkit deep-orange font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-xs-12">
                            <a href="{{url('reservations')}}">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <div class="media">
                                                <div class="media-body text-xs-left">
                                                    <h3 class="cyan">{{ count($salonReservation)}}</h3>
                                                    <span>{{trans('admin.nav_reservations')}}</span>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <i class="icon-ios-timer cyan font-large-2 float-xs-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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

                {{--                                <div id="chart" style="height: 300px;"></div>--}}
                {{--                <canvas id="myChart" width="400" height="400"></canvas>--}}
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
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('app-assets/vendors/js/charts/flot/jquery.flot.min.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/flot/jquery.flot.resize.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/flot/jquery.flot.categories.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/flot/jquery.flot.stack.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/js/charts/flot/jquery.flot.navigate.js') }}"
            type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script>
        var config = {
            charts: {
                {{--                count_array: "{{$ut}}",--}}
            }
        };
    </script>
    <script src="{{asset('app-assets/js/scripts/charts/flot/bar/bar.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/charts/flot/bar/stacked-bar.js') }}"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>--}}

@endsection
