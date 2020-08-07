
@extends('admin_temp')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/colors/palette-gradient.css') }}">
@endsection

@section('content')
    {{--Main Menu--}}

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- stats -->

                <h1>Blank page</h1>
                {{--                Write your content here ...--}}





            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('/app-assets/js/scripts/pages/dashboard-lite.js') }}" type="text/javascript"></script>
@endsection
