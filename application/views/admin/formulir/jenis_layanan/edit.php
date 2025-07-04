  <?php
  // Validasi error
  echo validation_errors('<div class="alert alert-warning">', '</div>');

  // Form buka 
  echo form_open(base_url('admin/jenis_layanan/edit/' . $jenis_layanan->id));
  ?>

  <div class="form-group">
    <input type="text" name="nama_layanan" class="form-control" placeholder="Nama Layanan" value="<?php echo $jenis_layanan->nama_layanan ?>" required>
  </div>

  <div class="form-group text-center">
    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
  </div>
  <div class="clearfix"></div>

  <?php
  // Form close 
  echo form_close();
  ?>