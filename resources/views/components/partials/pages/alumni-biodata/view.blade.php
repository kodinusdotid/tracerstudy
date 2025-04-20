<x-push stack="scripts">
    <script>
        // View Modal
        $(document).on('click', '.btn-view', function() {
            const id = $(this).data('id');

            $.ajax({
                url: `{{ route('admin.alumni-biodata.index', '') }}/${id}`,
                method: 'GET',
                success: function(response) {
                    $('#viewModalTitle').text(`Detail Alumni: ${response.full_name}`);
                    $('#view-full-name').text(response.full_name || 'Tidak ada');
                    $('#view-nis-nisn').text(response.nis_nisn || 'Tidak ada');
                    $('#view-birth-date').text(response.birth_date ? new Date(response.birth_date).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }) : 'Tidak ada');
                    $('#view-gender').text(response.gender === 'male' ? 'Laki-laki' : (response.gender === 'female' ? 'Perempuan' : 'Tidak ada'));
                    $('#view-major').text(response.major || 'Tidak ada');
                    $('#view-phone-number').text(response.phone_number || 'Tidak ada');
                    $('#view-address').text(response.address || 'Tidak ada');
                    $('#view-email').text(response.user.email || 'Tidak ada');
                    $('#view-facebook').html(stringToLinkDetection(response.socmed_facebook, 30) || 'Tidak ada');
                    $('#view-twitter').html(stringToLinkDetection(response.socmed_twitter, 30) || 'Tidak ada');
                    $('#view-instagram').html(stringToLinkDetection(response.socmed_instagram, 30) || 'Tidak ada');
                    $('#view-linkedin').html(stringToLinkDetection(response.socmed_linkedin, 30) || 'Tidak ada');
                    $('#view-youtube').html(stringToLinkDetection(response.socmed_youtube, 30) || 'Tidak ada');
                    $('#view-tiktok').html(stringToLinkDetection(response.socmed_tiktok, 30) || 'Tidak ada');
                    $('#view-verified').html(response.is_verified ? '<i class="fas fa-check-circle text-success"></i> Terverifikasi' : '<i class="fas fa-times-circle text-danger"></i> Belum Terverifikasi');

                    $('#viewModal').modal('show');
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

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalTitle">Detail Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td id="view-full-name"></td>
                            </tr>
                            <tr>
                                <th>NIS/NISN</th>
                                <td id="view-nis-nisn"></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td id="view-birth-date"></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td id="view-gender"></td>
                            </tr>
                            <tr>
                                <th>Jurusan</th>
                                <td id="view-major"></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td id="view-phone-number"></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td id="view-email"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th>Alamat</th>
                                <td id="view-address"></td>
                            </tr>
                            <tr>
                                <th>Facebook</th>
                                <td id="view-facebook"></td>
                            </tr>
                            <tr>
                                <th>Twitter</th>
                                <td id="view-twitter"></td>
                            </tr>
                            <tr>
                                <th>Instagram</th>
                                <td id="view-instagram"></td>
                            </tr>
                            <tr>
                                <th>LinkedIn</th>
                                <td id="view-linkedin"></td>
                            </tr>
                            <tr>
                                <th>YouTube</th>
                                <td id="view-youtube"></td>
                            </tr>
                            <tr>
                                <th>TikTok</th>
                                <td id="view-tiktok"></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td id="view-verified"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
