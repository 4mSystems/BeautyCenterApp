@extends('admin_temp')
@section('styles')
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }

        .stars {
            margin: 20px 0;
            font-size: 24px;
            color: #d17581;
        }
    </style>
@endsection
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('home')}}">{{trans('admin.home')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.reviews')}}
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
                            <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                    <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card-block">

                                @include('layouts.errors')

                                @include('layouts.messages')
                                <div class="card-header no-border text-xs-center">
                                    <img
                                        src="{{ asset('/uploads/users/'.$user->image) }}"
                                        alt="unlock-user" width="114" height="113"
                                        class="rounded-circle  center-block">
                                    <h5 class="card-title mt-1">{{$user->name}}</h5>
                                    @for($i=0;$i<5 ; $i++)
                                        <span class="fa fa-star {{$i<$totalReviews?'checked':''}}"></span>
                                    @endfor
                                </div>
                                @foreach($reviews as $key=> $review)
                                    @if($key%2==0)
                                        <blockquote class="blockquote border-left-primary border-left-3">
                                            <p class="mb-0">{{$review->comment}}</p>
                                        </blockquote>
                                    @else
                                        <blockquote class="blockquote border-left-red border-left-3">
                                            <p class="mb-0">{{$review->comment}}</p>
                                        </blockquote>
                                    @endif
                                    <hr>
                                @endforeach
                                <div class="card-block">
                                    {{ Form::open( ['url' => ['reviews'],'method'=>'post'] ) }}
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$user->id}}" name="user_id">

                                    <div class="form-group">
                                        {{ Form::text('comment',old('comment'),["class"=>"form-control round" ,"required",'placeholder'=>trans('admin.write_review') ]) }}
                                    </div>
                                    <div class="input-group">
                                        <div class="text-right">
                                            <input id="ratings-hidden" name="rating" type="hidden">
                                            <div class="stars starrr" data-rating="0"></div>
                                        </div>
                                    </div>
                                    <div class="center">
                                        {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1']) }}

                                    </div>

                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>


                        @endsection
                        @section('scripts')
                            <script>
                                $(document).ready(function () {
                                    $('.starrr').on('starrr:change', function (e, value) {
                                        ratingsField.val(value);
                                    });
                                });
                            </script>
@endsection
