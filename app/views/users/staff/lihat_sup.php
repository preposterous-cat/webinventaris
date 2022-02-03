<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Lihat Supplier</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label class="form-label">ID Supplier</label>
              <input type="text" class="form-control form-control-lg" name="id_supplier" value="<?php echo $data['data_sup']->id_supplier ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Supplier</label>
              <input type="text" class="form-control form-control-lg" name="nama_sup" value="<?php echo $data['data_sup']->nama_sup ?>" placeholder="Masukkan Nama Supplier" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat" readonly><?php echo $data['data_sup']->alamat ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control form-control-lg" name="nomor" value="<?php echo $data['data_sup']->nomor ?>" placeholder="Masukkan Nomor Telepon" readonly>
            </div>
          </form>
          <div class="text-start">
            <a href="<?php echo URLROOT . '/Users/kelola_sup_page' ?>"><button class="btn btn-lg bg-user text-white">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>