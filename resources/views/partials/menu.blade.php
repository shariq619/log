<!-- Sidebar -->
<div class="sidebar" data-color="orange" data-background-color="white">
    <!-- Brand Logo -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-wrapper">
        <ul class="nav" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <p>
                        <i class="fas fa-fw fa-tachometer-alt">

                        </i>
                        <span>{{ trans('global.dashboard') }}</span>
                    </p>
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#user_management">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <p>
                            <span>{{ trans('cruds.userManagement.title') }}</span>
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse show" id="user_management">
                        <ul class="nav">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <span>{{ trans('cruds.permission.title') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <span>{{ trans('cruds.role.title') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <span>{{ trans('cruds.user.title') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan




            @can('region_access')
                <li class="nav-item">
                    <a href="{{ route("admin.regions.index") }}"
                       class="nav-link {{ request()->is('admin/regions') || request()->is('admin/regions/*') ? 'active' : '' }}">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span>{{ trans('cruds.region.title') }}</span>
                    </a>
                </li>
            @endcan

            @can('district_access')
                <li class="nav-item">
                    <a href="{{ route("admin.districts.index") }}"
                       class="nav-link {{ request()->is('admin/districts') || request()->is('admin/districts/*') ? 'active' : '' }}">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span>{{ trans('cruds.district.title') }}</span>
                    </a>
                </li>
            @endcan

            @can('land_status_access')
                <li class="nav-item">
                    <a href="{{ route("admin.land_status.index") }}"
                       class="nav-link {{ request()->is('admin/land-status') || request()->is('admin/land-status/*') ? 'active' : '' }}">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span>{{ trans('cruds.land_status.title') }}</span>
                    </a>
                </li>
            @endcan


            @can('species_access')
                <li class="nav-item">
                    <a href="{{ route("admin.species.index") }}"
                       class="nav-link {{ request()->is('admin/species') || request()->is('admin/species/*') ? 'active' : '' }}">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span>{{ trans('cruds.species.title') }}</span>
                    </a>
                </li>
            @endcan


            @can('tdp_access')
                <li class="nav-item">
                    <a href="{{route('admin.tdp.list.index')}}" class="nav-link">
                        <p>
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>TDP</span>
                        </p>
                    </a>
                </li>
            @endcan

            @can('tdp_reports')
                <li class="nav-item">
                    <a href="{{route('admin.reports')}}" class="nav-link">
                        <p>
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Reports</span>
                        </p>
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <p>
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>{{ trans('global.logout') }}</span>
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
