<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Lihat Barang Keluar</h5>
        </div>
        <div class="card-body">
          <form>
          <div class="mb-3">
              <label class="form-label">Pilih Barang</label>
              <select name="id_barang" class="form-select mb-3" disabled>
                <option disabled selected>--Pilih Barang--</option>
                <?php foreach ($data['barang'] as $datas) :?>
                  <option value="<?php echo $datas->id_barang ?>" <?php if ($data['bk']->id_barang == $datas->id_barang) {
                    echo "selected";
                  } ?>><?php echo $datas->nama_barang.' - '.$datas->supplier.' ('.$datas->kondisi.', '.$datas->jenis.')' ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah</label>
              <input type="number" class="form-control form-control-lg" name="jumlah" value="<?php echo $data['bk']->jumlah ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan</label>
              <textarea class="form-control" rows="3" name="keterangan" readonly><?php echo $data['bk']->keterangan?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Diunggah Oleh</label>
              <input type="text" class="form-control form-control-lg" name="diunggah" value="<?php echo $data['bk']->diunggah ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Diunggah Tanggal</label>
              <input type="text" class="form-control form-control-lg" name="tanggal" value="<?php echo date('d-F-Y, H:i:s', strtotime($data['bk']->tanggal)) ?>" readonly>
            </div>
          </form>
          <div class="text-start">
          <a href="<?php echo URLROOT . '/Admin/kelola_bk_page' ?>"><button class="btn btn-lg bg-admin text-white">Back</button></a>
        </div>
      </div>
    </div>
  </div>
</main>