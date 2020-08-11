@extends('admin_temp')

@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h3 class="pink">{{ count($data['managers'])}}</h3>
                                            <span>{{trans('admin.nav_Manager')}}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
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
                                            <h3 class="teal">{{ count($data['packages'])}}</h3>
                                            <span>{{trans('admin.nav_Subscribers')}}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-user1 teal font-large-2 float-xs-right"></i>
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
                                            <h3 class="deep-orange">{{ count($salons)}}</h3>
                                            <span>{{trans('admin.nav_Salons')}}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
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
                                            <h3 class="cyan">{{ count($data['ads'])}}</h3>
                                            <span>{{trans('admin.nav_sponsered')}}</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-ios-help-outline cyan font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ stats -->
                <!--/ project charts -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar Chart</h4>
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
                                    <div id="bar-chart" class="height-400"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>{{trans('admin.nav_Salons')}}</h4>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{url('salons/create')}} "
                               class="btn btn-info btn-bg">{{trans('admin.Add_Salon')}} </a>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
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
            </div>
        </div>
    </div>
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
    <script src="{{asset('app-assets/js/scripts/charts/flot/bar/bar.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/charts/flot/bar/annotations.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/charts/flot/bar/stacked-bar.js') }}"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
@endsection
