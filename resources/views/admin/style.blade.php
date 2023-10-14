<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link href='{{ asset('style/css/bootstrap.min.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
    @livewireStyles()
</head>

<body>

    <div class='container-fluid'>
        <div class='row'>
            @include('admin.navbar')
            @yield('livewire')
        </div>
    </div>
    @livewireScripts()
    <script src="{{ asset('style/js/jquery.min.js') }}"></script>
    <script src="{{ asset('style/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
</body>

</html>
