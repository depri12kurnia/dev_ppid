<?php
echo form_open(base_url('admin/download/proses'));
?>
<p class="btn-group">
    <a href="<?php echo base_url('admin/download/tambah') ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah File</a>

    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();">
        <i class="fa fa-trash-o"></i> Hapus
    </button>

</p>

<br>

<div class="table-responsive mailbox-messages">
    <table id="dataTable" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr class="bg-info">
                <th width="5%">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-xs checkbox-toggle"><i
                                class="fa fa-square-o"></i>
                        </button>
                    </div>
                </th>
                <th width="5%">UNDUH</th>
                <th width="25%">NAMA DOKUMEN</th>
                <th width="20%">KATEGORI</th>
                <th width="20%">JENIS</th>
                <th>AUTHOR</th>
                <th width="15%">ACTION</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1;
            foreach ($download as $download) { ?>
                <tr>
                    <td>
                        <div class="mailbox-star text-center">
                            <div class="text-center">
                                <input type="checkbox" class="icheckbox_flat-blue " name="id_download[]"
                                    value="<?php echo $download->id_download ?>">
                                <span class="checkmark"></span>
                            </div>
                    </td>
                    <td>
                        <a href="<?php echo base_url('admin/download/unduh/' . $download->id_download) ?>"
                            class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i></a>
                    </td>
                    <td><?php echo $download->judul_download ?>
                        <br><small>
                            <br>
                            <p hidden id="imageLink">
                                <?php echo base_url('admin/download/unduh/' . $download->id_download); ?>
                            </p>
                            <a onclick="copyLink()" class="btn btn-default btn-sm">Copy Link</a>
                        </small>
                    </td>
                    <td><?php echo $download->nama_kategori_download ?>
                        <small><br>Posted: <?php echo date('d M Y H:i: s', strtotime($download->tanggal_post)) ?></small>
                    </td>
                    <td><?php echo $download->nama_jenis_download ?></td>
                    <td><?php echo $download->nama ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo base_url('download/detail/' . $download->id_download) ?>"
                                class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a>

                            <a href="<?php echo base_url('admin/download/edit/' . $download->id_download) ?>"
                                class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

                            <a href="<?php echo base_url('admin/download/delete/' . $download->id_download) ?>"
                                class="btn btn-danger btn-xs" onclick="confirmation(event)"><i
                                    class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>

            <?php $i++;
            } ?>

        </tbody>
    </table>
</div>
<?php echo form_close(); ?>

<!-- Script JavaScript -->
<script>
    function copyLink() {
        const link = document.getElementById("imageLink").innerText;
        navigator.clipboard.writeText(link).then(function() {
            alert("Link berhasil disalin!");
        }, function(err) {
            alert("Gagal menyalin link: " + err);
        });
    }
</script>