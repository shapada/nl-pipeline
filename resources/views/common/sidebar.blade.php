    <div class="c-sidebar c-sidebar-light c-sidebar-fixed c-sidebar-sm-show" id="sidebar">

        <div class="c-sidebar-brand d-md-down-none d-flex align-items-center p-y">
            <a class="c-sidebar-brand-full" href="#">
                <img src="{{ url('img/foresight-bank.svg') }}" style="width: 200px;">
            </a>
        </div>

        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa fa-tachometer">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('loan_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.loans.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/loans') || request()->is('admin/loans/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fa fa-file c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.loan.title') }}
                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }}">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw fa fa-users c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @can('permission_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route('admin.permissions.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route('admin.roles.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                    <i class="fa-fw fa fa-briefcase c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route('admin.users.index') }}" class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                    <i class="fa-fw fa fa-user c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fa fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="c-sidebar-nav-icon fa fa-fw fa-sign-out">

                    </i>
                    {{ trans('global.logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>

    </div>
