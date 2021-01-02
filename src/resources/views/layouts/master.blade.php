<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Freebie 22 - Analytics Dashboard by pixelcave</title>

    <meta name="description" content="Freebie 22 - Analytics Dashboard. Check out more at https://pixelcave.com">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="apple-touch-icon" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" href="assets/media/favicons/favicon-192x192.png">

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<!-- Page Container -->
<div id="page-container">
    <!-- Header -->
    <div class="bg-white">
        <header class="container d-md-flex justify-content-md-between py-5">
            <div class="text-center text-md-left py-2">
                <a class="font-weight-bold h2 text-dark" href="">
                    <i class="fab fa-github-alt text-muted"></i>
                    {{config('app.name')}}
                </a>
            </div>
            <div class="text-center text-md-right py-2">
                @auth
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle px-3 py-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle mr-1"></i> {{__('Hi, :username', ['username' => auth()->user()->name])}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="">Profile</a>
                            <a class="dropdown-item" href="">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('auth.logout')}}">Log Out</a>
                        </div>
                    </div>
                @else
                    <div class="">
                        <a class="btn btn-primary px-3 py-2" href="{{route('auth.login.github.redirect')}}">
                            <i class="fab fa-github mr-1"></i> {{__('Connect via Github')}}
                        </a>
                    </div>
                @endauth
            </div>
        </header>
    </div>
    <!-- END Header -->

    <!-- Container -->
    <div class="container py-4">
        @if (session()->has('message'))
            <div class="alert alert-info">{{ session()->get('message') }}</div>
        @endif
        @yield('content')
    </div>
    <!-- END Content -->

    <!-- Footer -->
    <div class="bg-white">
        <footer class="container font-size-sm d-md-flex justify-content-md-between py-4">
            <div class="text-center text-md-left py-2">
                <strong>{{config('app.name')}}</strong> &copy; <script>document.write((new Date()).getFullYear());</script>
            </div>
            <div class="text-center text-md-right py-2">
                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://github.com/kodhub">kodhub</a>
            </div>
        </footer>
    </div>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
