<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> SmartAdmin </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Stylessss -->

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/font-awesome.min.css')}}">
    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/smartadmin-production-plugins.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/smartadmin-production.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/css/smartadmin-skins.min.css') }}">
    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/css/smartadmin-rtl.min.css')}}">

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/css/demo.min.css')}}">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{ asset('/img/favicon/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('/img/favicon/favicon.ico')}}" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body class="">

@include('layouts.header')
@include('layouts.left-panel')
@yield('content')
@include('layouts.footer')



<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ asset('/js/plugin/pace/pace.min.js')}}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="{{ asset('/js/libs/jquery-2.1.1.min.js')}}"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="{{ asset('/js/libs/jquery-ui-1.10.3.min.js')}}"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{asset('/js/app.config.js')}}"></script>
<!-- BOOTSTRAP JS -->
<script src="{{ asset('/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- JQUERY VALIDATE -->
<script src="{{ asset('/js/plugin/jquery-validate/jquery.validate.min.js')}}"></script>
<!-- FastClick: For mobile devices -->
<script src="{{ asset('/js/plugin/fastclick/fastclick.min.js')}}"></script>
<!--[if IE 8]>
<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
<![endif]-->
<!-- MAIN APP JS FILE -->
<script src="{{ asset('/js/app.min.js')}}"></script>
<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->

@yield('script')


<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

</body>

</html>

