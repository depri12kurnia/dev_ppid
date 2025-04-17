<?php
// Validasi error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Error upload
if (isset($error)) {
    echo '<div class="alert alert-warning">';
    echo $error;
    echo '</div>';
}

// Form open
echo form_open_multipart(base_url('admin/prodi/edit/' . $prodi->id_prodi));
?>
<div class="row">
    <div class="col-md-12">

        <div class="form-group form-group-lg">
            <label>Nama Program Studi</label>
            <input type="text" name="nama_prodi" class="form-control" placeholder="Masukan Nama Program Studi" value="<?php echo $prodi->nama_prodi ?>">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Jurusan</label>
            <select name="id_jurusan" id="id_jurusan" class="form-control">
                <?php foreach ($jurusan as $jurusan) { ?>
                    <option value="<?php echo $jurusan->id_jurusan ?>" <?php if ($prodi->id_jurusan == $jurusan->id_jurusan) {
                                                                            echo "selected";
                                                                        } ?>>
                        <?php echo $jurusan->nama_jurusan ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Urutan</label>
            <input type="number" name="urutan" class="form-control" value="<?php echo $prodi->urutan ?>">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Status</label>
            <select name="status_prodi" id="status_prodi" class="form-control">
                <option value="<?php echo $prodi->status_prodi ?>"><?php echo $prodi->status_prodi ?></option>
                <option>No Selected</option>
                <option value="Publish">Publish</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Upload Gambar</label>
            <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>Keywords dan Ringkasan (untuk pencarian Google)</label>
            <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)"><?php echo $prodi->keywords ?></textarea>
        </div>
        <div class="form-group">
            <label>Isi Deskripsi Program Studi</label>
            <textarea name="isi" id="isi" class="form-control" placeholder="Isi prodi"><?php echo $prodi->isi ?></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
            <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
        </div>

    </div>
</div>
<?php
// Form close
echo form_close();
?>