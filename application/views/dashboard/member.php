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
					<h3>Daftar Buku</h3>
				</div>
				<div class="page-content">
					<section>
						<div class="row mb-2">
							<?php
							// get data from tb buku, connect to controller buku
							foreach ($buku->result() as $row) :
							?>
								<div class=" col-sm-6 col-6 col-md-3 d-flex flex">
									<div class="card">
										<div class="card-content">
											<div class="card-body">
												<img class="img-fluid w-100" src="<?= base_url() . 'upload/' . $row->foto_buku; ?>">
												<h6 class="card-text text-md my-4"> <?php echo $row->judul; ?></h6>
												<p class="card-text text-sm mb-0">
													<i class="bi bi-diamond-half">
														<span class="align-middle">
															<?php echo $row->kode_buku; ?>
														</span>
													</i>
												</p>

												<p class="card-text text-sm mt-0">
													<?php echo $row->pengarang; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- end looping -->
						</div>


						<div class="mt-4">
							<!--Tampilkan pagination-->
							<?php echo $pagination; ?>
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