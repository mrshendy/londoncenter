        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/logo.png') }}" alt=""
                            style="height: 70px;width: 100% !important;">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" height="17"
                            style="height: 70px;width:100% !important;">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">{{ trans('main_trans.menu') }}</span></li>
                        @can('Dashboard1')
                            <li class="nav-item">
                                <a class="nav-link menu-link font" href="{{ url('/' . ($page = 'dashbord')) }}">
                                    <i class="mdi mdi-speedometer"></i> <span data-key="t-widgets">
                                        {{ trans('main_trans.dashboards') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('users1')
                            <!--user management-->
                            <li class="menu-title"><i class="ri-more-fill"></i> <span
                                    data-key="t-components">{{ trans('main_trans.user_management') }}</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link font @if (Route::currentRouteName() == 'roles.create' or
                                        Route::currentRouteName() == 'roles.index' or
                                        Route::currentRouteName() == 'roles.edit' or
                                        Route::currentRouteName() == 'roles.show') active @endif "
                                    href="#sidebaruser_management" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAuth">
                                    <i class="mdi mdi-account-lock-outline"></i> <span
                                        data-key="t-authentication">{{ trans('main_trans.users') }}</span>
                                </a>
                                <div class="collapse menu-dropdown  @if (Route::currentRouteName() == 'roles.create' ||
                                        Route::currentRouteName() == 'roles.index' ||
                                        Route::currentRouteName() == 'roles.show' ||
                                        Route::currentRouteName() == 'roles.index' ||
                                        Route::currentRouteName() == 'users.create' ||
                                        Route::currentRouteName() == 'users.index' ||
                                        Route::currentRouteName() == 'users.edit' ||
                                        Route::currentRouteName() == 'users.show') collapse show @endif "
                                    id="sidebaruser_management">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ url('/' . ($page = 'roles')) }}"
                                                class="nav-link font @if (Route::currentRouteName() == 'roles.create' ||
                                                        Route::currentRouteName() == 'roles.index' ||
                                                        Route::currentRouteName() == 'roles.edit' ||
                                                        Route::currentRouteName() == 'roles.show') active @endif">
                                                {{ trans('main_trans.role_management') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ url('/' . ($page = 'users')) }}"
                                                class="nav-link font @if (Route::currentRouteName() == 'users.create' ||
                                                        Route::currentRouteName() == 'users.index' ||
                                                        Route::currentRouteName() == 'users.edit' ||
                                                        Route::currentRouteName() == 'users.show') active @endif">
                                                {{ trans('main_trans.user_management') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endcan
                    
                        @can('settings')
                            <!--settings-->
                            <li class="menu-title"><i class="ri-more-fill"></i> <span
                                    data-key="t-components">{{ trans('main_trans.settings') }}</span></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link font" href="{{ url('/' . ($page = 'settings')) }}">
                                    <i class="mdi mdi-cog-outline"></i> <span
                                        data-key="t-widgets">{{ trans('main_trans.settings') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
