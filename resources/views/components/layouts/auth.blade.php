<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Masuk dahulu ke dalam sistem">
    <meta name="author" content="SMK Darunadwah">

    @if($title)
        <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <style>
        .bg-login-image {
            background: url("{{ asset_panel('img/bg-login.jpg') }}") no-repeat center center !important;
            background-size: cover !important;
        }
    </style>

    <!-- Custom Styles -->
    <x-stack name="styles" />

    <!-- Custom fonts for this template-->
    <link href="{{ asset_panel('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset_panel('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript inti Bootstrap -->
    <script src="{{ asset_panel('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset_panel('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JavaScript plugin inti -->
    <script src="{{ asset_panel('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Script Kustom -->
    <x-stack name="externalScripts" />

    <!-- Script kustom untuk semua halaman -->
    <script src="{{ asset_panel('js/sb-admin-2.min.js') }}"></script>

    <!-- Script Kustom -->
    <x-stack name="scripts" />
</body>

</html>

