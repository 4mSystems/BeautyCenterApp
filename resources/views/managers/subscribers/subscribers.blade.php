
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
                        <div class="card-body">

                            <div class="card-body collapse in">


                                <div style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <h3 class="card-title">{{trans('admin.Sub_title')}} </h3>
                                </div>


    {{--                                <div class="" style=' padding-top: 10px;--}}
    {{--                            padding-right: 15px;--}}
    {{--                             padding-left: 20px;--}}
    {{--                             '>--}}
    {{--                                    <a href="{{url('subscribers/create')}} " class="btn btn-info btn-bg">{{trans('admin.subAdd')}} </a>--}}
    {{--                                </div>--}}

                                <div class="table-responsive" style=' padding-top: 10px;padding-right: 15px;padding-left: 20px;'>
                                    <table class="table">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin.name')}}</th>
                                            <th>{{trans('admin.price')}}</th>
                                            <th>{{trans('admin.period')}}</th>
                                             <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $package)
                                            <tr>
                                                <th scope="row">{{$package->id}}</th>
                                                <td>{{$package->name}}</td>
                                                <td>{{$package->price}}</td>
                                                <td>{{$package->period}}</td>
                                                 <td>
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


@endsection

