<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is("dashboard")? "active" : "" }}" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is("dashboard/post*"))? "active" : "" }}" href="/dashboard/post">Pendaftaran TRY OUT SNBT</a>
            </li>
        </ul>
    </div>
</nav>