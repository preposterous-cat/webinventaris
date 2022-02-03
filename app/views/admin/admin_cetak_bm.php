<main class="content">
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">Unduh Barang Masuk Berdasarkan Tanggal</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Admin/cetak_bm' ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Dari tanggal</label>
              <input type="date" class="form-control form-control-lg" name="tanggal_awal" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Sampai tanggal</label>
              <input type="date" class="form-control form-control-lg" name="tanggal_akhir" required>
            </div>
            <div class="text-start">
              <button type="submit" class="btn btn-lg bg-admin text-white">Unduh</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title mb-0">Unduh Barang Masuk Berdasarkan Barang</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Admin/cetak_bm2' ?>" method="POST">
          <div class="mb-3">
              <label class="form-label">Pilih Barang</label>
              <select name="nama_barang" class="form-select mb-3" required>
                <option disabled selected>--Pilih Barang--</option>
                <?php 
                $barang = [];
                foreach ($data['barang'] as $datas) {
                  if (!in_array($datas->nama_barang, $barang)) {
                    array_push($barang, $datas->nama_barang);
                  }
                }?>
                <?php for ($i=0; $i < count($barang); $i++) :?>
                  <option value="<?php echo $barang[$i] ?>"><?php echo $barang[$i] ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="text-start">
              <button type="submit" class="btn btn-lg bg-admin text-white">Unduh</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>