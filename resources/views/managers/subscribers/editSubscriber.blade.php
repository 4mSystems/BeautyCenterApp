@extends('admin_temp')

@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">Update Subscriber</h4>

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
                            <div class="card-block">



                                {!! Form::model($data, ['route' => ['subscribers.update',$data->id] , 'method'=>'PUT']) !!}
                                    <div class="form-body">

                                        <div class="form-group">
                                            {!! Form::label('name', 'Subscriber Name') !!}
                                            {!! Form::text('name',$data->name,['class'=>'form-control', 'placeholder'=>'Enter The Name']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('Price', 'Price') !!}
                                            {!! Form::text('name',$data->Price,['class'=>'form-control', 'placeholder'=>'Enter The Price']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('period', 'period') !!}
                                            {!! Form::text('period',$data->period,['class'=>'form-control', 'placeholder'=>'Enter The period']) !!}

                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('desc', 'Discription') !!}
                                            {!! Form::textarea('desc',$data->desc,['class'=>'form-control', 'placeholder'=>'Enter The desc']) !!}

                                        </div>

                                    </div>

                                    <div class="form-actions right">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="icon-cross2"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> Save
                                        </button>
                                    </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

