@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.nav_prod')}}
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
                            <a href="{{url('products/create')}} "
                               class="btn btn-info btn-bg">{{trans('admin.prod_add')}} </a>
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

                                @include('layouts.errors')

                                @include('layouts.messages')


                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.Public_HashNum')}}</th>
                                            <th class="text-lg-center">{{trans('admin.name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_price_before')}}</th>
                                            <th class="text-lg-center">{{trans('admin.serv_cat_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.salon')}}</th>
                                            <th class="text-lg-center"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product as $cat)
                                            <tr>
                                                <th scope="row" class="text-lg-center">{{$cat->id}}</th>
                                                <td class="text-lg-center">{{$cat->name}}</td>
                                                <td class="text-lg-center">{{$cat->price_before}}</td>
                                                <td class="text-lg-center">{{$cat->getCategory->name}}</td>
                                                <td class="text-lg-center">{{$cat->getSalon->name}}</td>
                                                <td class="text-lg-center"><a class='btn btn-raised btn-success btn-sml'
                                                                              href=" {{url('products/'.$cat->id.'/edit')}}"><i
                                                            class="icon-edit"></i></a>

                                                    <form method="get" id='delete-form-{{ $cat->id }}'
                                                          action="{{url('products/'.$cat->id.'/delete')}}"
                                                          style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('{{trans('admin.confirmation')}}'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $cat->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }

                                                        "
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


@endsection

