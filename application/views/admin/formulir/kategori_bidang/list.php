<p>
  <?php include('tambah.php') ?>
</p>



<table class="table table-bordered table-hover table-striped" id="dataTable">
  <thead class="bordered-darkorange">
    <tr>
      <th>#</th>
      <th>Nama Kategori Bidang</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($kategori_bidang as $jl) { ?>

      <tr class="odd gradeX">
        <td><?php echo $i ?></td>
        <td><?php echo $jl->nama_bidang ?></td>
        <td>
          <a href="<?php echo base_url('admin/kategori_bidang/edit/' . $jl->id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>

          <a href="<?php echo base_url('admin/kategori_bidang/delete/' . $jl->id) ?>" class="btn btn-danger btn-xs " onclick="confirmation(event)"><i class="fa fa-trash-o"></i></a>
        </td>
      </tr>

    <?php $i++;
    } ?>

  </tbody>
</table>