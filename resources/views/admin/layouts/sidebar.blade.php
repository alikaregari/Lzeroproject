<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="{{route('admin.dashboard')}}" class="nav-link {{is_Active('admin.dashboard','active')}}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    @can('show_users')
                        <li class="nav-item has-treeview {{is_Active(['admin.user.index','admin.user.create','admin.user.edit'],'menu-open')}}">
                            <a href="#" class="nav-link {{is_Active(['admin.user.index','admin.user.create','admin.user.edit'],'active')}}">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.user.index')}}" class="nav-link {{is_Active('admin.user.index','active')}}">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>لیست</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.user.create')}}" class="nav-link {{is_Active('admin.user.create','active')}}">
                                        <i class="fa fa-user-plus nav-icon"></i>
                                        <p>ایجاد کاربر</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('show_permissions')
                        <li class="nav-item has-treeview {{is_Active(['admin.permissions.index','admin.permissions.create','admin.permissions.edit'],'menu-open')}}">
                            <a href="#" class="nav-link {{is_Active(['admin.permissions.index','admin.permissions.create','admin.permissions.edit'],'active')}}">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    دسترسی ها
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.permissions.index')}}" class="nav-link {{is_Active('admin.permissions.index','active')}}">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>لیست دسترسی ها</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.permissions.create')}}" class="nav-link {{is_Active('admin.permissions.create','active')}}">
                                        <i class="fa fa-user-plus nav-icon"></i>
                                        <p>ایجاد دسترسی</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('show_rules')
                    <li class="nav-item has-treeview {{is_Active(['admin.rules.index','admin.rules.create','admin.rules.edit'],'menu-open')}}">
                        <a href="#" class="nav-link {{is_Active(['admin.rules.index','admin.rules.create','admin.rules.edit'],'active')}}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                مقام ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.rules.index')}}" class="nav-link {{is_Active('admin.rules.index','active')}}">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>لیست مقام ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.rules.create')}}" class="nav-link {{is_Active('admin.rules.create','active')}}">
                                    <i class="fa fa-user-plus nav-icon"></i>
                                    <p>ایجاد مقام</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('show_products')
                        <li class="nav-item has-treeview {{is_Active(['admin.products.index','admin.products.create','admin.products.edit'],'menu-open')}}">
                            <a href="#" class="nav-link {{is_Active(['admin.products.index','admin.products.create','admin.products.edit'],'active')}}">
                                <i class="nav-icon fa fa-cube"></i>
                                <p>
                                    محصولات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.products.index')}}" class="nav-link {{is_Active('admin.products.index','active')}}">
                                        <i class="fa fa-cubes nav-icon"></i>
                                        <p>لیست محصولات</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.products.create')}}" class="nav-link {{is_Active('admin.products.create','active')}}">
                                        <i class="fa fa-cube nav-icon"></i>
                                        <p>ایجاد محصول</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endcan
                 </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
