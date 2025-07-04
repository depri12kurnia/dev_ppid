<p>
  <?php include('tambah.php') ?>
</p>



<table class="table table-bordered table-hover table-striped" id="dataTable">
  <thead class="bordered-darkorange">
    <tr>
      <th>#</th>
      <th>Nama Kategori Pemohon</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($kategori_pemohon as $jl) { ?>

      <tr class="odd gradeX">
        <td><?php echo $i ?></td>
        <td><?php echo $jl->nama_kategori ?></td>
        <td>
          <a href="<?php echo base_url('admin/kategori_pemohon/edit/' . $jl->id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

          <a href="<?php echo base_url('admin/kategori_pemohon/delete/' . $jl->id) ?>" class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
        </td>
      </tr>

    <?php $i++;
    } ?>

  </tbody>
</table>