<main class="content">
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">Daftar Supplier</h5>
        </div>
        <div class="table-responsive  px-2 mb-2">
          <table class="table data-table table-hover my-2" style="width: 100%">
            <thead>
              <tr>
                <th class="ps-0">No</th>
                <th class="ps-0">Nama Supplier</th>
                <th class="d-none  d-md-table-cell ps-0">Alamat</th>
                <th class="d-none  d-md-table-cell ps-0">Nomor Telepon</th>
                <th class="d-block d-md-table-cell ps-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no=1;
            foreach ($data['data_sup'] as $datas):?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $datas->nama_sup ?></td>
                <td class="d-none  d-md-table-cell ps-0"><?php echo $datas->alamat ?></td>
                <td class="d-none  d-md-table-cell ps-0"><?php echo $datas->nomor ?></td>
                <td class="d-block d-md-table-cell ps-0">
                  <a class="d-md-none text-decoration-none ps-0" href="<?php echo URLROOT . '/Admin/lihat_sup_page/' . $datas->id_supplier ?>"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><i class="align-middle" data-feather="eye"></i></button></a>
                  <a class="text-decoration-none ps-0" href="<?php echo URLROOT . '/Admin/edit_sup_page/' . $datas->id_supplier ?>"><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="align-middle" data-feather="edit"></i></button></a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $datas->id_supplier ?>"><i class="align-middle" data-feather="trash-2"></i></button>
                </td>
              </tr>

              <div class="modal fade" id="exampleModal<?php echo $datas->id_supplier ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo $datas->nama_sup ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Anda Yakin Ingin Menghapus?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo URLROOT . '/Admin/hapus_sup/' . $datas->id_supplier ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>