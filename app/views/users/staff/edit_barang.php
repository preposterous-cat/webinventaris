<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Edit Barang</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Users/edit_barang' ?>" method="POST">
          <div class="mb-3">
              <label class="form-label">ID Barang</label>
              <input type="text" class="form-control form-control-lg" value="<?php echo $data['data_barang']->id_barang ?>" name="id_barang" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Barang</label>
              <input type="text" class="form-control form-control-lg" value="<?php echo $data['data_barang']->nama_barang ?>" name="nama_barang" placeholder="Masukkan Nama Barang" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Supplier</label>
              <select name="supplier" class="form-select mb-3" required>
                <?php foreach ($data['nama_sup'] as $datas) : ?>
                  <option value="<?php echo $datas->nama_sup ?>" <?php if ($datas->nama_sup == $data['data_barang']->supplier) {
                    echo 'selected';
                  } ?>><?php echo $datas->nama_sup ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Stok</label>
              <input type="number" class="form-control form-control-lg" name="stok" value="<?php echo $data['data_barang']->stok ?>" placeholder="Masukkan Jumlah" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Kondisi Barang</label>
              <select name="kondisi" class="form-select mb-3" required>
                <option value="Baru" <?php if ("Baru" == $data['data_barang']->kondisi) {
                    echo 'selected';
                  } ?>>Baru</option>
                <option value="Bekas" <?php if ("Bekas" == $data['data_barang']->kondisi) {
                    echo 'selected';
                  } ?>>Bekas</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Biaya Satuan</label>
              <input type="number" class="form-control form-control-lg" name="biaya_stn" value="<?php echo $data['data_barang']->biaya_stn ?>" placeholder="Masukkan Biaya Satuan" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Model/Merk</label>
              <input type="text" class="form-control form-control-lg" name="merk" value="<?php echo $data['data_barang']->merk ?>" placeholder="Masukkan Model/Merk" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Sumber Dana</label>
              <input type="text" class="form-control form-control-lg" name="sumber" value="<?php echo $data['data_barang']->sumber ?>" placeholder="Masukkan Sumber Dana" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Barang</label>
              <select name="jenis" class="form-select mb-3" required>
                <option value="Sarana" <?php if ("Sarana" == $data['data_barang']->jenis) {
                    echo 'selected';
                  } ?>>Sarana</option>
                <option value="Prasarana" <?php if ("Prasarana" == $data['data_barang']->jenis) {
                    echo 'selected';
                  } ?>>Prasarana</option>
              </select>
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