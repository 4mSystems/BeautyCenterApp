@extends('admin_temp')

@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.nav_sponsered')}}
                </li>

            </ol>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-body">
                <!-- stats -->
                <div class="row">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{trans('admin.nav_sponsered')}} </h3>

                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-mdium-3"></i></a>
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
                                        <th class="text-lg-center">{{trans('admin.salon')}}</th>
                                        <th class="text-lg-center">{{trans('admin.product')}}</th>
                                        <th class="text-lg-center">{{trans('admin.paymentAmount')}}</th>
                                        <th class="text-lg-center">{{trans('admin.period')}}</th>
                                        <th class="text-lg-center">{{trans('admin.paymentInfo')}}</th>
                                        <th class="text-lg-center">{{trans('admin.status')}}</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ads as $sponsered)
                                        <tr>
                                            <th scope="row" class="text-lg-center">{{$sponsered->id}}</th>
                                            <td class="text-lg-center">{{$sponsered->getUser->name}}</td>
                                            @if($sponsered->product_id !=null)
                                                <td class="text-lg-center"> {{$sponsered->getProduct->name}}</td>
                                            @elseif($sponsered->service_id !=null)
                                                <td class="text-lg-center">{{$sponsered->getService->name}}</td>
                                            @endif
                                            <td class="text-lg-center">{{$sponsered->payment_amount}}</td>
                                            <td class="text-lg-center">{{$sponsered->period}}</td>
                                            <td class="text-lg-center">{{$sponsered->payment_info}}</td>

                                            <td class="text-lg-center">
                                                @if($sponsered->status == "accepted")
                                                    <a class='btn btn-raised btn-success btn-sml'
                                                       href=" {{url('sponsered/'.$sponsered->id.'/edit')}}">{{$sponsered->status}}</a>

                                                @else
                                                    <a class='btn btn-raised btn-danger btn-sml'
                                                       href=" {{url('sponsered/'.$sponsered->id.'/edit')}}">{{$sponsered->status}}</a>

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
        </div>
    </div>
@endsection

