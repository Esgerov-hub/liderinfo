<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"></li>

                <li>
                    <a href="{{ route('admin.home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}" class="waves-effect">
                        <i class="bx bxs-city"></i>
                        <span key="t-dashboards">Kateqoryalar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}" class="waves-effect">
                        <i class="fa fa-newspaper"></i>
                        <span key="t-dashboards">Xəbərlər</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.social.edit','az') }}" class="waves-effect">
                        <i class="fa fa-server"></i>
                        <span key="t-dashboards">Sosial şəbəkə linkləri</span>
                    </a>
                </li>
               {{-- <li>
                    <a href="{{ route('admin.users.index') }}" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span key="t-dashboards">Sistem adminləri</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.static-pages.index') }}" class="waves-effect">
                        <i class="bx bxs-package"></i>
                        <span key="t-dashboards">Statik Səhifələr</span>
                    </a>
                </li>--}}

                <li>
                    <a href="{{ route('admin.site-words.edit','az') }}" class="waves-effect">
                        <i class="bx bxs-flag"></i>
                        <span key="t-dashboards">Saytda statik sözlər</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
