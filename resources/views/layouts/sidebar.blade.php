<nav class="col-2 d-none d-md-block bg-light sidebar sidebar-sticky pl-4">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item pb-3">
                <a class="nav-link {{ Request::path() == 'admin' ? 'active font-weight-600' : 'text-muted' }}" href="/admin">
                    <i class="mdi mdi-home-outline mr-3" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item pb-3">
                <a class="nav-link {{ Request::path() == 'admin/employees' ? 'active font-weight-600' : 'text-muted' }}" href="/admin/employees">
                    <i class="mdi mdi-account-outline mr-3" aria-hidden="true"></i>
                    Employees
                </a>
            </li>
            <li class="nav-item pb-3">
                <a class="nav-link {{ Request::path() == 'admin/attendance' ? 'active font-weight-600' : 'text-muted' }}" href="/admin/attendance">
                    <i class="mdi mdi-format-list-numbers mr-3"></i>
                    Attendance
                </a>
            </li>
            <li class="nav-item pb-3">
                <a class="nav-link {{ Request::path() == 'admin/notifications' ? 'active font-weight-600' : 'text-muted' }}" href="/admin/notifications">
                    <i class="mdi mdi-bell-outline mr-3"></i>
                    Notifications
                </a>
            </li>
        </ul>
    </div>
</nav>