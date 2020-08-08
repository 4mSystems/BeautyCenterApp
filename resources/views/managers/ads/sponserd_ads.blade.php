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
                                    <h3 class="card-title">{{trans('admin.nav_sponsered')}} </h3>
                                </div>


                                <div class="" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <a href="{{url('sponsered/create')}} "
                                       class="btn btn-info btn-bg">{{trans('admin.add_new_sponser')}} </a>
                                </div>

                                <div class="table-responsive" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <table class="table">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin.salon')}}</th>
                                            <th>{{trans('admin.product')}}</th>
                                            <th>{{trans('admin.paymentAmount')}}</th>
                                            <th>{{trans('admin.period')}}</th>
                                            <th>{{trans('admin.paymentInfo')}}</th>
                                            <th>{{trans('admin.status')}}</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ads as $sponsered)
                                            <tr>
                                                <th scope="row">{{$sponsered->id}}</th>
                                                <td>{{$sponsered->getUser->name}}</td>
                                                @if($sponsered->product_id !=null)
                                                <td>{{$sponsered->getProduct->name}}</td>
                                                @elseif($sponsered->service_id !=null)
                                                    <td>{{$sponsered->getService->name}}</td>
                                                    @endif
                                                <td>{{$sponsered->payment_amount}}</td>
                                                <td>{{$sponsered->period}}</td>
                                                <td>{{$sponsered->payment_info}}</td>

                                                <td>
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


                        @endsection

