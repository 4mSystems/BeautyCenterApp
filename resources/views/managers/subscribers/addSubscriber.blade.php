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
                            <h4 class="card-title" id="basic-layout-colored-form-control">Add Subscriber</h4>

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
                                            <label for="userinput5">Name</label>
                                            <input class="form-control border-primary" name ="name" type="text" placeholder="name"
                                            required   id="userinput5">
                                            @if ($errors->has('name'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="userinput6">Price</label>
                                            <input class="form-control border-primary" name ="price" type="text" placeholder="price"
                                                required   id="userinput6">
                                            @if ($errors->has('price'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>period</label>
                                            <input class="form-control border-primary" name ="period" id="userinput7" type="text"
                                                   required title="this field required"  placeholder="period">
                                            @if ($errors->has('period'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('period') }}</strong>
                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="userinput8">Discription</label>
                                            <textarea id="userinput8" rows="5" class="form-control border-primary"
                                                      name="desc" placeholder="Discription"></textarea>
                                            @if ($errors->has('desc'))
                                                <span class="danger" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                            @endif
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
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
            @endsection

