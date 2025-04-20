<x-push stack="scripts">
    <script>
        $(document).ready(function() {
            $('#select-existing-user').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#existing-user-section').show();
                    $('#new-user-section').hide();
                } else {
                    $('#existing-user-section').hide();
                    $('#new-user-section').show();
                }
            });

            $('#create-form').submit(function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.alumni-biodata.store') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        $('#createModal').modal('hide');
                        Swal.fire('Sukses!', 'Data alumni berhasil ditambahkan.', 'success');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan data.', 'error');
                    }
                });
            });
        });
    </script>
</x-push>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="create-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Alumni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="select-existing-user" name="select_existing_user" />
                            <label class="custom-control-label" for="select-existing-user">Pilih User Alumni yang Sudah Ada</label>
                        </div>
                    </div>

                    <div id="existing-user-section" style="display: none;">
                        <div class="form-group">
                            <label for="user_id">Pilih User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="">-- Pilih User --</option>
                                @forelse($alumniUsers as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @empty
                                    <option value="">-- Tidak ada user alumni --</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div id="new-user-section">
                        <div class="form-group">
                            <label for="user_name">Nama User</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Masukkan nama user">
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email User</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Masukkan email user">
                        </div>

                        <div class="form-group">
                            <label for="user_password">Password User</label>
                            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Masukkan password user">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="full_name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="form-group">
                        <label for="nis_nisn">NIS/NISN</label>
                        <input type="text" class="form-control" id="nis_nisn" name="nis_nisn" placeholder="Masukkan NIS/NISN">
                    </div>

                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date">
                    </div>

                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="">-- Pilih --</option>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="major">Jurusan</label>
                        <input type="text" class="form-control" id="major" name="major" placeholder="Masukkan jurusan">
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Telepon</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan nomor telepon">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="graduation_year_group_id">Tahun Kelulusan</label>
                        <select class="form-control" id="graduation_year_group_id" name="graduation_year_group_id">
                            <option value="">-- Pilih Tahun Kelulusan --</option>
                            @foreach($graduationYearGroups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
