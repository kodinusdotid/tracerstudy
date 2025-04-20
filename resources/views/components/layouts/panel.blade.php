<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    @if($title)
        <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <style>
    </style>

    <!-- External Styles -->
    <x-stack name="externalStyles" />

    <!-- Font kustom untuk template ini -->
    <link href="{{ asset_panel('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Gaya kustom untuk template ini -->
    <link href="{{ asset_panel('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Gaya Kustom -->
    <x-stack name="styles" />

</head>

<body id="page-top">

    <!-- Pembungkus Halaman -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-layouts.partials.panel.sidebar />
        <!-- Akhir Sidebar -->

        <!-- Pembungkus Konten -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Konten Utama -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Tombol Toggle Sidebar (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Pencarian Topbar -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Navbar Topbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Item Nav - Dropdown Pencarian (Hanya Terlihat di XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Pesan -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Cari..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Item Nav - Pemberitahuan -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Penghitung - Pemberitahuan -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Pemberitahuan -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Pusat Pemberitahuan
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">12 Desember 2019</div>
                                        <span class="font-weight-bold">Laporan bulanan baru siap diunduh!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">7 Desember 2019</div>
                                        Rp290.29 telah disetorkan ke akun Anda!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">2 Desember 2019</div>
                                        Peringatan Pengeluaran: Kami melihat pengeluaran tidak biasa di akun Anda.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Tampilkan Semua Pemberitahuan</a>
                            </div>
                        </li>

                        <!-- Item Nav - Pesan -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Penghitung - Pesan -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Pesan -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Pusat Pesan
                                </h6>
                                <x-partials.panel.dropdown-message
                                    image="img/undraw_profile_1.svg"
                                    status="bg-success"
                                    message="Halo! Saya ingin tahu apakah Anda bisa membantu saya dengan masalah yang saya alami."
                                    sender="Emily Fowler"
                                    time="58m"
                                />

                                <x-partials.panel.dropdown-message
                                    image="img/undraw_profile_2.svg"
                                    message="Saya punya foto yang Anda pesan bulan lalu, bagaimana Anda ingin menerimanya?"
                                    sender="Jae Chun"
                                    time="1h"
                                />

                                <x-partials.panel.dropdown-message
                                    image="img/undraw_profile_3.svg"
                                    status="bg-warning"
                                    message="Laporan bulan lalu terlihat bagus, saya sangat senang dengan kemajuan sejauh ini, lanjutkan pekerjaan yang baik!"
                                    sender="Morgan Alvarez"
                                    time="2h"
                                />

                                <x-partials.panel.dropdown-message
                                    image="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                    status="bg-success"
                                    message="Apakah saya anjing yang baik? Alasan saya bertanya adalah karena seseorang memberi tahu saya bahwa orang-orang mengatakan ini pada semua anjing, bahkan jika mereka tidak baik..."
                                    sender="Chicken the Dog"
                                    time="2m"
                                />

                                <x-partials.global.dropdown-item
                                    label="Baca Lebih Banyak Pesan"
                                    class="text-center small text-gray-500"
                                />
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Item Nav - Informasi Pengguna -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ gravatar(Auth::user()->email) }}" />
                            </a>
                            <!-- Dropdown - Informasi Pengguna -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <x-partials.global.dropdown-item
                                    label="Profil"
                                    icon="fa-user"
                                />

                                <x-partials.global.dropdown-item
                                    label="Pengaturan"
                                    icon="fa-cogs"
                                />

                                <x-partials.global.dropdown-item
                                    label="Log Aktivitas"
                                    icon="fa-list"
                                />

                                <x-partials.global.dropdown-divider />

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- Akhir Topbar -->

                <!-- Mulai Konten Halaman -->
                <div class="container-fluid">

                    <!-- Judul Halaman -->
                    {{-- <h1 class="h3 mb-4 text-gray-800">Halaman Kosong</h1> --}}
                    {{ $slot }}

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- Akhir Konten Utama -->

            <!-- Footer -->
            <x-layouts.partials.panel.footer />
            <!-- Akhir Footer -->

        </div>
        <!-- Akhir Pembungkus Konten -->

    </div>
    <!-- Akhir Pembungkus Halaman -->

    <!-- Tombol Gulir ke Atas -->


    <x-layouts.partials.panel.logout-modal />

    <!-- JavaScript inti Bootstrap -->
    <script src="{{ asset_panel('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset_panel('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JavaScript plugin inti -->
    <script src="{{ asset_panel('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Script Kustom -->
    <x-stack name="externalScripts" />

    <!-- Script kustom untuk semua halaman -->
    <script src="{{ asset_panel('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset_panel('js/global.js') }}"></script>

    <!-- Script Kustom -->
    <x-stack name="scripts" />

</body>

</html>
