
@extends('admin_temp')


@section('content')
    {{--Main Menu--}}

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
                            <h4 class="card-title" id="basic-layout-colored-form-control">Subscribers</h4>

                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">


                                <div class="" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <a href="{{url('subscribers/create')}} " class="btn btn-info btn-bg">{{trans('admin.subAdd')}} </a>
                                </div>
                                <div class="table-responsive" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                    <table class="table">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('admin.name')}}</th>
                                            <th>{{trans('admin.price')}}</th>
                                            <th>{{trans('admin.period')}}</th>
                                            <th>{{trans('admin.desc')}}</th>
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
                                                <td>{{$package->desc}}</td>
                                                <td>
                                                    <a class='btn btn-raised btn-success btn-sml'
                                                       href=" {{url('subscribers/'.$package->id.'/details')}}"><i
                                                            ></i>Show Details</a>

                                                    <a class='btn btn-raised btn-success btn-sml'
                                                       href=" {{url('subscribers/'.$package->id.'/edit')}}"><i
                                                            class="icon-edit"></i></a>

                                                    <form method="get" id='delete-form-{{ $package->id }}'
                                                          action="{{url('subscribers/'.$package->id.'/delete')}}"
                                                          style='display: none;'>
                                                    {{csrf_field()}}
                                                    <!-- {{method_field('delete')}} -->
                                                    </form>
                                                    <button onclick="if(confirm('are you sure to delete this record?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $package->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }

                                                        "
                                                            class='btn btn-raised btn-danger btn-sml' href=" "><i class="icon-android-delete" aria-hidden='true'>
                                                        </i >


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

@endsection

