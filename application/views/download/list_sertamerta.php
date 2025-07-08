<section class="bg-servicesstyle2-section">
    <div class="container">
        <div class="row">
            <div class="our-services-option">
                <div class="section-header">
                    <h4>Informasi Serta Merta</h4>
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
                                            <th>Jenis Dokumen</th>
                                            <th>Nama Dokumen</th>
                                            <th style="width: 40px">Action</th>
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
                                                    <a href="<?php echo base_url('unduhan/unduh/' . $d->id_download) ?>" class="btn btn-primary btn-xs" target="_blank">
                                                        <i class="fa fa-eye"></i> View</a>
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