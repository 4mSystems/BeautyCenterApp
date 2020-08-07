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
                            <h4 class="card-title" id="basic-layout-colored-form-control">Subscriber Details</h4>

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
                                <h4 class="form-section"><i class="icon-plus"></i> Add Detail</h4>
                                <form role="form" class="form-horizontal" method="POST"
                                      action="{{ URL::to('DetailSubscriber') }}">
                                    @csrf
                                    <input type="hidden" id="package_id" class="form-control border-primary"
                                           value="{{$id}}" placeholder="package_id" name="package_id">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">Name</label>
                                                <input type="text" id="name" class="form-control border-primary"
                                                       placeholder="Name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput2">Limit</label>
                                                <input type="text" id="limit" class="form-control border-primary"
                                                       placeholder="Company" name="limit">
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-actions right" style="margin: 10px">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="icon-check2"></i> Add
                                            </button>

                                    </div>
                                </form>

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
                                        <th>{{trans('admin.limit')}}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($data as $packageDetails)
                                        <tr>
                                            <th scope="row">{{$packageDetails->id}}</th>
                                            <td>{{$packageDetails->name}}</td>
                                            <td>{{$packageDetails->limit}}</td>
                                            <td>
                                                <a class='btn btn-raised btn-success btn-sml'
                                                   href=" {{url('DetailSubscriber/'.$packageDetails->id.'/edit')}}"><i
                                                        class="icon-edit"></i></a>

                                                <form method="get" id='delete-form-{{ $packageDetails->id }}'
                                                      action="{{url('Detail/'.$packageDetails->id.'/delete')}}"
                                                      style='display: none;'>
                                                {{csrf_field()}}
                                                <!-- {{method_field('delete')}} -->
                                                </form>
                                                <button onclick="if(confirm('are you sure to delete this record?'))
                                                    {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $packageDetails->id }}').submit();
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
                </div>


            </div>
        </div>
    </div>

@endsection

