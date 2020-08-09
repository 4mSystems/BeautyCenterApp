
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

                    <div class="card">
                        <div class="card-body">
                            <ul class="list-inline text-xs-center pt-2 m-0">
                                <li class="mr-1">
                                    <h6><i class="icon-circle warning"></i> <span class="grey darken-1">Remaining</span></h6>
                                </li>
                                <li class="mr-1">
                                    <h6><i class="icon-circle success"></i> <span class="grey darken-1">Completed</span></h6>
                                </li>
                            </ul>
                            <div class="chartjs height-250">
                                <canvas id="line-stacked-area" height="250"></canvas>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-xs-3 text-xs-center">
                                    <span class="text-muted">Total Projects</span>
                                    <h2 class="block font-weight-normal">18</h2>
                                    <progress class="progress progress-xs mt-2 progress-success" value="70" max="100"></progress>
                                </div>
                                <div class="col-xs-3 text-xs-center">
                                    <span class="text-muted">Total Task</span>
                                    <h2 class="block font-weight-normal">125</h2>
                                    <progress class="progress progress-xs mt-2 progress-success" value="40" max="100"></progress>
                                </div>
                                <div class="col-xs-3 text-xs-center">
                                    <span class="text-muted">Completed Task</span>
                                    <h2 class="block font-weight-normal">242</h2>
                                    <progress class="progress progress-xs mt-2 progress-success" value="60" max="100"></progress>
                                </div>
                                <div class="col-xs-3 text-xs-center">
                                    <span class="text-muted">Total Revenue</span>
                                    <h2 class="block font-weight-normal">$11,582</h2>
                                    <progress class="progress progress-xs mt-2 progress-success" value="90" max="100"></progress>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
<h4>{{trans('admin.nav_Salons')}}</h4>
             <div class="row">

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
                                            >{{$employees->status}}</a>

                                     @else
                                         <a class='btn btn-raised btn-danger btn-sml'
                                            >{{$employees->status}}</a>

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
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection
