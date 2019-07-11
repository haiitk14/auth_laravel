<!-- Left Sidebar -->
<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a href="{{ route('adminHome') }}"@php if ($controller == 'DashboardController') echo ' class="active"'; @endphp><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-object-group" aria-hidden="true"></i><span> {{ __('Servies') }} </span> </a>
                </li>
                <li class="submenu">
                    <a href="#" class="subdrop"><i class="fa fa-book" aria-hidden="true"></i> <span> {{ __('Categorys') }} </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: block;" >
                        <li><a href="{{ route('admin.customer') }}">{{ __('Customers') }}</a></li>
                        <li><a href="{{ route('admin.product') }}">{{ __('Products') }}</a></li>
                        <li><a href="{{ route('admin.manufature') }}">{{ __('Manufature') }}</a></li>
                        <li><a href="{{ route('admin.ingredient') }}">{{ __('Ingredient') }}</a></li>
                        <li><a href="{{ route('admin.formula') }}">{{ __('Formula') }}</a></li>
                        <li><a href="{{ route('admin.comment') }}">{{ __('Comments') }}</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#" class="subdrop"><i class="fa fa-user-o" aria-hidden="true"></i> <span> {{ __('Report') }} </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: block;">
                        <li><a href="{{ route('admin.report.salesorder') }}">{{ __('Sales Order') }}</a></li>
                        </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- End Sidebar -->