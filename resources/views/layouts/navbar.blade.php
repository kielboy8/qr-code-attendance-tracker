<nav class="navbar navbar-light py-2 flex-md-nowrap">
    <a class="navbar-brand mb-0 col-sm-3 col-md-2 mr-0" href="#">
    	<i class="mdi mdi-qrcode"></i>
    	Attendance
    </a>
    <ul class="navbar-nav px-3">
    	@guest
        <li class="nav-item text-nowrap">
            <a class="nav-link lead" href="/login">Login</a>
        </li>
        @else
        <li class="nav-item text-nowrap">
            <a class="nav-link lead" href="/logout">Logout</a>
        </li>
        @endif
    </ul>
</nav>