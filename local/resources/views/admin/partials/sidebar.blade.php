<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @if( Auth::guard('admin')->user()->permiss == \App\Models\Admin::ADMIN_PERMISSION )
                <li class="@if (Request::segment(2) == 'account') active @endif">
                    <a href="{{asset('admin/account')}}"
                       >
                        <i class="fa fa-users"></i> <span>Quản lý admin</span>
                    </a>
                </li>
            @endif

            <li class="@if (Request::segment(2) == 'customer-info') active @endif">
                <a href="{{ route('customer_info') }}">
                    <i class="fa fa-gear"></i> <span>Danh sách đăng ký</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

            {{--<li class="@if (Request::segment(2) == 'config') active @endif">--}}
                {{--<a href="{{ asset('admin/config') }}">--}}
                    {{--<i class="fa fa-gear"></i> <span>Cài đặt website</span>--}}
                    {{--<span class="pull-right-container"></span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="@if (Request::segment(2) == 'website_info') active @endif">--}}
                {{--<a href="{{ route('website_info') }}">--}}
                    {{--<i class="fa fa-info"></i> <span>Cài đặt thông tin website</span>--}}
                    {{--<span class="pull-right-container"></span>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li class="">
                <a href="{{ route('website_info') }}">
                    <i class="fa fa-info"></i> <span>Đăng xuất</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>