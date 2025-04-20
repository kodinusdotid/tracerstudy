<x-push stack="scripts">
    <script>
        // Delete Form Submit
        $('#deleteForm').on('submit', function(e) {
            e.preventDefault();
            const id = $('#delete-id').val();

            console.log(`{{ route('admin.alumni-biodata.index', '') }}/${id}`)

            $.ajax({
                url: `{{ route('admin.alumni-biodata.index', '') }}/${id}`,
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire(
                        'Berhasil!',
                        'Data alumni berhasil dihapus',
                        'success'
                    );
                },
                error: function(xhr) {
                    Swal.fire(
                        'Gagal!',
                        'Terjadi kesalahan saat menghapus data alumni',
                        'error'
                    );
                }
            });
        });
    </script>
</x-push>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" id="delete-id" name="id">
                    <p>Anda yakin ingin menghapus data alumni <strong id="delete-name"></strong>?</p>
                    <div class="alert alert-danger">Tindakan ini tidak dapat dibatalkan!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

