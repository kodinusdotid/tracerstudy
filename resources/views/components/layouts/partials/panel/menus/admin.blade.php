<!-- Heading: Manajemen Alumni -->
<x-partials.sidebar.heading text="Manajemen Alumni" />

@if (Route::has('admin.graduation-year-group.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.graduation-year-group.index')"
    icon="fas fa-fw fa-calendar"
    :active="request()->routeIs('admin.graduation-year-group.*')"
    text="Grup Angkatan" />
@endif

@if (Route::has('admin.alumni-biodata.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.alumni-biodata.index')"
    icon="fas fa-fw fa-users"
    :active="request()->routeIs('admin.alumni-biodata.*')"
    text="Data Alumni" />
@endif

@if (Route::has('admin.alumni-biodata.import'))
<x-partials.sidebar.nav-item
    :link="route('admin.alumni-biodata.import')"
    icon="fas fa-fw fa-file-import"
    :active="request()->routeIs('admin.alumni-biodata.import')"
    text="Impor Alumni" />
@endif

<x-partials.sidebar.divider />

<!-- Heading: Kuesioner -->
<x-partials.sidebar.heading text="Kuesioner" />

@if (Route::has('admin.questionnaire.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.questionnaire.index')"
    icon="fas fa-fw fa-question-circle"
    :active="request()->routeIs('admin.questionnaire.*')"
    text="Manajemen Kuesioner" />
@endif

@if (Route::has('admin.responses.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.responses.index')"
    icon="fas fa-fw fa-clipboard-list"
    :active="request()->routeIs('admin.responses.*')"
    text="Jawaban Alumni" />
@endif

<x-partials.sidebar.divider />

<!-- Heading: Analisis & Laporan -->
<x-partials.sidebar.heading text="Analisis & Laporan" />

@if (Route::has('admin.report.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.report.index')"
    icon="fas fa-fw fa-chart-bar"
    :active="request()->routeIs('admin.report.*')"
    text="Laporan Tracer" />
@endif

@if (Route::has('admin.backup.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.backup.index')"
    icon="fas fa-fw fa-database"
    :active="request()->routeIs('admin.backup.*')"
    text="Backup & Restore" />
@endif

<x-partials.sidebar.divider />

<!-- Heading: Pengaturan -->
<x-partials.sidebar.heading text="Pengaturan" />

@if (Route::has('admin.users.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.users.index')"
    icon="fas fa-fw fa-user-cog"
    :active="request()->routeIs('admin.users.*')"
    text="Manajemen Akun" />
@endif

@if (Route::has('admin.setting.index'))
<x-partials.sidebar.nav-item
    :link="route('admin.setting.index')"
    icon="fas fa-fw fa-cogs"
    :active="request()->routeIs('admin.setting.index')"
    text="Pengaturan Sistem" />
@endif
