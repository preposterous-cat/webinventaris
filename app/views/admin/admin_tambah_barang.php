<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Tambah Barang</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Admin/tambah_barang' ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Nama Barang</label>
              <input type="text" class="form-control form-control-lg" name="nama_barang" placeholder="Masukkan Nama Barang" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Supplier</label>
              <select name="supplier" class="form-select mb-3" required>
                <option value="" disabled selected>Pilih Supplier</option>
                <?php foreach ($data['nama_sup'] as $datas) : ?>
                  <option value="<?php echo $datas->nama_sup ?>"><?php echo $datas->nama_sup ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Stok</label>
              <input type="number" class="form-control form-control-lg" name="stok" placeholder="Masukkan Jumlah" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Kondisi Barang</label>
              <select name="kondisi" class="form-select mb-3" required>
                <option value="Baru" selected>Baru</option>
                <option value="Bekas">Bekas</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Biaya Satuan</label>
              <input type="number" class="form-control form-control-lg" name="biaya_stn" placeholder="Masukkan Biaya Satuan" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Model/Merk</label>
              <input type="text" class="form-control form-control-lg" name="merk" placeholder="Masukkan Model/Merk" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Sumber Dana</label>
              <input type="text" class="form-control form-control-lg" name="sumber" placeholder="Masukkan Sumber Dana" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jenis Barang</label>
              <select name="jenis" class="form-select mb-3" required>
                <option value="Sarana" selected>Sarana</option>
                <option value="Prasarana">Prasarana</option>
              </select>
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