  <?php
  // Validasi error
  echo validation_errors('<div class="alert alert-warning">', '</div>');

  // Form buka 
  echo form_open(base_url('admin/kategori_bidang/edit/' . $kategori_bidang->id));
  ?>

  <div class="form-group">
    <input type="text" name="nama_bidang" class="form-control" placeholder="Nama Bidang" value="<?php echo $kategori_bidang->nama_bidang ?>" required>
  </div>

  <div class="form-group text-center">
    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
  </div>
  <div class="clearfix"></div>

  <?php
  // Form close 
  echo form_close();
  ?>