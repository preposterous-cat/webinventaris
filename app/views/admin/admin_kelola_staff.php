<main class="content">
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">Daftar Staff</h5>
        </div>
        <div class="table-responsive  px-2 mb-2">
          <table class="table data-table table-hover my-2" style="width: 100%">
            <thead>
              <tr>
                <th class="ps-0">No</th>
                <th class="ps-0">Username</th>
                <th class="d-none  d-md-table-cell ps-0">Nama Lengkap</th>
                <th class="d-none  d-md-table-cell ps-0">Bagian</th>
                <th class="d-block d-md-table-cell ps-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no=1;
            foreach ($data['data_staff'] as $datas):?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $datas->username ?></td>
                <td class="d-none  d-md-table-cell ps-0"><?php echo $datas->nama ?></td>
                <td class="d-none  d-md-table-cell ps-0"><?php echo $datas->bagian ?></td>
                <td class="d-block d-md-table-cell ps-0">
                  <a class="d-md-none text-decoration-none ps-0" href="<?php echo URLROOT . '/Admin/lihat_user_page/' . $datas->id_user ?>"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><i class="align-middle" data-feather="eye"></i></button></a>
                  <a class="text-decoration-none ps-0" href="<?php echo URLROOT . '/Admin/edit_user_page/' . $datas->id_user ?>"><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="align-middle" data-feather="edit"></i></button></a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $datas->id_user ?>"><i class="align-middle" data-feather="trash-2"></i></button>
                </td>
              </tr>

              <div class="modal fade" id="exampleModal<?php echo $datas->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo $datas->username ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Anda Yakin Ingin Menghapus?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo URLROOT . '/Admin/hapus_user/' . $datas->id_user ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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