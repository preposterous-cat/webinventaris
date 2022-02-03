<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Web Inventaris">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Login | Users </title>

	<link href="<?php echo URLROOT . '/public/css/app.css' ?>" rel="stylesheet">
	<link href="<?php echo URLROOT . '/public/css/custom_user.css' ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Halaman Users</h1>
							<p class="lead">
								Login
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="<?php echo URLROOT . '/Users/index' ?>" method="POST">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Masukkan Username" autocomplete="off" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Masukkan Password" />
										</div>
										<label class="text-danger" <?php if (empty($data['passwordError'])) {
                        echo "hidden";
                      } ?>><?php echo $data['passwordError'] ?></label>
										<div class="mb-3">
											<span>Belum Memiliki Akun? Silakan <a href="<?php echo URLROOT . '/Users/register_page' ?>" class="text-user">Register</a></span>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg bg-user text-white">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>


	<script src="<?php echo URLROOT . '/public/js/app.js' ?>"></script>

</body>

</html>