<!DOCTYPE html>
<html lang="en-us" id="lock-page">
<head>
    <meta charset="utf-8">
    <title> SmartAdmin</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #CSS Links -->
    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production-plugins.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.min.css">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-rtl.min.css">

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/demo.min.css">

    <!-- page related CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/lockscreen.min.css">

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon/favicon.ico" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">


</head>

<body>

<div id="main" role="main">

    <!-- MAIN CONTENT -->

    <form class="lockscreen animated flipInY" action="index.html">
        <div class="logo" align="center">
            <h1 class="semi-bold"><img src="/img/logo-o.png" alt="" /> SmartAdmin</h1>
        </div>
        <div>
            <div>
                <h4>Gracias <strong>{{$nombre[0]->nombres}}</strong> en breve atenderemos su solicitud.</h4>

                <br>
                <p>
                    Si desea mayor información puede comincarse con nosotros a los teléfonos siguientes:
                </p>
                <p>
                    965343434 - 054312343 de Lunes a Viernes de 8:00 a 18:00 horas.
                </p>
                <p class="text-muted">
                    o envíemos un email a <a href="mailto:simmons@smartadmin">john.doe@smartadmin.com</a>
                </p>
<br>
                <p class="no-margin margin-top-5" align="center">
                    Para continuar <a href="/"> Presione Aquí</a>
                </p>
            </div>

        </div>
        <p class="font-xs margin-top-5">
            Copyright SmartAdmin 2014-2020.

        </p>
    </form>

</div>

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script src="/js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');} </script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

<!-- IMPORTANT: APP CONFIG -->
<script src="/js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

<!-- BOOTSTRAP JS -->
<script src="/js/bootstrap/bootstrap.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="/js/plugin/masked-input/jquery.maskedinput.min.js"></script>


<!-- MAIN APP JS FILE -->
<script src="/js/app.min.js"></script>

</body>
</html>