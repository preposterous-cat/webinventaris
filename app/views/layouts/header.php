<?php 
  if (!isset($_SESSION['id_admin'])) {
    header('location:' . URLROOT . '/Admin/index');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Web Inventaris">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title> <?php echo $data['title'] ?> </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT . '/public/css/app.css' ?>" rel="stylesheet">
    <link href="<?php echo URLROOT . '/public/css/custom_admin.css' ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle">Admin</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Dashboard
					</li>

					<li class="sidebar-item <?php echo $data['dashboard'] ?>">
						<a class="sidebar-link" href="<?php echo URLROOT . '/Admin/dashboard_page' ?>">
                <i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

          <li class="sidebar-header">
						Manajemen
					</li>

					<li class="sidebar-item">
            <a
                class="sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
            >
                <i class="align-middle" data-feather="box"></i>
                <span class="align-middle">Barang</span>
                <span class="ms-auto">
                <span class="right-icon">
                    <i class="float-end" data-feather="chevron-down"></i>
                </span>
                </span>
            </a>
              <div class="collapse" id="layouts">
                  <ul class="sidebar-nav">
                  <li class="sidebar-item ms-2 <?php echo $data['tambah_barang'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/tambah_barang_page' ?>">
                          <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Tambah Barang</span>
                      </a>
                  </li>
                  <li class="sidebar-item ms-2 <?php echo $data['kelola_barang'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/kelola_barang_page' ?>">
                          <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Kelola Barang</span>
                      </a>
                  </li>
                  </ul>
              </div>
					</li>

          <li class="sidebar-item">
              <a
                  class="sidebar-link"
                  data-bs-toggle="collapse"
                  href="#layouts2"
              >
                  <i class="align-middle" data-feather="truck"></i>
                  <span class="align-middle">Supplier</span>
                  <span class="ms-auto">
                  <span class="right-icon">
                      <i class="float-end" data-feather="chevron-down"></i>
                  </span>
                  </span>
              </a>
              <div class="collapse" id="layouts2">
                  <ul class="sidebar-nav">
                  <li class="sidebar-item ms-2 <?php echo $data['tambah_sup'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/tambah_sup_page' ?>">
                          <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Tambah Supplier</span>
                      </a>
                  </li>
                  <li class="sidebar-item ms-2 <?php echo $data['kelola_sup'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/kelola_sup_page' ?>">
                          <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Kelola Supplier</span>
                      </a>
                  </li>
                  </ul>
              </div>
					</li>

          <li class="sidebar-item">
              <a
                  class="sidebar-link"
                  data-bs-toggle="collapse"
                  href="#layouts3"
              >
                  <i class="align-middle" data-feather="corner-up-left"></i>
                  <span class="align-middle">Barang Masuk</span>
                  <span class="ms-auto">
                  <span class="right-icon">
                      <i class="float-end" data-feather="chevron-down"></i>
                  </span>
                  </span>
              </a>
              <div class="collapse" id="layouts3">
                  <ul class="sidebar-nav">
                  <li class="sidebar-item ms-2 <?php echo $data['tambah_bm'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/tambah_bm_page' ?>">
                          <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Tambah Barang Masuk</span>
                      </a>
                  </li>
                  <li class="sidebar-item ms-2 <?php echo $data['kelola_bm'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/kelola_bm_page' ?>">
                          <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Kelola Barang Masuk</span>
                      </a>
                  </li>
                  </ul>
              </div>
					</li>

          <li class="sidebar-item">
              <a
                  class="sidebar-link"
                  data-bs-toggle="collapse"
                  href="#layouts4"
              >
                  <i class="align-middle" data-feather="corner-up-right"></i>
                  <span class="align-middle">Barang Keluar</span>
                  <span class="ms-auto">
                  <span class="right-icon">
                      <i class="float-end" data-feather="chevron-down"></i>
                  </span>
                  </span>
              </a>
              <div class="collapse" id="layouts4">
                  <ul class="sidebar-nav">
                  <li class="sidebar-item ms-2 <?php echo $data['tambah_bk'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/tambah_bk_page' ?>">
                          <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Tambah Barang Keluar</span>
                      </a>
                  </li>
                  <li class="sidebar-item ms-2 <?php echo $data['kelola_bk'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/kelola_bk_page' ?>">
                          <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Kelola Barang Keluar</span>
                      </a>
                  </li>
                  </ul>
              </div>
					</li>

            <li class="sidebar-item">
              <a
                  class="sidebar-link"
                  data-bs-toggle="collapse"
                  href="#layouts5"
              >
                  <i class="align-middle" data-feather="users"></i>
                  <span class="align-middle">Pengguna</span>
                  <span class="ms-auto">
                  <span class="right-icon">
                      <i class="float-end" data-feather="chevron-down"></i>
                  </span>
                  </span>
              </a>
              <div class="collapse" id="layouts5">
                  <ul class="sidebar-nav">
                  <li class="sidebar-item ms-2 <?php echo $data['kelola_staff'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/kelola_staff_page' ?>">
                          <i class="align-middle" data-feather="pocket"></i> <span class="align-middle">Staff</span>
                      </a>
                  </li>
                  <li class="sidebar-item ms-2 <?php echo $data['kelola_sekretaris'] ?>">
                      <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/kelola_sekretaris_page' ?>">
                          <i class="align-middle" data-feather="book"></i> <span class="align-middle">Sekretaris</span>
                      </a>
                  </li>
                  </ul>
              </div>
            </li>

            <li class="sidebar-header">
                Laporan
            </li>

            <li class="sidebar-item <?php if($data['title'] == "Cetak Barang Masuk | Admin")
            {
                echo 'active';
            } ?>">
                <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/cetak_bm_page' ?>">
                    <i class="align-middle" data-feather="download"></i> <span class="align-middle">Laporan Barang Masuk</span>
                </a>
            </li>

            <li class="sidebar-item <?php if($data['title'] == "Cetak Barang Keluar | Admin")
            {
                echo 'active';
            } ?>">
                <a class="sidebar-link" href="<?php echo URLROOT . '/Admin/cetak_bk_page' ?>">
                    <i class="align-middle" data-feather="download"></i> <span class="align-middle">Laporan Barang Keluar</span>
                </a>
            </li>
            </ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<span class="text-dark">Admin</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item text-danger" href="<?php echo URLROOT . '/Admin/logout' ?>">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>