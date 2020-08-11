@extends('admin_temp')


@section('content')
    {{--Main Menu--}}
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('subscribers')}}">{{trans('admin.nav_Subscribers')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.Sub_Details')}}
                </li>

            </ol>
        </div>
    </div>

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->

                {{--                <h1>Subscribers</h1>--}}
                @include('layouts.errors')

                @include('layouts.messages')
                {{--                Write your content here ...--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('admin.Sub_Details')}} ({{$data->getPackage->name}})</h4>
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
                                <ul class="list-group">
                                    @if($data->salonLocation == 'yes')
                                        <li class="list-group-item">{{trans('admin.salonLocation')}}</li>
                                    @endif

                                    @if($data->addProducts == 'yes')
                                        <li class="list-group-item">{{trans('admin.addProducts')}}</li>
                                    @endif

                                    @if($data->addCategories == 'yes')
                                        <li class="list-group-item">{{trans('admin.addCategories')}}</li>
                                    @endif

                                    @if($data->reserveService == 'yes')
                                        <li class="list-group-item">{{trans('admin.reserveService')}}</li>
                                    @endif

                                    @if($data->buyProduct == 'yes')
                                        <li class="list-group-item">{{trans('admin.buyProduct')}}</li>
                                    @endif

                                    @if($data->ePay == 'yes')
                                        <li class="list-group-item">{{trans('admin.ePay')}}</li>
                                    @endif

                                    @if($data->followOrders == 'yes')
                                        <li class="list-group-item">{{trans('admin.followOrders')}}</li>
                                    @endif

                                    @if($data->points == 'yes')
                                        <li class="list-group-item">{{trans('admin.points')}}</li>
                                    @endif

                                    @if($data->sellingPoints == 'yes')
                                        <li class="list-group-item">{{trans('admin.sellingPoints')}}</li>
                                    @endif



                                    @if($data->barcode == 'yes')
                                        <li class="list-group-item">{{trans('admin.barcode')}}</li>
                                    @endif

                                    @if($data->hr  == 'yes')
                                        <li class="list-group-item">{{trans('admin.hr')}}</li>
                                    @endif

                                    @if($data->branches == 'yes')
                                        <li class="list-group-item">{{trans('admin.branches')}}</li>
                                    @endif

                                    @if($data->productAlerts == 'yes')
                                        <li class="list-group-item">{{trans('admin.productAlerts')}}</li>
                                    @endif

                                    @if($data->sms == 'yes')
                                        <li class="list-group-item">{{trans('admin.sms')}}</li>
                                    @endif

                                    @if($data->chatting == 'yes')
                                        <li class="list-group-item">{{trans('admin.chatting')}}</li>
                                    @endif


                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div>

                </div>
            </div>

@endsection

