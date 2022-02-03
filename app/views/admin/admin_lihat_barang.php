<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Lihat Barang</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label class="form-label">ID Barang</label>
              <input type="text" class="form-control form-control-lg" name="id_barang" value="<?php echo $data['data_barang']->id_barang ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Barang</label>
              <input type="text" class="form-control form-control-lg" name="nama_barang" value="<?php echo $data['data_barang']->nama_barang ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Supplier</label>
              <select name="supplier" class="form-select mb-3" disabled>
                <option value="<?php echo $data['data_barang']->supplier ?>" selected><?php echo $data['data_barang']->supplier ?></option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Stok</label>
              <input type="number" class="form-control form-control-lg" name="stok" value="<?php echo $data['data_barang']->stok ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Kondisi Barang</label>
              <select name="kondisi" class="form-select mb-3" disabled>
                <option value="<?php echo $data['data_barang']->kondisi ?>" selected><?php echo $data['data_barang']->kondisi ?></option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Biaya Satuan</label>
              <input type="number" class="form-control form-control-lg" name="biaya_stn" value="<?php echo $data['data_barang']->biaya_stn ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Biaya Total</label>
              <input type="number" class="form-control form-control-lg" name="biaya_total" value="<?php echo $data['data_barang']->biaya_total ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Model/Merk</label>
              <input type="text" class="form-control form-control-lg" name="merk" value="<?php echo $data['data_barang']->merk ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Sumber Dana</label>
              <input type="text" class="form-control form-control-lg" name="sumber" value="<?php echo $data['data_barang']->sumber ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Barang</label>
              <select name="jenis" class="form-select mb-3" disabled>
                <option value="<?php echo $data['data_barang']->jenis ?>" selected><?php echo $data['data_barang']->jenis ?></option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Diunggah Oleh</label>
              <input type="text" class="form-control form-control-lg" name="diunggah" value="<?php echo $data['data_barang']->diunggah ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Waktu Unggah</label>
              <input type="text" class="form-control form-control-lg" name="tanggal" value="<?php echo date('d-F-Y, H:i:s', strtotime($data['data_barang']->tanggal)) ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Barang Masuk Terakhir</label>
              <input type="text" class="form-control form-control-lg" name="bm_terakhir" value="<?php if ($data['data_barang']->bm_terakhir != null) {
                echo date('d-F-Y, H:i:s', strtotime($data['data_barang']->bm_terakhir));
              }else echo "--Belum ada Barang Masuk--";  ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Barang Keluar Terakhir</label>
              <input type="text" class="form-control form-control-lg" name="bk_terakhir" value="<?php if ($data['data_barang']->bk_terakhir != null) {
                echo date('d-F-Y, H:i:s', strtotime($data['data_barang']->bk_terakhir));
              }else echo "--Belum ada Barang Keluar--";  ?>" readonly>
            </div>
          </form>
          <div class="text-start">
            <a href="<?php echo URLROOT . '/Admin/kelola_barang_page' ?>"><button class="btn btn-lg bg-admin text-white">Back</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>