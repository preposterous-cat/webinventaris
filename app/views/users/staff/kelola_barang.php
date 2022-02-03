<main class="content">
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">Daftar Barang</h5>
        </div>
        <div class="table-responsive px-2 mb-2">
          <table class="table data-table table-hover my-2" style="width: 100%">
            <thead>
              <tr>
                <th class="ps-0">No</th>
                <th class="ps-0">Nama Barang</th>
                <th class="d-none d-md-table-cell">Supplier</th>
                <th class="d-none d-md-table-cell">Stok</th>
                <th class="d-none d-md-table-cell">Diunggah Oleh</th>
                <th class="d-none d-md-table-cell">Tanggal Unggah</th>
                <th class="d-block d-md-table-cell">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no=1;
            foreach ($data['data_barang'] as $datas) :?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $datas->nama_barang ?></td>
                <td class="d-none d-md-table-cell"><?php echo $datas->supplier ?></td>
                <td class="d-none d-md-table-cell"><?php echo $datas->stok ?></td>
                <td class="d-none d-md-table-cell"><?php echo $datas->diunggah ?></td>
                <td class="d-none d-md-table-cell"><?php echo date('d-m-Y', strtotime($datas->tanggal)) ?></td>
                <td class="d-block d-md-table-cell">
                  <a class="text-decoration-none" href="<?php echo URLROOT . '/Users/lihat_barang_page/' . $datas->id_barang ?>"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><i class="align-middle" data-feather="eye"></i></button></a>
                  <a class="text-decoration-none" href="<?php echo URLROOT . '/Users/edit_barang_page/' . $datas->id_barang ?>"><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="align-middle" data-feather="edit"></i></button></a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $datas->id_barang ?>"><i class="align-middle" data-feather="trash-2"></i></button>
                    
                </td>
              </tr>
              <div class="modal fade" id="exampleModal<?php echo $datas->id_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus <?php echo $datas->nama_barang ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Anda Yakin Ingin Menghapus?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="<?php echo URLROOT . '/Users/hapus_barang/' . $datas->id_barang ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>