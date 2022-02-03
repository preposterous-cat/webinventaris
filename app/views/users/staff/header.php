<?php 
  if (!isset($_SESSION['id_user']) || $_SESSION['bagian'] != 'Staff') {
    header('location:' . URLROOT . '/Users/index');
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
    <link href="<?php echo URLROOT . '/public/css/custom_user.css' ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="">
          <span class="align-middle"><?php echo $_SESSION['nama'] ?> - Staff</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Dashboard
					</li>

					<li class="sidebar-item <?php echo $data['dashboard'] ?>">
						<a class="sidebar-link" href="<?php echo URLROOT . '/Users/dashboard_staff_page' ?>">
                <i class="align-middle" data-feather="trending-up"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

          <li class="sidebar-header">
						Manajemen
					</li>

          <li class="sidebar-item <?php echo $data['tambah_barang'] ?>">
              <a class="sidebar-link" href="<?php echo URLROOT . '/Users/tambah_barang_page' ?>">
                  <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Tambah Barang</span>
              </a>
          </li>
          <li class="sidebar-item <?php echo $data['kelola_barang'] ?>">
              <a class="sidebar-link" href="<?php echo URLROOT . '/Users/kelola_barang_page' ?>">
                  <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Kelola Barang</span>
              </a>
          </li>

          <li class="sidebar-item <?php echo $data['tambah_sup'] ?>">
              <a class="sidebar-link" href="<?php echo URLROOT . '/Users/tambah_sup_page' ?>">
                  <i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Tambah Supplier</span>
              </a>
          </li>
          <li class="sidebar-item <?php echo $data['kelola_sup'] ?>">
              <a class="sidebar-link" href="<?php echo URLROOT . '/Users/kelola_sup_page' ?>">
                  <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Kelola Supplier</span>
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
								<span class="text-dark">Hello, </span>
                <p class="text-user d-inline"><?php echo $_SESSION['username'] ?></p>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?php echo URLROOT . '/Users/edit_profil_staff' ?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item text-danger" href="<?php echo URLROOT . '/Users/logout' ?>">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>