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
            <a class="navbar-brand" href="{{ route('home') }}">@lang('lang.home')</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
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
                                aria-haspopup="true" aria-expanded="false">@lang('lang.admins')</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-admin') }}">@lang('lang.all admins')</a>
                                <a class="dropdown-item" href="{{ route('admin.add-admin') }}">@lang('lang.add admins')</a>
                                <a class="dropdown-item" href="{{ route('admin.deleted-admin') }}">@lang('lang.deleted admins')</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">@lang('lang.users')</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-user') }}">@lang('lang.all users')</a>
                                <a class="dropdown-item" href="{{ route('admin.add-user') }}">@lang('lang.add users')</a>
                                <a class="dropdown-item" href="{{ route('admin.deleted-user') }}">@lang('lang.deleted users')</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">@lang('lang.categories')</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-category') }}">@lang('lang.all categories')</a>
                                <a class="dropdown-item" href="{{ route('admin.add-category') }}">@lang('lang.add categories')</a>
                                <a class="dropdown-item"
                                    href="{{ route('admin.deleted-category') }}">@lang('lang.deleted categories')</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">@lang('lang.items')</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.all-item') }}">@lang('lang.all items')</a>
                                <a class="dropdown-item" href="{{ route('admin.add-item') }}">@lang('lang.add items')</a>
                                <a class="dropdown-item" href="{{ route('admin.deleted-item') }}">@lang('lang.deleted items')</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">@lang('lang.orders')</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('admin.order') }}">@lang('lang.all orders')</a>
                                <a class="dropdown-item" href="{{ route('admin.delivered-order') }}">@lang('lang.delivired orders')</a>
                                <a class="dropdown-item" href="{{ route('admin.pending-order') }}">@lang('lang.pending orders')</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> <i class="fa fa-language"
                                    aria-hidden="true"></i> @lang('lang.language')</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="{{ route('ar') }}">@lang('lang.ar')</a>
                                <a class="dropdown-item" href="{{ route('en') }}">@lang('lang.en')</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">{{ Auth::guard('admin')->user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}">@lang('lang.logout')</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://fastly.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://fastly.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
