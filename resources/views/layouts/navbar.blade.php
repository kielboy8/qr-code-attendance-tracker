<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mb-0 col-sm-3 col-md-2 mr-0 ml-0" href="/">
        <i class="mdi mdi-qrcode"></i>
        Attendance
        <small class="text-muted">dev</small>
    </a>
    <div id="navbarNavDropdown" class="navbar-collapse collapse">
        <ul class="navbar-nav mr-auto">

        </ul>
        <ul class="navbar-nav">
            @guest
            <li class="nav-item">
                <a class="nav-link lead" href="/login">Login</a>
            </li>
            @else
            <li class="nav-item dropdown" id="markAsRead">
                <a class="nav-link lead dropdown-toggle" id="notificationsIcon" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="mdi mdi-bell-outline"></i>
                    {{ count(auth()->user()->unreadNotifications) }}
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow border-0 px-3 py-2" aria-labelledby="notificationsIcon">
                    <p class="dropdown-header border-bottom py-2 mb-2 px-2">Notifications</p>
                    @forelse(auth()->user()->unreadNotifications as $notification)
                    @include('notifications.' . snake_case(class_basename($notification->type)))
                    @empty
                    <a class="dropdown-item px-2" href="#">No unread notifications.</a>
                    @endforelse
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link lead" href="/logout">Logout</a>
            </li>
            @endif
        </ul>
    </div>
</nav>