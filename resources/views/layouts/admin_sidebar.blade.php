<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">

    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" nav-item"><a href="{{url('home')}}"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">{{trans('admin.nav_home')}}</span></a>

            </li>

              <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">{{trans('admin.nav_pages')}}</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('managers')}}" data-i18n="nav.page_layouts.1_column" class="menu-item">{{trans('admin.nav_Manager')}}</a>
                    </li>

                    <li><a  href="{{ URL::to('subscribers') }}" data-i18n="nav.page_layouts.2_columns" class="menu-item">{{trans('admin.nav_Subscribers')}}</a>
                    </li>

                    <li><a href="{{url('salons')}}" data-i18n="nav.page_layouts.boxed_layout" class="menu-item">{{trans('admin.nav_Salons')}}</a>
                    </li>

                    <li><a href="{{url('sponsered')}}" data-i18n="nav.page_layouts.static_layout" class="menu-item">{{trans('admin.nav_sponsered')}}</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /main menu content-->

</div>
<!-- / main menu-->
