<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Tambah Supplier</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Users/tambah_sup' ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Nama Supplier</label>
              <input type="text" class="form-control form-control-lg" name="nama_sup" placeholder="Masukkan Nama Supplier" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control" rows="3" name="alamat" placeholder="Masukkan Alamat" required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control form-control-lg" name="nomor" placeholder="Masukkan Nomor Telepon" required>
            </div>
            <div class="text-start">
              <button type="submit" class="btn btn-lg bg-user text-white">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>