<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Primary Meta Tags -->
    <title>Starhub - Github Free Stars your Repository</title>
    <meta name="title" content="Starhub - Github Free Stars your Repository">
    <meta name="description" content="Free star collecting tool for your Github libraries. It's completely free and reliable.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="Starhub - Github Free Stars your Repository">
    <meta property="og:description" content="Free star collecting tool for your Github libraries. It's completely free and reliable.">
    <meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="Starhub - Github Free Stars your Repository">
    <meta property="twitter:description" content="Free star collecting tool for your Github libraries. It's completely free and reliable.">
    <meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">
    <meta name="author" content="ismailcaakir">

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/icons')}}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/icons')}}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/icons')}}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/icons')}}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/icons')}}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/icons')}}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/icons')}}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/icons')}}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/icons')}}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('/icons')}}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/icons')}}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/icons')}}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/icons')}}/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/icons')}}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('/icons')}}/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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
                Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://github.com/kodhub/starhub">open source</a>
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
@yield('js')
</body>
</html>
