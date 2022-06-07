<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CMS</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="CMS, Content Managment System." name="description">

        <!-- Favicons -->
        <link href="img/favicon-16x16.png" type="image/png" sizes="16x16" rel="icon">
        <link href="img/favicon-32x32.png" type="image/png" sizes="32x32" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <!-- Bootstrap  File -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <!-- Main Stylesheet File -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <header id="header" >
        <div class="container">
            <nav class="main-nav float-right d-none d-lg-block" >
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <!-- TODO: check flow navigation bar -->

                @if(session()->has('userid') && session()->has('priv') && session('priv') != 0)
                    <li><a href="{{ route('profile', ['userid' => session('userid')]) }}">Profile</a></li>
                    <li><a href="{{ route('pageAdministration') }}">Manage Pages</a></li>
                    @isset($contents)
                        @foreach($contents as $c)
                            <li><a href="{{ route('pageManagement', ['cid' => $c->id]) }}">{{$c->navBarText}}</a></li>
                        @endforeach
                    @endisset
                    @if(session('priv') != 1)
                        <li><a href="{{ route('userAdministration') }}">Manage Users</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                    @isset($contents)
                        @foreach($contents as $c)
                            <li><a href="{{ route('pageManagement', ['cid' => $c->id]) }}">{{$c->navBarText}}</a></li>
                        @endforeach
                    @endisset
                @endif
            </ul>
            </nav>
        </div>
    </header>
</head>

@yield('body')

<footer id="footer">
    <div class="footer-top" style="background-color:grey">
        <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 social-links" style="margin:20px 20px;text-align:center;font-size:30px;">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#"   class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#"  class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#"  class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin" ><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
        &copy; 2020 Copyright <strong>Kenzie Chandra.</strong> All Rights Reserved
        </div>
    </div>
</footer>

<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>

<script>
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    $(document).ready(function() {
        $("#back-to-top").click(function(event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });
    });
</script>