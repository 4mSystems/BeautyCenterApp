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
        .rating {
            display: flex;
            width: 100%;
            justify-content: center;
            overflow: hidden;
            flex-direction: row-reverse;
            position: relative;
            margin-bottom:20px;
        }

        .rating-0 {
            filter: grayscale(100%);
        }

        .rating > input {
            display: none;
        }

        .rating > label {
            cursor: pointer;
            width: 40px;
            height: 40px;
            margin-top: auto;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 76%;
            transition: .3s;
        }

        .rating > input:checked ~ label,
        .rating > input:checked ~ label ~ label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        }


        .rating > input:not(:checked) ~ label:hover,
        .rating > input:not(:checked) ~ label:hover ~ label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
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
                                            <div class="rating">
                                                <input type="radio" name="rate" id="rating-5" value="5">
                                                <label for="rating-5"></label>
                                                <input type="radio" name="rate" id="rating-4" value="4">
                                                <label for="rating-4"></label>
                                                <input type="radio" name="rate" id="rating-3" value="3">
                                                <label for="rating-3"></label>
                                                <input type="radio" name="rate" id="rating-2" value="2">
                                                <label for="rating-2"></label>
                                                <input type="radio" name="rate" id="rating-1" value="1">
                                                <label for="rating-1"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="center">
                                        {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1']) }}

                                    </div>

                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

