
@include('layouts.admin_header')
@include('layouts.admin_head')

@include('layouts.admin_sidebar')

@yield('content')

@include('layouts.errors')
@include('layouts.messages')

@include('layouts.admin_footer')
