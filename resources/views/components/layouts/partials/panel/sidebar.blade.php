<!-- sidebar.blade.php - Main component for Admin/Operator -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Brand Logo -->
    <x-partials.sidebar.brands />

    <!-- Divider -->
    <x-partials.sidebar.divider />

    <x-partials.sidebar.heading text="Dasbor" />

    <!-- Dashboard -->
    @if (Route::has('dashboard.index'))
    <x-partials.sidebar.nav-item
        :link="route('dashboard.index')"
        icon="fas fa-fw fa-tachometer-alt"
        :active="request()->routeIs('dashboard.index')"
        text="Dasbor" />
    @endif

    <x-partials.sidebar.divider />

    @if(auth()->user()?->isAdmin())
    <x-layouts.partials.panel.menus.admin />
    @endif

    <x-partials.sidebar.divider classes="d-none d-md-block" />

    <!-- Sidebar Toggler -->
    <x-partials.sidebar.toggler />
</ul>
