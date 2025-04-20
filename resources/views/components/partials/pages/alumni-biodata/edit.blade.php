<x-push stack="scripts">
    <script>
        // Edit Modal
        $(document).on('click', '.btn-edit', function() {
            const id = $(this).data('id');

            $.ajax({
                url: `{{ route('admin.alumni-biodata.index', '') }}/${id}`,
                method: 'GET',
                success: function(response) {
                    $('#editModalTitle').text(`Edit Alumni: ${response.full_name}`);
                    $('#edit-id').val(response.id);
                    $('#edit-full-name').val(response.full_name);
                    $('#edit-nis-nisn').val(response.nis_nisn);
                    $('#edit-birth-date').val(response.birth_date);
                    $('#edit-gender').val(response.gender);
                    $('#edit-major').val(response.major);
                    $('#edit-graduation-year-group').val(response.graduation_year_group_id);
                    $('#edit-phone-number').val(response.phone_number);
                    $('#edit-address').val(response.address);
                    $('#edit-facebook').val(response.socmed_facebook);
                    $('#edit-twitter').val(response.socmed_twitter);
                    $('#edit-instagram').val(response.socmed_instagram);
                    $('#edit-linkedin').val(response.socmed_linkedin);
                    $('#edit-youtube').val(response.socmed_youtube);
                    $('#edit-tiktok').val(response.socmed_tiktok);
                    $('#edit-is-verified').prop('checked', response.is_verified);
                    $('#edit-email').val(response.user.email);

                    // Bersihkan error sebelumnya
                    $('#editForm .is-invalid').removeClass('is-invalid');
                    $('#editForm .invalid-feedback').remove();

                    $('#editModal').modal('show');
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

        // Edit Form Submit
        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            const id = $('#edit-id').val();

            $.ajax({
                url: `{{ route('admin.alumni-biodata.index', '') }}/${id}`,
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editModal').modal('hide');
                    table.ajax.reload();

                    // Bersihkan error sebelumnya
                    $('#editForm .is-invalid').removeClass('is-invalid');
                    $('#editForm .invalid-feedback').remove();

                    Swal.fire(
                        'Berhasil!',
                        'Data alumni berhasil diperbarui',
                        'success'
                    );
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        // Bersihkan error sebelumnya
                        $('#editForm .is-invalid').removeClass('is-invalid');
                        $('#editForm .invalid-feedback').remove();

                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            const input = $(`[name="${key}"]`);
                            input.addClass('is-invalid');
                            input.after(`<div class="invalid-feedback">${value[0]}</div>`);
                        });
                    } else {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat memperbarui data alumni',
                            'error'
                        );
                    }
                }
            });
        });
    </script>
</x-push>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle">Edit Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-full-name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="edit-full-name" name="full_name" required>
                            </div>

                            <div class="form-group">
                                <label for="edit-nis-nisn">NIS/NISN</label>
                                <input type="text" class="form-control" id="edit-nis-nisn" name="nis_nisn">
                            </div>

                            <div class="form-group">
                                <label for="edit-birth-date">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="edit-birth-date" name="birth_date">
                            </div>

                            <div class="form-group">
                                <label for="edit-gender">Jenis Kelamin</label>
                                <select class="form-control" id="edit-gender" name="gender">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit-major">Jurusan</label>
                                <input type="text" class="form-control" id="edit-major" name="major">
                            </div>

                            <div class="form-group">
                                <label for="edit-graduation-year-group">Angkatan</label>
                                <select class="form-control" id="edit-graduation-year-group" name="graduation_year_group_id" required>
                                    @foreach ($emptyAlumniUsers as $graduationYear)
                                    <option value="{{ $graduationYear->id }}">{{ $graduationYear->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit-phone-number">Telepon</label>
                                <input type="text" class="form-control" id="edit-phone-number" name="phone_number">
                            </div>

                            <div class="form-group">
                                <label for="edit-email">Email</label>
                                <input type="email" class="form-control" id="edit-email" name="email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-address">Alamat</label>
                                <textarea class="form-control" id="edit-address" name="address" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="edit-facebook">Facebook</label>
                                <input type="text" class="form-control" id="edit-facebook" name="socmed_facebook" placeholder="URL Facebook">
                            </div>

                            <div class="form-group">
                                <label for="edit-twitter">Twitter</label>
                                <input type="text" class="form-control" id="edit-twitter" name="socmed_twitter" placeholder="URL Twitter">
                            </div>

                            <div class="form-group">
                                <label for="edit-instagram">Instagram</label>
                                <input type="text" class="form-control" id="edit-instagram" name="socmed_instagram" placeholder="URL Instagram">
                            </div>

                            <div class="form-group">
                                <label for="edit-linkedin">LinkedIn</label>
                                <input type="text" class="form-control" id="edit-linkedin" name="socmed_linkedin" placeholder="URL LinkedIn">
                            </div>

                            <div class="form-group">
                                <label for="edit-youtube">YouTube</label>
                                <input type="text" class="form-control" id="edit-youtube" name="socmed_youtube" placeholder="URL YouTube">
                            </div>

                            <div class="form-group">
                                <label for="edit-tiktok">TikTok</label>
                                <input type="text" class="form-control" id="edit-tiktok" name="socmed_tiktok" placeholder="URL TikTok">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="edit-is-verified" name="is_verified" value="1">
                                    <label class="custom-control-label" for="edit-is-verified">Terverifikasi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
