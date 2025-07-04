<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>PPID Poltekkes Jakarta III - Form Permohonan Informasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/style_request.css'); ?>" rel="stylesheet">
</head>

<body>
    <div class="split">
        <div class="left">
            <h1>Selamat datang di<br>Layanan Informasi Publik</h1>
            <p>Anda bisa menggunakan formulir di samping untuk membuat permohonan informasi, pengajuan keberatan, pengaduan pungli & gratifikasi, dan pengaduan penyalahgunaan wewenang & jabatan.</p>
            <p>Jika Anda sudah membuat permohonan/pengaduan, silakan klik tombol di bawah ini untuk melacak permohonan/pengaduan.</p>
            <div class="btn-group">
                <button class="btn btn-primary"><i class="fa fa-search"></i> Lacak Permohonan</button>
                <button class="btn btn-primary"><i class="fa fa-home"></i> Beranda</button>
            </div>
        </div>
        <div class="right">
            <?= form_open_multipart('request/submit', ['id' => 'form_request', 'autocomplete' => 'off']) ?>

            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

            <div class="form-group">
                <label>Jenis Layanan Informasi</label>
                <select name="jenis_layanan_id" id="jenis_layanan_id" required>
                    <option value="">- Pilih jenis layanan -</option>
                    <?php foreach ($jenis_layanan as $jl): ?>
                        <option value="<?= $jl->id ?>"><?= $jl->nama_layanan ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="note">Silahkan pilih jenis layanan informasi: Permohonan Informasi,...</div>
            </div>

            <div class="form-group">
                <label>Kategori Pemohon</label>
                <select name="kategori_pemohon_id" id="kategori_pemohon_id" required>
                    <option value="">- Pilih kategori -</option>
                    <?php foreach ($kategori_pemohon as $kp): ?>
                        <option value="<?= $kp->id ?>" data-nama="<?= strtolower($kp->nama_kategori) ?>">
                            <?= $kp->nama_kategori ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="form-group">
                <label>Nama Lengkap (Tanpa Gelar)</label>
                <input type="text" name="nama_lengkap" autocomplete="false" required />
                <div class="note text-danger"><?= form_error('nama_lengkap') ?></div>
            </div>

            <div class="form-group">
                <label>Nomor Identitas (KTP/SIM/Paspor)</label>
                <input type="text" name="nomor_identitas" autocomplete="false" required />
                <div class="note text-danger"><?= form_error('nomor_identitas') ?></div>
            </div>

            <div class="form-group">
                <label>Lampiran KTP/SIM/PASPOR</label>
                <input type="file" accept=".jpg,.png,jpeg" name="file_identitas" required onchange="if(this.files[0].size > 200000){ alert('File maksimal 200KB'); this.value=''; }">
                <div class="note">File berekstensi jpg, png, jpeg dengan ukuran maksimal 200kb</div>
            </div>

            <div class="form-group" id="akta-group">
                <label>Lampiran Akta Pendirian Badan Hukum</label>
                <input type="file" accept=".jpg,.png,jpeg" name="file_akta" id="file_akta" required onchange="if(this.files[0].size > 200000){ alert('File maksimal 200KB'); this.value=''; }">
                <div class="note">File berekstensi jpg, png, jpeg dengan ukuran maksimal 200kb</div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" autocomplete="false" required />
                <div class="note text-danger"><?= form_error('email') ?></div>
            </div>

            <div class="form-group">
                <label>Handphone</label>
                <input type="tel" name="handphone" autocomplete="false" required />
                <div class="note text-danger"><?= form_error('handphone') ?></div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" autocomplete="false" required />
                <div class="note text-danger"><?= form_error('alamat') ?></div>
            </div>

            <div class="form-group">
                <label>Kategori Bidang</label>
                <select name="kategori_bidang_id" required>
                    <option value="">- Pilih kategori -</option>
                    <?php foreach ($kategori_bidang as $kb): ?>
                        <option value="<?= $kb->id ?>"><?= $kb->nama_bidang ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Rincian Informasi</label>
                <textarea rows="3" name="rincian_informasi" autocomplete="false" required></textarea>
            </div>

            <div class="form-group">
                <label>Lampiran Data Dukungan (optional)</label>
                <input type="file" accept=".doc,.docx,.pdf,.jpg,.png" name="file_pendukung" onchange="if(this.files[0].size > 1000000){ alert('File maksimal 1Mb'); this.value=''; }">
                <div class="note">File berekstensi doc, docx, pdf, jpeg, png, jpg dengan ukuran maksimal 1Mb</div>
            </div>

            <div class="form-checkbox">
                <input type="checkbox" id="check_agree" required />
                <label for="check_agree">Saya menyatakan bahwa data yang diisi benar dan dapat dipertanggungjawabkan.</label>
            </div>

            <div class="g-recaptcha">
                <!-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div> -->
            </div>

            <div class="submit-wrapper">
                <button type="submit">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#form_request').on('submit', function(e) {
            if (!$('#check_agree').is(':checked')) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Persetujuan Diperlukan',
                    text: 'Anda harus menyetujui bahwa data yang diisi benar.',
                    confirmButtonText: 'OK'
                });
                return false;
            }
            e.preventDefault();
            var formData = new FormData(this);

            // CSRF protection
            var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
            formData.append(csrfName, csrfHash);

            $.ajax({
                url: '<?= site_url("request/submit") ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                    $('.submit-wrapper button').prop('disabled', true).text('Mengirim...');
                },
                success: function(response) {
                    $('.submit-wrapper button').prop('disabled', false).text('Submit');

                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            html: 'Permohonan berhasil dikirim.<br>Silahkan Screenshoot Tampilan Ini Untuk Menyimpan Kode Tiket<br><strong>Kode Tiket:</strong> <span style="font-size: 1.2em; color: #007BFF;">' + response.ticket + '</span>',
                            confirmButtonText: 'OK'
                        });

                        $('#form_request')[0].reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.errors || 'Terjadi kesalahan saat mengirim permohonan.'
                        });
                    }

                    // Refresh CSRF token
                    if (response.csrf_token) {
                        $('input[name="' + csrfName + '"]').val(response.csrf_token);
                    }
                },
                error: function(xhr) {
                    $('.submit-wrapper button').prop('disabled', false).text('Submit');
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan Server',
                        text: 'Terjadi kesalahan sistem. Silakan coba beberapa saat lagi.'
                    });
                }
            });
        });


        $(document).ready(function() {
            var $kategoriSelect = $('#kategori_pemohon_id');
            var $aktaGroup = $('#akta-group');
            var $fileAkta = $('#file_akta');

            var wajibAkta = ['lembaga pemerintah', 'instansi pemerintah', 'lsm/ngo'];

            function toggleAktaField() {
                var selectedOption = $kategoriSelect.find('option:selected');
                var namaKategori = selectedOption.data('nama');

                if (wajibAkta.includes(namaKategori)) {
                    $aktaGroup.show();
                    $fileAkta.prop('required', true);
                } else {
                    $aktaGroup.hide();
                    $fileAkta.prop('required', false).val('');
                }
            }

            toggleAktaField();
            $kategoriSelect.on('change', toggleAktaField);
        });
    </script>

</body>

</html>