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
                <li class="breadcrumb-item"> <a href="{{url('subscribers')}}">{{trans('admin.nav_Subscribers')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.Add_sub_title')}}
                </li>

            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">{{trans('admin.Add_sub_title')}}</h4>

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



                                <form role="form" class="form-horizontal" method="POST" action="{{ URL::to('subscribers') }}">
                                    @csrf
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label for="userinput5">{{trans('admin.name')}}</label>
                                            <input class="form-control border-primary" name ="name" type="text" placeholder={{trans('admin.name')}}
                                            required   id="userinput5">
                                            @if ($errors->has('name'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="userinput6">{{trans('admin.price')}}</label>
                                            <input class="form-control border-primary" name ="price" type="text" placeholder={{trans('admin.price')}}
                                                required   id="userinput6">
                                            @if ($errors->has('price'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>{{trans('admin.period')}}</label>
                                            <input class="form-control border-primary" name ="period" id="userinput7" type="text"
                                                   required title="this field required"  placeholder={{trans('admin.period')}}>
                                            @if ($errors->has('period'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('period') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="userinput8">{{trans('admin.desc')}}</label>
                                            <textarea id="userinput8" rows="5" class="form-control border-primary"
                                                      name="desc" placeholder={{trans('admin.desc')}}></textarea>
                                            @if ($errors->has('desc'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-actions right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icon-check2"></i> {{trans('admin.public_Add')}}
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
            @endsection

