<!doctype html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href='{{ asset('style/css/bootstrap.min.css') }}' rel='stylesheet'>
    <title>@yield('title')</title>
    <!-- fonts files -->
    <link href='http://fonts.googleapis.com/css?family=Cabin:400,500,400italic,600,600italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Font awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Owl carousel css -->
    <link rel="stylesheet" href={{ asset('style/css/owl.carousel.css') }}>
    <link rel="stylesheet" href={{ asset('style/css/owl.transitions.css') }}>
    <link rel="stylesheet" href={{ asset('style/css/owl.theme.css') }}>

    <!-- bx-slider css -->
    <link rel="stylesheet" href={{ asset('style/css/jquery.bxslider.css') }}>

    <!-- bootstrap select css -->
    <link rel="stylesheet" href={{ asset('style/css/bootstrap-select.min.css') }}>

    <!-- lightbox css -->
    <link rel="stylesheet" href={{ asset('style/css/lightbox.css') }}>

    <!-- Revolution slider css -->
    <link href={{ asset('style/js/rs-plugin/css/settings.css') }} rel="stylesheet" />

    <!-- Bootstrap css -->
    <link rel="stylesheet" href={{ asset('style/css/bootstrap.css') }}>

    <!-- Bootstrap5 css -->
    {{-- <link rel="stylesheet" href={{ asset('style/css/bootstrap5.min.css') }}> --}}


    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" href={{ asset('style/images/apple-touch-icon-precomposed.png') }}>
    <link rel="shortcut icon" type="image/ico" href={{ asset('style/images/favicon.ico') }}>
    <!-- Custom css -->
    <link rel="stylesheet" href={{ asset('style/css/style.css') }}>
    <link rel="stylesheet" href={{ asset('style/css/responsive.css') }}>

    @livewireStyles()
</head>

<body>

    <div class='container-fluid'>
        <div class='row'>
            @if (Auth::guard('user')->check())
                @auth('user')
                    <livewire:user.navbar />
                @endauth
            @else
                @guest('user')
                    @include('user.guestnavbar')
                @endguest
            @endif
            @yield('livewire')
        </div>
    </div>
    @include('user.footer')
    @livewireScripts()
    <!-- JS Files -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 150,
                max: 1500,
                values: [520, 1100],
                slide: function(event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });
    </script>

    <script src="{{ asset('style/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('style/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('style/js/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('style/js/jquery.bxslider.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slider8').bxSlider({
                mode: 'vertical',
                slideWidth: 300,
                minSlides: 3,
                slideMargin: 10
            });
            $('.slider9').bxSlider({
                mode: 'vertical',
                slideWidth: 300,
                minSlides: 3,
                slideMargin: 10
            });
            $('.slider10').bxSlider({
                mode: 'vertical',
                slideWidth: 300,
                minSlides: 3,
                slideMargin: 10
            });
        });
    </script>
    <script src="{{ asset('style/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('style/js/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
    <script src="{{ asset('style/js/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('style/js/rs-plugin/rs.home.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
    <!--Opacity & Other IE fix for older browser-->
    <!--[if lte IE 8]>
    <script type="text/javascript" src="{{ asset('style/js/ie-opacity-polyfill.js') }}"></script>
<![endif]-->
    <script src="{{ asset('style/js/main.js') }}"></script>
</body>

</html>
