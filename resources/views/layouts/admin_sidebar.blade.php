<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">

    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

            <li class=" nav-item">
                <a href="{{url('home')}}"><i class="icon-home3"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_home')}}</span></a>

            </li>

            <li class=" nav-item">
                <a href="{{url('managers')}}"><i class="icon-users"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_Manager')}}</span></a>

            </li>

            <li class=" nav-item">
                <a href="{{url('subscribers')}}"><i class="icon-briefcase4"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_Subscribers')}}</span></a>

            </li>

            <li class=" nav-item">
                <a href="{{url('salons')}}"><i class="icon-weather24"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_Salons')}}</span></a>

            </li>

            <li class=" nav-item">
                <a href="{{url('sponsered')}}"><i class="icon-cash"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_sponsered')}}</span></a>

            </li>

            <li class=" nav-item">
                <a href="{{url('categories')}}"><i class="icon-users"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_cat')}}</span></a>

            </li>
            <li class=" nav-item">
                <a href="{{url('services')}}"><i class="icon-users"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_serv')}}</span></a>

            </li>
            <li class=" nav-item">
                <a href="{{url('products')}}"><i class="icon-users"></i>
                    <span data-i18n="nav.dash.main"
                          class="menu-title">{{trans('admin.nav_prod')}}</span></a>

            </li>


        </ul>

        {{--        </ul>--}}
    </div>
    <!-- /main menu content-->

</div>
<!-- / main menu-->
