<x-layouts.panel title="Data Alumni">
    <x-push stack="externalStyles">
        <link rel="stylesheet" href="{{ asset_panel('vendor/datatables/dataTables.bootstrap4.min.css') }}" />
    </x-push>

    <x-push stack="externalScripts">
        <script src="{{ asset_panel('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset_panel('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    </x-push>

    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alumni</h6>
            <div class="card-header-actions">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIS/NISN</th>
                            <th>Jurusan</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <x-push stack="scripts">
        <script>
            const table = $('#dataTable').DataTable({
                "ajax": "{{ route('admin.alumni-biodata.api') }}",
                "processing": "true",
                "columns": [
                    { "data": "full_name" },
                    { "data": "nis_nisn" },
                    { "data": "major" },
                    { "data": "phone_number" },
                    { "data": "user.email" },
                    {
                        "data": "id",
                        "orderable": false,
                        "searchable": false,
                        "render": function(data) {
                            return `
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-sm btn-view" data-id="${data}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm btn-edit" data-id="${data}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="${data}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            `;
                        }
                    }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }
            });

            // Delete Confirmation
            $(document).on('click', '.btn-delete', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: `{{ route('admin.alumni-biodata.api', '') }}/${id}`,
                    method: 'GET',
                    success: function(response) {
                        $('#delete-id').val(response.id);
                        $('#delete-name').text(response.full_name);
                        $('#deleteModal').modal('show');
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat mengambil data alumni',
                            'error'
                        );
                    }
                });
            });
        </script>
    </x-push>

    <x-partials.pages.alumni-biodata.view />
    <x-partials.pages.alumni-biodata.edit />
    <x-partials.pages.alumni-biodata.delete />
    <x-partials.pages.alumni-biodata.create />
</x-layouts.panel>
