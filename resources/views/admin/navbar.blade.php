<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Home</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    @guest('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">login</a>
                        </li>
                    @endguest
    
                    @auth('admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Admins</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-admin') }}">All Admins</a>
                                <a class="dropdown-item" href="{{ route('admin.add-admin') }}">Add Admin</a>
                                <a class="dropdown-item" href="{{ route('admin.deleted-admin') }}">Deleted Admins</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Users</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-user') }}">All Users</a>
                                <a class="dropdown-item" href="{{ route('admin.add-user') }}">Add User</a>
                                <a class="dropdown-item" href="{{ route('admin.deleted-user') }}">Deleted Users</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Catgeories</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-category') }}">All Categories</a>
                                <a class="dropdown-item" href="{{ route('admin.add-category') }}">Add Categories</a>
                                <a class="dropdown-item" href="{{ route('admin.deleted-category') }}">Deleted Categories</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Items</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-item') }}">All Items</a>
                                <a class="dropdown-item" href="{{ route('admin.add-item') }}">Add Items</a>
                                <a class="dropdown-item" href="{{ route('admin.deleted-item') }}">Deleted Items</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Orders</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.order') }}">All Orders</a>
                                <a class="dropdown-item" href="{{ route('admin.delivered-order') }}">Delivered Orders</a>
                                <a class="dropdown-item" href="{{ route('admin.pending-order') }}">Pending Orders</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">{{ Auth::guard('admin')->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
  <script src="https://fastly.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
  </script>

  <script src="https://fastly.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js">
  </script>
</body>

</html>