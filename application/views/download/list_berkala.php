<section class="bg-servicesstyle2-section">
    <div class="container">
        <div class="row">
            <div class="our-services-option">
                <div class="section-header">
                    <h4>Informasi Berkala</h4>
                </div>
                <!-- .section-header -->
                <div class="row">

                    <style type="text/css" media="screen">
                        th,
                        td {
                            text-align: left !important;
                            vertical-align: top !important;
                            padding: 6px 12px !important;
                            color: #000 !important;
                        }
                    </style>

                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Rincian Informasi</th>
                                            <th>Sub Informasi</th>
                                            <th style="width: 40px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Profil Institusi -->
                                        <tr>
                                            <td>Profil Institusi</td>
                                            <td>Alamat Lengkap</td>
                                            <td><a href="https://www.poltekkesjakarta3.ac.id/kontak" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Visi, Misi, dan Tujuan</td>
                                            <td><a href="https://www.poltekkesjakarta3.ac.id/pages/tentang/visi-misi" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Struktur Organisasi</td>
                                            <td><a href="https://www.poltekkesjakarta3.ac.id/pages/tentang/struktur-organisasi" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Jurusan & Program Studi</td>
                                            <td><a href="https://www.poltekkesjakarta3.ac.id/jurusan" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Rencana Strategis: Tahun 2020-2024</td>
                                            <td><a href="https://www.poltekkesjakarta3.ac.id/unduhan/akuntabilitas" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                        </tr>
                                        <!-- End Profil Institusi -->

                                        <!-- Profil Pimpinan -->
                                        <tr>
                                            <td>Profil Pimpinan</td>
                                            <td>Profil Singkat Pimpinan </td>
                                            <td><a href="#" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Laporan Harta Kekayaan Penyelenggara Negara/Laporan Harta Kekayaan Aparatur Sipil Negara (LHKPN/LHKASN)</td>
                                            <td><a href="#" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail</a></td>
                                        </tr>
                                        <!-- End Profil Pimpinan -->

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div><!-- End .row -->
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Informasi</th>
                                            <th>Informasi Detail</th>
                                            <th style="width: 40px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($download as $d) { ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $d->nama_jenis_download ?></td>
                                                <td><?php echo $d->judul_download ?></td>
                                                <td>
                                                    <a href="javascript:void(0);" onclick="viewPDF('<?= base_url('assets/upload/file/' . $d->gambar) ?>')" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div><!-- End .row -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal View PDF -->
<div class="modal fade" id="modal_pdf_view" tabindex="-1" role="dialog" aria-labelledby="modalPDFLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPDFLabel">Preview Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 80vh;">
                <iframe id="pdfFrame" src="" frameborder="0" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- End Modal PDF -->

<script>
    function viewPDF(url) {
        $('#pdfFrame').attr('src', url);
        $('#modal_pdf_view').modal('show');
    }
</script>