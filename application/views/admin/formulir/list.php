<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<div class="table-responsive mailbox-messages">
    <table id="requestTable" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr class="bg-info">
                <th>Tiket</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<!-- Modal Ubah Status -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="statusForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Status Permohonan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="request_id">
                    <div class="form-group">
                        <label for="new_status">Status Baru</label>
                        <select class="form-control" name="status" id="new_status" required>
                            <option value="">- Pilih Status -</option>
                            <option value="Diterima">Diterima</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Keberatan">Keberatan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Permohonan Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailContent">
                <p>Memuat data...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
    let detailModalInstance;

    $(document).ready(function() {
        detailModalInstance = new bootstrap.Modal(document.getElementById('detailModal'));
        var table = $('#requestTable').DataTable({
            ajax: {
                url: '<?= site_url("admin/request/get_data") ?>',
                type: 'GET',
                dataSrc: function(json) {
                    csrfHash = json.csrf_token;
                    return json.data;
                }
            },
            columns: [{
                    data: 'ticket_number'
                },
                {
                    data: 'nama_lengkap'
                },
                {
                    data: 'email'
                },
                {
                    data: 'status'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'id',
                    render: function(id, type, row) {
                        return `<button class="btn btn-sm btn-primary" onclick="showDetail(${id})">
                <i class="fa fa-eye"></i> Lihat
            </button>
            <button class="btn btn-sm btn-primary" onclick="openStatusModal(${id}, '${row.status}')">
                    Ubah Status
                </button>`;
                    }
                }
            ]
        });
    });

    function openStatusModal(id, currentStatus) {
        $('#request_id').val(id);
        $('#new_status').val(currentStatus);
        $('#statusModal').modal('show');
    }

    $('#statusForm').on('submit', function(e) {
        e.preventDefault();

        let formData = $(this).serialize();
        formData += `&<?= $this->security->get_csrf_token_name(); ?>=${csrfHash}`;

        $.ajax({
            url: '<?= site_url("admin/request/update_status") ?>',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                csrfHash = response.csrf_token;

                if (response.status) {
                    $('#statusModal').modal('hide');
                    $('#requestTable').DataTable().ajax.reload(null, false);

                    Swal.fire('Berhasil!', 'Status berhasil diperbarui.', 'success');
                } else {
                    Swal.fire('Gagal!', response.message || 'Gagal memperbarui status.', 'error');
                }
            },
            error: function() {
                Swal.fire('Gagal!', 'Terjadi kesalahan sistem.', 'error');
            }
        });
    });

    function showDetail(id) {
        $.ajax({
            url: '<?= site_url("admin/request/detail/") ?>' + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    let data = response.data;
                    let html = `
                <table class="table table-bordered">
                    <tr><th>Kode Tiket</th><td>${data.ticket_number}</td></tr>
                    <tr><th>Nama</th><td>${data.nama_lengkap}</td></tr>
                    <tr><th>Email</th><td>${data.email}</td></tr>
                    <tr><th>Nomor Identitas</th><td>${data.nomor_identitas}</td></tr>
                    <tr><th>Handphone</th><td>${data.handphone}</td></tr>
                    <tr><th>Alamat</th><td>${data.alamat}</td></tr>
                    <tr><th>Rincian Informasi</th><td>${data.rincian_informasi}</td></tr>
                    <tr><th>File Identitas</th><td>${data.file_identitas ? `<a href='<?= base_url("uploads/") ?>${data.file_identitas}' target='_blank'>Lihat</a>` : '-'}</td></tr>
                    <tr><th>Akta</th><td>${data.file_akta ? `<a href='<?= base_url("uploads/") ?>${data.file_akta}' target='_blank'>Lihat</a>` : '-'}</td></tr>
                    <tr><th>File Pendukung</th><td>${data.file_pendukung ? `<a href='<?= base_url("uploads/") ?>${data.file_pendukung}' target='_blank'>Lihat</a>` : '-'}</td></tr>
                    <tr><th>Status</th><td>${data.status}</td></tr>
                    <tr><th>Tanggal</th><td>${data.created_at}</td></tr>
                </table>
            `;
                    $('#detailContent').html(html);

                    detailModalInstance.show();
                } else {
                    Swal.fire('Gagal', 'Data tidak ditemukan', 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Gagal mengambil detail data', 'error');
            }
        });
    }
</script>