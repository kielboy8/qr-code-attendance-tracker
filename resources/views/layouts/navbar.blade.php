<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mb-0 col-sm-3 col-md-2 mr-0 ml-0" href="/">
        <i class="mdi mdi-qrcode"></i>
        Attendance
        <small class="text-muted">dev</small>
    </a>
    <div id="navbarNavDropdown" class="navbar-collapse collapse d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item lead">
                <a class="nav-link" href="/login">Login</a>
            </li>
            @else
            <li class="nav-item dropdown lead pt-1 mr-2" id="markAsRead">
                <a class="nav-link dropdown-toggle" id="notificationsIcon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge badge-primary mb-2">{{ count(auth()->user()->unreadNotifications) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow border-0 px-3 py-2" aria-labelledby="notificationsIcon">
                    <p class="dropdown-header border-bottom py-2 mb-2 px-2">Notifications</p>
                    @forelse(auth()->user()->unreadNotifications as $notification)
                    @include('notifications.notificationLink')
                    @empty
                    <a class="dropdown-item px-2" href="#">No unread notifications.</a>
                    @endforelse
                </div>
            </li>
            <li class="nav-item lead pt-1">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
            @endif
        </ul>
    </div>
</nav>