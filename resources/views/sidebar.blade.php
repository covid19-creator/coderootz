<style>
    .sidebar {
    width: 250px;
    background-color: #343a40;
    color: #fff;
    transition: transform 0.3s ease;
    position: fixed;
    top: 56px; /* Height of the navbar */
    left: 0;
    bottom: 0;
    overflow-y: auto;
    padding-top: 20px;
    transform: translateX(-250px); /* Start with sidebar hidden */
}
.sidebar.show {
    transform: translateX(0);
}
.sidebar-header {
    padding: 20px;
    text-align: center;
    background-color: #212529;
}
.sidebar-header h3 {
    margin-bottom: 0;
    font-size: 1.5rem;
}
.sidebar-menu {
    list-style-type: none;
    padding-left: 0;
    margin-top: 20px;
}
.sidebar-menu-item {
    margin-bottom: 10px;
}
.sidebar-menu-link {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    display: block;
    transition: background-color 0.3s ease;
}
.sidebar-menu-link:hover {
    background-color: #495057;
}
.content {
    flex: 1;
    padding: 20px;
    transition: margin-left 0.3s ease;
    margin-left: 0; /* Initially, content aligns with sidebar hidden */
    background-color: #f8f9fa; /* Adjust background color of content */
     /* margin-top: px; Height of the navbar */
}
.content.shifted {
    margin-left: 250px; /* Shift content when sidebar is shown */
}
</style>

<nav id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h3>Sidebar</h3>
            </div>
            <ul class="sidebar-menu">
                @if(isset($menus))
                    @foreach($menus as $menu)
                        <li class="sidebar-menu-item">
                        <a href="{{ route($menu->route) }}" class="sidebar-menu-link" data-content="{{ $menu->name }}" data-api="{{ route('user_management') }}"><i class="fas fa-home"></i> &nbsp;{{ $menu->name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </nav>

        <div id="content" class="content">
            <button class="navbar-toggler" type="button" id="sidebarToggle">
                <i class="fas fa-bars"></i> <!-- Font Awesome bars icon -->
            </button>
            <div id="subcontent" class="subcontent">

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('content').classList.toggle('shifted');
        });
</script>