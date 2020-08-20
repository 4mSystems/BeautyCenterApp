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

            @if(Auth::user()->type == "manager")
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

            @endif

            @if(Auth::user()->type == "salon")
                <li class=" nav-item">
                    <a href="{{url('categories')}}"><i class="icon-ios-list"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_cat')}}</span></a>

                </li>
                <li class=" nav-item">
                    <a href="{{url('services')}}"><i class="icon-ios-paper"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_serv')}}</span></a>

                </li>
                <li class=" nav-item">
                    <a href="{{url('products')}}"><i class="icon-ios-medkit"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_prod')}}</span></a>

                </li>
                <li class=" nav-item"><a href="#"><i class="icon-ios-timer"></i><span data-i18n="nav.project.main"
                                                                                      class="menu-title">{{trans('admin.nav_reservations')}}</span></a>
                    <ul class="menu-content">

                        <li class=" nav-item">
                            <a href="{{url('reservations')}}"><i class="icon-ios-timer"></i>
                                <span data-i18n="nav.dash.main"
                                      class="menu-title">{{trans('admin.nav_Servicereservations')}}</span></a>

                        </li>
                        <li class=" nav-item">
                            <a href="{{url('productreservations')}}"><i class="icon-ios-timer"></i>
                                <span data-i18n="nav.dash.main"
                                      class="menu-title">{{trans('admin.nav_Productreservations')}}</span></a>

                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href="{{url('sponser_ads')}}"><i class="icon-loader"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_product_sponsered')}}</span></a>
                </li>
                <li class=" nav-item">
                    <a href="{{url('offers')}}"><i class="icon-ios-timer"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_offers')}}</span></a>

                </li>
                <li class=" nav-item">
                    <a href="{{url('salonUsers')}}"><i class="icon-users2"></i>
                        <span data-i18n="nav.dash.main"
                              class="menu-title">{{trans('admin.nav_users')}}</span></a>

                </li>
            @endif

        </ul>

        {{--        </ul>--}}
    </div>
    <!-- /main menu content-->

</div>
<!-- / main menu-->
