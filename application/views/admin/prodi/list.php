<?php
echo form_open(base_url('admin/prodi/proses'));
?>
<p class="btn-group">
    <a href="<?php echo base_url('admin/prodi/tambah') ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah File</a>

    <button class="btn btn-danger" type="submit" name="hapus" onClick="check();">
        <i class="fa fa-trash-o"></i> Hapus
    </button>

</p>
<div class="table-responsive mailbox-messages">
    <table id="dataTable" class="display table table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr class="bg-info">
                <th width="5%">No</th>
                <th>Gambar</th>
                <th>Nama Program Studi</th>
                <th>Jurusan</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1;
            foreach ($prodi as $prodi) { ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td>
                        <?php if ($prodi->gambar != "") { ?>
                            <img src="<?php echo base_url('assets/upload/prodi/thumbs/' . $prodi->gambar) ?>" class="img img-thumbnail img-responsive" width="60">
                        <?php } else { ?>
                            <img src="<?php echo base_url('assets/upload/prodi/thumbs/' . $site->icon) ?>" class="img img-thumbnail img-responsive" width="60">
                        <?php } ?>
                    </td>
                    <td><?php echo $prodi->nama_prodi ?><br><small>Urutan : <?php echo $prodi->urutan ?></small></td>
                    <td><?php echo $prodi->nama_jurusan ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?php echo base_url('admin/prodi/edit/' . $prodi->id_prodi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('admin/prodi/delete/' . $prodi->id_prodi) ?>" class="btn btn-danger btn-xs" onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>

            <?php $i++;
            } ?>

        </tbody>
    </table>
</div>
<?php echo form_close(); ?>