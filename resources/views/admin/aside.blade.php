<aside class="main-sidebar sidebar-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                @auth
                    <a href="#" class="d-block" style="font-family: 'Cairo';">مرحبا، {{ Auth::user()->name }}</a>
                @else
                    <a href="#" class="d-block" style="font-family: 'Cairo';">مرحبا، زائر</a>
                @endauth
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="font-family: 'Cairo';">

                <!-- واجهة الموقع -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-codepen"></i>
                        <p>
                            واجهة الموقع
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('links.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-globe"></i>
                                <p> الروابط</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-images"></i>
                                <p>معرض الصور</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('statistics.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>الاحصائيات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('services.index') }}" class="nav-link">
                                <i class="nav-icon fab fa-servicestack"></i>
                                <p>الخدمات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employees.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>فريق العمل</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reviews.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-star"></i>
                                <p>المرجعات</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- الطلبات -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            الطلبات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('appointments.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-concierge-bell"></i>
                                <p>الحجوزات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('applications.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>التوظيف</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('trainings.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>التدريب</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- المدونة -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            المدونة
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>التصنيفات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blogs.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-pen"></i>
                                <p>التدوينات</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- الفرص الاستثمارية -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            الفرص الاستثمارية
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('investment-categories.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>القطاعات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('investment-opportunities.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>الفرص الاستثمارية</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- المستخدمين -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            المستخدمين
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>عرض المستخدمين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>إضافة مستخدم</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- تسجيل الخروج -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; color: inherit; padding: 0; cursor: pointer;">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>تسجيل الخروج</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
