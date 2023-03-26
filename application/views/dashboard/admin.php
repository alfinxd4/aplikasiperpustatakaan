<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Perpustakaan Rekayasatu</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main/app-theme.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main/app-dark-theme.css">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/favicon.svg" type="image/x-icon">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/favicon.png" type="image/png">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/shared/iconly.css">
</head>

<body>
	<div id="app">
		<div id="main" class="layout-horizontal">
			<!-- include topbar menu -->
			<?php $this->load->view('include/topbar'); ?>
			<!-- Main Page Dashboard  -->
			<div class="content-wrapper container">
				<!-- Page Heading -->
				<div class="page-heading">
					<h3>Dashboard</h3>
				</div>
				<div class="page-content">
					<section class="row">
						<div class="col-12 col-lg-9">
							<div class="row">
								<div class="col-6 col-lg-3 col-md-6">
									<div class="card">
										<div class="card-body px-4 py-4-5">
											<div class="row">
												<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
													<div class="stats-icon purple mb-2">
														<i class="iconly-boldAdd-User"></i>
													</div>
												</div>
												<!-- Count Member -->
												<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
													<h6 class="text-muted font-semibold">Member</h6>
													<h6 class="font-extrabold mb-0"><?php echo $countmember ?></h6>
													<div class="float-end  mt-2 ">
														<a href="<?php echo base_url() ?>member" class="btn btn-sm btn-secondary rounded-pill">Lihat <i class="bi bi-arrow-right-short"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 col-lg-3 col-md-6">
									<div class="card">
										<div class="card-body px-4 py-4-5">
											<div class="row">
												<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
													<div class="stats-icon blue mb-2">
														<i class="iconly-boldDocument"></i>
													</div>
												</div>
												<!-- Count Buku -->
												<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
													<h6 class="text-muted font-semibold">Buku</h6>
													<h6 class="font-extrabold mb-0"><?php echo $countbuku ?></h6>
													<div class="float-end  mt-2">
														<a href="<?php echo base_url() ?>buku" class="btn btn-sm btn-secondary rounded-pill">Lihat <i class="bi bi-arrow-right-short"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 col-lg-3 col-md-6">
									<div class="card">
										<div class="card-body px-4 py-4-5">
											<div class="row">
												<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
													<div class="stats-icon green mb-2">
														<i class="iconly-boldWallet"></i>
													</div>
												</div>
												<!-- Count Peminjaman -->
												<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
													<h6 class="text-muted font-semibold">Peminjaman</h6>
													<h6 class="font-extrabold mb-0"><?php echo $countpeminjaman ?></h6>
													<div class="float-end mt-2">
														<a href="<?php echo base_url() ?>laporan/peminjaman" class="btn btn-sm btn-secondary rounded-pill">Lihat <i class="bi bi-arrow-right-short"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 col-lg-3 col-md-6">
									<div class="card">
										<div class="card-body px-4 py-4-5">
											<div class="row">
												<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">

													<div class="stats-icon red mb-2">
														<i class="iconly-boldBookmark"></i>
													</div>
												</div>
												<!-- Count Pengembalian -->
												<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
													<h6 class="text-muted font-semibold">Pengembalian</h6>
													<h6 class="font-extrabold mb-0"><?php echo $countpengembalian ?></h6>
													<div class="float-end mt-2">
														<a href="" class="btn btn-sm btn-secondary rounded-pill">Lihat <i class="bi bi-arrow-right-short"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</section>
				</div>
			</div>
			<!-- include footer  -->
			<?php $this->load->view('include/footer'); ?>
		</div>
	</div>
	<!-- Bootstrap Main page Javascript -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>assets/js/app.js"></script>
	<script src="<?php echo base_url() ?>assets/js/pages/horizontal-layout.js"></script>
	<script src="<?php echo base_url() ?>assets/js/pages/dashboard.js"></script>
	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>