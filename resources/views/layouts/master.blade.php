<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
        <title>Lab - @yield('title')</title>

        <!-- CSS are placed here -->
        <link rel="stylesheet" href="{{ url('public/bootstrap-3.3.7/css/bootstrap.min.css') }}" />

        <!-- Scripts are placed here -->
        <script type="text/javascript" src="{{ url('public/js/jquery-1.11.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/js/jquery-validation-1.14.0/dist/jquery.validate.min.js') }}"></script>

        <script type="text/javascript" src="{{ url('public/js/jquery.browser.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/js/jquery.querystring.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/js/accounting.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/js/momentjs/moment-with-locales.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('public/js/momentjs/moment-timezone-with-data.min.js') }}"></script>
        <script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
        
        <script type="text/javascript">
var zone = moment.tz.zone("America/Los_Angeles");
var publicUrl = '<?php echo URL::to('/'); ?>';
        </script>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Remote Skills Test</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div id="masterPage">
                @yield('content')
            </div>
        </div>
    </body>
</html>