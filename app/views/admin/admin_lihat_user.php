<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Lihat Data User</h5>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label class="form-label">ID User</label>
              <input type="text" class="form-control form-control-lg" name="id_user" value="<?php echo $data['data_user']->id_user ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control form-control-lg" name="username" value="<?php echo $data['data_user']->username ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Bagian</label>
              <input type="text" class="form-control form-control-lg" name="bagian" value="<?php echo $data['data_user']->bagian ?>" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="text" class="form-control form-control-lg" name="password" value="<?php echo $data['data_user']->password ?>" readonly>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>