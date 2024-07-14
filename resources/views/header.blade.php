<style>
    .navbar {
    background-color: #f8f9fa;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}
.navbar-brand {
    font-weight: bold;
}
.user-role {
    font-weight: bold;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
    border: 2px solid black;
    border-radius: 50%;
    text-align: center;
    font-size: small;
    white-space: nowrap; 
    width: min-content; 
    max-width: 100px; 
    overflow: hidden;
    text-overflow: ellipsis; 
}
.signout {
        display: none;
        position: absolute;
        top: 80%;
        left: 97%;
        transform: translateX(-50%);
        background-color: #f8f9fa;
        padding: 5px;
        border: 1px solid #000;
        border-radius: 4px;
        white-space: nowrap;
        cursor: pointer;
    }
    .user-role:hover .signout {
        display: block;
    }
</style>
<header class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid header">
        <!-- Toggle button for sidebar -->
        <a class="navbar-brand ms-3" href="{{route('dashboard')}}">Homepage</a>
        <div class="ms-auto">
            <div class="user-role">
                {{ $role_name }}
                <div class="signout"><a href="{{route('signout')}}">Sign Out</a></div>
            </div>
        </div>
    </div>
</header>