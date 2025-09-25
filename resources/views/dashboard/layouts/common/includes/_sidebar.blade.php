<!-- { navigation menu } start -->
<aside class="app-sidebar app-light-sidebar">
    <div class="app-navbar-wrapper">
        <div class="brand-link brand-logo">
            <a href="{{ guard_dashboard_route() }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ $logo }}" alt="" class="logo logo-lg" width="223" height="35" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="app-navbar">
                <li class="nav-item {{ is_active('admin.dashboard') }}">
                    <a href="{{ guard_dashboard_route() }}" class="nav-link">
                        <span class="nav-icon">
                            <i class="ti ti-layout-2"></i>
                        </span>
                        <span class="nav-text">{{trans('dashboard/header.main_dashboard') }}</span>

                    </a>
                </li>
                <!-- Start AdminPanelSetting -->
                <li class="nav-item nav-hasmenu
                    {{ is_open([
                                'admin.mainSettings.index',
                            ]) }}
                ">
                    <a href="#!" class="nav-link">
                        <span class="nav-icon"><i class="ti ti-layout-2"></i></span>
                        <span class="nav-text">{{ trans('dashboard/sidebar.admin_main_settings_sidebar_title') }}</span>
                        <span class="nav-arrow"><i data-feather="{{ chevron_direction() }}"></i></span>
                    </a>
                    <ul class="nav-submenu">
                        <!-- Main Settings -->
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('admin.mainSettings.index') }}"
                                href="{{ route('admin.mainSettings.index') }}">
                                {{ trans('dashboard/sidebar.main_settings_sidebar_title') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End AdminPanelSetting -->
                <!-- Start Driver -->
                <li class="nav-item nav-hasmenu{{ is_open(['admin.logistic.drivers.index',]) }}">
                    <a href="#!" class="nav-link">
                        <span class="nav-icon"><i class="ti ti-layout-2"></i></span>
                        <span class="nav-text">السائقين</span>
                        <span class="nav-arrow"><i data-feather="{{ chevron_direction() }}"></i></span>
                    </a>
                    <ul class="nav-submenu">
                        <!-- Main Settings -->
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('admin.logistic.drivers.index') }}"
                                href="{{ route('admin.logistic.drivers.index') }}">
                                السائقين
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Driver -->
                <!-- Start vehicles -->
                <li class="nav-item nav-hasmenu{{ is_open(['admin.logistic.vehicles.index',]) }}">
                    <a href="#!" class="nav-link">
                        <span class="nav-icon"><i class="ti ti-layout-2"></i></span>
                        <span class="nav-text">المركبات</span>
                        <span class="nav-arrow"><i data-feather="{{ chevron_direction() }}"></i></span>
                    </a>
                    <ul class="nav-submenu">
                        <!-- vehicles -->
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('admin.logistic.vehicles.index') }}"
                                href="{{ route('admin.logistic.vehicles.index') }}">
                                المركبات
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End vehicles -->
                <!-- Start clients -->

                <li class="nav-item nav-hasmenu{{ is_open(['admin.logistic.clients.index',]) }}">
                    <a href="#!" class="nav-link">
                        <span class="nav-icon"><i class="ti ti-layout-2"></i></span>
                        <span class="nav-text">العملاء</span>
                        <span class="nav-arrow"><i data-feather="{{ chevron_direction() }}"></i></span>
                    </a>
                    <ul class="nav-submenu">
                        <!-- clients -->
                        <li class="nav-item">
                            <a class="nav-link {{ is_active('admin.logistic.clients.index') }}"
                                href="{{ route('admin.logistic.clients.index') }}">
                                عملاء اللوجستيه
                            </a>
                            <a class="nav-link {{-- is_active('admin.logistic.clients.index') --}}" href="{{-- route('admin.logistic.clients.index') --}}">
                                عملاء التخليص الجمركى
                            </a>
                        </li>
                    </ul>









            </ul>
        </div>
    </div>
</aside>
<!-- { navigation menu } end -->
