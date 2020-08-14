@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.nav_offers')}}
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
                    @include('layouts.errors')

                    @include('layouts.messages')

                    <div class="card">
                        <div class="card-header">
                            <h3
                                class="card-title">{{trans('admin.products_offers')}} </h3>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.Public_HashNum')}}</th>
                                            <th class="text-lg-center">{{trans('admin.name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_price_before')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_price_after')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_cat_name')}}</th>
                                            <th class="text-lg-center"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <th scope="row" class="text-lg-center">{{$product->id}}</th>
                                                <td class="text-lg-center">{{$product->name}}</td>
                                                <td class="text-lg-center">{{$product->price_before}}</td>
                                                <td class="text-lg-center">{{$product->price_after}}</td>
                                                <td class="text-lg-center">{{$product->getCategory->name}}</td>
                                                <td class="text-lg-center">

                                                    <form method="get" id='delete-form-{{ $product->id }}'
                                                          action="{{url('offers/'.$product->id.'/product')}}"
                                                          style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.confirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $product->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }

                                                        "
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="{{trans('admin.delete_offer')}}"
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
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3
                                class="card-title">{{trans('admin.services_offers')}} </h3>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card-body collapse in">


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.Public_HashNum')}}</th>
                                            <th class="text-lg-center">{{trans('admin.name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_price_before')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_price_after')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_cat_name')}}</th>
                                            <th class="text-lg-center"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($services as $service)
                                            <tr>
                                                <th scope="row" class="text-lg-center">{{$service->id}}</th>
                                                <td class="text-lg-center">{{$service->name}}</td>
                                                <td class="text-lg-center">{{$service->price_before}}</td>
                                                <td class="text-lg-center">{{$service->price_after}}</td>
                                                <td class="text-lg-center">{{$service->getCategory->name}}</td>
                                                <td class="text-lg-center">

                                                    <form method="get" id='delete-form-{{ $service->id }}'
                                                          action="{{url('offers/'.$service->id.'/service')}}"
                                                          style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.confirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $service->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }

                                                        "
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="{{trans('admin.delete_offer')}}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

