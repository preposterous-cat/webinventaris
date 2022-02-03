<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

		<div class="row">
			<div class="col-xl-8 col-xxl-5">
			<div class="card w-100 overflow-auto">
					<div class="card-header">

						<h5 class="card-title mb-0">Histori Login Bulan Ini</h5>
					</div>
					<div class="card-body w-100">
						<div class="table-responsive w-100">
							<table class="table data-table table-hover my-2" style="width: 100%">
								<thead>
									<tr>
										<th class="ps-0">Username</th>
										<th class="d-table-cell">Tanggal</th>
										<th class="d-table-cell">Waktu</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data['histori'] as $datas) :?>
									<tr>
										<td class="ps-0"><?php echo $datas->username ?></td>
										<td class="d-table-cell"><?php echo date('d-m-Y', strtotime($datas->tanggal))  ?></td>
										<td class="d-table-cell"><?php echo date('H:i:s', strtotime($datas->tanggal))  ?></td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-xxl-7">
				<div class="card flex-fill">
					<div class="card-header">

						<h5 class="card-title mb-0">Kalender</h5>
					</div>
					<div class="card-body d-flex">
						<div class="align-self-center w-100">
							<div class="chart">
								<div id="datetimepicker-dashboard"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="w-100">
				<div class="row">

					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Barang Masuk</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-admin">
											<i class="align-middle" data-feather="corner-up-left"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3"><?php echo $data['bm'] ?></h1>
								<div class="mb-0">
									<a class="text-admin text-decoration-none" href="<?php echo URLROOT . '/Users/kelola_bm_page' ?>">More Info<i class="float-end text-admin" data-feather="arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Barang Keluar</h5>
									</div>

									<div class="col-auto">
										<div class="stat text-admin">
											<i class="align-middle" data-feather="corner-up-right"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3"><?php echo $data['bk'] ?></h1>
								<div class="mb-0">
									<a class="text-admin text-decoration-none" href="<?php echo URLROOT . '/Users/kelola_bk_page' ?>">More Info<i class="float-end text-admin" data-feather="arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</main>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
		var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
		document.getElementById("datetimepicker-dashboard").flatpickr({
			inline: true,
			prevArrow: "<span title=\"Previous month\">&laquo;</span>",
			nextArrow: "<span title=\"Next month\">&raquo;</span>",
			defaultDate: Date.now()
		});
	});
</script>