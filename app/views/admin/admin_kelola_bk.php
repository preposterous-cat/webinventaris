<main class="content">
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">Daftar Barang Keluar Hari Ini</h5>
        </div>
          <div class="table-responsive px-2 mb-2">
          <table class="table data-table table-hover my-2" style="width: 100%">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th class="d-none d-sm-table-cell">Nama Supplier</th>
                <th class="d-none d-sm-table-cell">Jumlah</th>
                <th class="d-none d-sm-table-cell">Keterangan</th>
                <th class="d-none d-sm-table-cell">Diunggah Oleh</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($data['bk_sekarang'] as &$datas):?>
              <tr>
                <td><?php echo $datas->nama_barang ?></td>
                <td class="d-none d-sm-table-cell"><?php echo $datas->supplier ?></td>
                <td class="d-none d-sm-table-cell"><?php echo $datas->jumlah ?></td>
                <td class="d-none d-sm-table-cell"><?php echo $datas->keterangan ?></td>
                <td class="d-none d-sm-table-cell"><?php echo $datas->diunggah ?></td>
                <td><?php echo date('d-m-Y', strtotime($datas->tanggal)) ?></td>
                <td class="d-block d-sm-table-cell">
                  <a class="d-md-none text-decoration-none" href="<?php echo URLROOT . '/Admin/lihat_bk_page/' . $datas->id_bk ?>"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><i class="align-middle" data-feather="eye"></i></button></a>
                  <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/edit_bk_page/' . $datas->id_bk ?>"><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="align-middle" data-feather="edit"></i></button></a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $datas->id_bk ?>"><i class="align-middle" data-feather="trash-2"></i></button>
                </td>
              </tr>

              <div class="modal fade" id="exampleModal<?php echo $datas->id_bk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo 'Barang Keluar ' . $datas->nama_barang ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Anda Yakin Ingin Menghapus?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/hapus_bk/' . $datas->id_bk ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
              endforeach;
              unset($datas);
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">Cari Barang Keluar</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Admin/kelola_bk_page' ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Dari tanggal</label>
              <input type="date" class="form-control form-control-lg" name="tanggal_awal" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Sampai tanggal</label>
              <input type="date" class="form-control form-control-lg" name="tanggal_akhir" required>
            </div>
            <div class="text-start">
              <button type="submit" class="btn btn-lg bg-admin text-white">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php if ($data['tampil'] == true) :?>
    <div class="row">
      <div class="col-12 d-flex">
        <div class="card flex-fill">
          <div class="card-header">

            <h5 class="card-title mb-0">Daftar Barang Keluar <?php echo $data['tanggal_awal']. ' sampai ' . $data['tanggal_akhir'] ?></h5>
          </div>
          <?php if ($data['sortedBy_tanggal'] != null) {?>
            <div class="table-responsive px-2 mb-2">
              <table class="table table data-table table-hover my-2" style="width: 100%">
                <thead>
                  <tr>
                  <th>Nama Barang</th>
                  <th class="d-none d-sm-table-cell">Nama Supplier</th>
                  <th class="d-none d-sm-table-cell">Jumlah</th>
                  <th class="d-none d-sm-table-cell">Keterangan</th>
                  <th class="d-none d-sm-table-cell">Diunggah Oleh</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($data['sortedBy_tanggal'] as &$datasorted):?>
                <tr>
                  <td><?php echo $datasorted->nama_barang ?></td>
                  <td class="d-none d-sm-table-cell"><?php echo $datasorted->supplier ?></td>
                  <td class="d-none d-sm-table-cell"><?php echo $datasorted->jumlah ?></td>
                  <td class="d-none d-sm-table-cell"><?php echo $datasorted->keterangan ?></td>
                  <td class="d-none d-sm-table-cell"><?php echo $datasorted->diunggah ?></td>
                  <td><?php echo date('d-m-Y', strtotime($datasorted->tanggal)) ?></td>
                  <td class="d-block d-sm-table-cell">
                    <a class="d-md-none text-decoration-none" href="<?php echo URLROOT . '/Admin/lihat_bk_page/' . $datasorted->id_bk ?>"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><i class="align-middle" data-feather="eye"></i></button></a>
                    <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/edit_bk_page/' . $datasorted->id_bk ?>"><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="align-middle" data-feather="edit"></i></button></a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $datasorted->id_bk ?>"><i class="align-middle" data-feather="trash-2"></i></button>
                  </td>
                </tr>

                <div class="modal fade" id="exampleModal<?php echo $datasorted->id_bk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo 'Barang Keluar ' . $datasorted->nama_barang ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Anda Yakin Ingin Menghapus?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a class="text-decoration-none" href="<?php echo URLROOT . '/Admin/hapus_bk/' . $datasorted->id_bk ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php 
                endforeach;
                ?>
                </tbody>
              </table>
            </div>
          <?php }else echo '<div class="text-center">Data tidak ditemukan</div>' ?>
        </div>
      </div>
    </div>
  <?php endif ?>
</main>