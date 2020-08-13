@extends('admin_temp')
@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('products')}}">{{trans('admin.nav_prod')}}</a></li>
                <li class="breadcrumb-item"> {{trans('admin.prod_showImage')}}</li>

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
                            <h4 class="card-title">{{trans('admin.prod_showImage')}} </h4>
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
                                {!! Form::open(['url' => 'Add_product_images/'.$product_id, 'files'=>true]) !!}


                                <div class="form-group">
                                    {!! Form::label('detail_image', trans('admin.prod_image_choose')) !!}
                                    {{ Form::file('image[]',array('accept'=>'image/*','class'=>'form-control','multiple'=>'multiple')) }}
                                </div>

                                <div class="form-group">
                                    <div class="clearfix">
                                        <button class="btn btn-success btn-block" type="submit" ><i class="fa fa-check"></i>{{trans('admin.public_save')}}</button>
                                    </div>

                                </div>

                                {!! Form::close() !!}

                                <h4 class="form-section"><i class="icon-image4"></i>  {{trans('admin.prod_photos')}} ({{ count($productImage) }})</h4>
                                <div class="card mb-3">
                                    <div class="card-header">

                                    </div>
                                    <div class="card-body">

                                        {!! Form::open(['url' => 'destroy_Product_images']) !!}
                                        @foreach($productImage as $row)

                                            <div class="col-md-2"
                                                 style="display: inline-block;">
                                                <img src="{{asset('/uploads/product/Detailimage/'.$row->image) }}" width="160" height="160">
                                                {!! Form::checkbox('deleteImages[]',$row->id,false,['class'=>'form-control']) !!}
                                            </div>
                                        @endforeach
                                        <div style="clear:both"></div>
                                        <br> <hr>
                                        {!! Form::submit(trans('admin.prod_deleteChoosen'), array('class'=>'btn btn-danger')) !!}
                                        {!! Form::close() !!}



                                    </div>

                                </div>


                            </div>
                        </div>


@endsection

