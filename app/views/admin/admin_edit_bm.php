<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Edit Barang Masuk</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Admin/edit_bm' ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">ID Barang Masuk</label>
              <input type="number" class="form-control form-control-lg" name="id_bm" value="<?php echo $data['bm']->id_bm ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Barang</label>
              <select name="id_barang" class="form-select mb-3">
                <?php foreach ($data['barang'] as $datas) :?>
                  <option value="<?php echo $datas->id_barang ?>" <?php if ($data['bm']->id_barang == $datas->id_barang) {
                    echo "selected";
                  }else echo "disabled "."hidden" ?>><?php echo $datas->nama_barang.' - '.$datas->supplier.' ('.$datas->kondisi.', '.$datas->jenis.') Harga Satuan: '.$datas->biaya_stn ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah</label>
              <input type="number" class="form-control form-control-lg" name="jumlah" value="<?php echo $data['bm']->jumlah ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Biaya</label>
              <input type="number" class="form-control form-control-lg" name="biaya" value="<?php echo $data['bm']->biaya ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Sumber Dana</label>
              <input type="text" class="form-control form-control-lg" name="sumber" value="<?php echo $data['bm']->sumber ?>" required>
            </div>
            <div class="text-start">
              <button type="submit" class="btn btn-lg bg-admin text-white">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>