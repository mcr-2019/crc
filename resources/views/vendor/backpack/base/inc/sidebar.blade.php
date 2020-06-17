@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">Mycarrental</li>
                @if(Auth::user()->hasPermissionTo(\App\Models\Permission::PERMISSION_NEWS))
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/news') }}"><i class="fa fa-book"></i> <span>Заказы</span></a></li>
                @endif

                @if(Auth::user()->hasPermissionTo(\App\Models\Permission::PERMISSION_CARS))
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/cars_with_driver') }}"><i class="fa fa-car"></i> <span>Машины с водителем</span></a></li>
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/cars_without_driver') }}"><i class="fa fa-car"></i> <span>Машины без водителя</span></a></li>
                @endif

                <li class="header">Пользователь</li>
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/edit-account-info') }}"><i class="fa fa-user"></i> <span>Мой аккаунт</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/change-password') }}"><i class="fa fa-key"></i> <span>Смена пароля</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
@endif
