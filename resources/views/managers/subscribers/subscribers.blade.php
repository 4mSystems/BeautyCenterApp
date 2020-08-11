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
                <li class="breadcrumb-item"> {{trans('admin.nav_Subscribers')}}
                </li>

            </ol>
        </div>
    </div>


    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body">
            @include('layouts.errors')

            @include('layouts.messages')

            <!-- stats -->
                <div class="row">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{trans('admin.Sub_title')}} </h3>
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">

                            {{--                                <div class="" style=' padding-top: 10px;--}}
                            {{--                            padding-right: 15px;--}}
                            {{--                             padding-left: 20px;--}}
                            {{--                             '>--}}
                            {{--                                    <a href="{{url('subscribers/create')}} " class="btn btn-info btn-bg">{{trans('admin.subAdd')}} </a>--}}
                            {{--                                </div>--}}

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-lg-center">#</th>
                                        <th class="text-lg-center">{{trans('admin.name')}}</th>
                                        <th class="text-lg-center">{{trans('admin.price')}}</th>
                                        <th class="text-lg-center">{{trans('admin.period')}}</th>
                                        <th class="text-lg-center"></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $package)
                                        <tr>
                                            <th scope="row" class="text-lg-center">{{$package->id}}</th>
                                            <td class="text-lg-center">{{$package->name}}</td>
                                            <td class="text-lg-center">{{$package->price}}</td>
                                            <td class="text-lg-center">{{$package->period}}</td>
                                            <td class="text-lg-center">
                                                <a class='btn btn-raised btn-outline-secondary btn-sml'
                                                   href=" {{url('subscribers/'.$package->id.'/details')}}"><i
                                                    ></i>{{trans('admin.showDetails')}}</a>

                                                <a class='btn btn-raised btn-outline-success btn-sml'
                                                   href=" {{url('subscribers/'.$package->id.'/edit')}}"><i
                                                        class="icon-edit"></i></a>

                                                {{--                                                    <form method="get" id='delete-form-{{ $package->id }}'--}}
                                                {{--                                                          action="{{url('subscribers/'.$package->id.'/delete')}}"--}}
                                                {{--                                                          style='display: none;'>--}}
                                                {{--                                                    {{csrf_field()}}--}}
                                                {{--                                                    <!-- {{method_field('delete')}} -->--}}
                                                {{--                                                    </form>--}}
                                                {{--                                                    <button onclick="if(confirm('are you sure to delete this record?'))--}}
                                                {{--                                                        {--}}
                                                {{--                                                        event.preventDefault();--}}
                                                {{--                                                        document.getElementById('delete-form-{{ $package->id }}').submit();--}}
                                                {{--                                                        }else {--}}
                                                {{--                                                        event.preventDefault();--}}
                                                {{--                                                        }--}}

                                                {{--                                                        "--}}
                                                {{--                                                            class='btn btn-raised btn-danger btn-sml' href=" "><i class="icon-android-delete" aria-hidden='true'>--}}
                                                {{--                                                        </i >--}}


                                                {{--                                                    </button>--}}
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

