<section class="bg-servicesstyle2-section">
    <div class="container">
        <div class="row">
            <div class="our-services-option">
                <div class="section-header">
                    <h4>Laporan Survey</h4>
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
                            <!-- <div class="card-header">
                                <h3 class="card-title">Striped Full Width Table</h3>
                            </div> -->
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <!-- <th>Jenis Dokumen</th> -->
                                            <th>Nama Dokumen</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($download as $d) { ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <!-- <td><?php echo $d->nama_jenis_download ?></td> -->
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