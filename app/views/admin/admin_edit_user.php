<main class="content">
  <div class="container row">
    <div class="col-12 col-sm-11 justify-content-center">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Edit Data User</h5>
        </div>
        <div class="card-body">
          <form action="<?php echo URLROOT . '/Admin/edit_user' ?>" method="POST">
          <div class="mb-3">
              <label class="form-label">ID</label>
              <input type="text" class="form-control form-control-lg" value="<?php echo $data['user']->id_user ?>" name="id_user" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control form-control-lg" name="nama" value="<?php echo $data['user']->nama ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control form-control-lg" name="username" value="<?php echo $data['user']->username ?>" required>
              <label class="text-danger" <?php if (empty($data['unameError'])) {
                echo "hidden";
              } ?>><?php echo $data['unameError'] ?></label>
            </div>
            <div class="mb-3">
              <label class="form-label">Password Baru</label>
              <input type="password" class="form-control form-control-lg" name="password" placeholder="Masukkan Password Baru" required>
              <label class="text-danger" <?php if (empty($data['errorPW'])) {
                echo "hidden";
              } ?>><?php echo $data['errorPW'] ?></label>
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