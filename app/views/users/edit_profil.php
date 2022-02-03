<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Profile</strong></h1>

		<div class="row">
			<div class="col-md-6 col-xxl-5">
			  <div class="card flex-fill w-100">
					<div class="card-header">

						<h5 class="card-title mb-0">Profile</h5>
					</div>
					<div class="card-body d-block w-100">
          <form>
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control form-control-lg" name="nama" value="<?php echo $data['user']->nama ?>" readonly>
              </div>
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control form-control-lg" name="username" value="<?php echo $data['user']->username ?>" readonly>
              </div>
              <div class="mb-3">
                <label class="form-label">Bagian</label>
                <input type="text" class="form-control form-control-lg" name="bagian" value="<?php echo $data['user']->bagian ?>" readonly>
              </div>
            </form>
				  </div>
			  </div>
      </div>

      <div class="col-md-6 col-xxl-7 d-flex">
			  <div class="card flex-fill w-100">
					<div class="card-header">

						<h5 class="card-title mb-0">Edit</h5>
					</div>
					<div class="card-body d-block w-100">
            <form action="<?php echo URLROOT . '/Users/edit_profil' ?>" method="POST">
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
              </div>
              <label class="text-danger" <?php if (empty($data['unameError'])) {
                  echo "hidden";
                } ?>><?php echo $data['unameError'] ?></label>
              <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Masukkan Password Baru" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password Lama</label>
                <input type="password" class="form-control form-control-lg" name="old_password" placeholder="Konfirmasi Password Lama" required>
                <label class="text-danger" <?php if (empty($data['errorPW'])) {
                  echo "hidden";
                } ?>><?php echo $data['errorPW'] ?></label>
              </div>
              <div class="text-start">
                <button type="submit" class="btn btn-lg bg-user text-white">Submit</button>
              </div>
            </form>
				  </div>
			  </div>
      </div>

    </div>
	</div>
</main>
