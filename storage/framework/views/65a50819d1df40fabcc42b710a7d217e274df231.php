<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="Sistema de seguimiento académico INELMU" />
		<meta name="description" content="Sistema de seguimiento académico INELMU">
		<meta name="author" content="TKT">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('vendor/animate/animate.css')); ?>">

		<link rel="stylesheet" href="<?php echo e(asset('vendor/font-awesome/css/fontawesome-all.min.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('vendor/magnific-popup/magnific-popup.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('css/theme.css')); ?>" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('css/skins/default.css')); ?>" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

		<!-- Head Libs -->
		<script src="<?php echo e(asset('vendor/modernizr/modernizr.js')); ?>"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<img src="img/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Acceder</h2>
					</div>
					<div class="card-body">
                        <?php $__env->startSection('contenido'); ?>
                            <?php echo $__env->yieldSection(); ?>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2018. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo e(asset('vendor/jquery/jquery.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/jquery-browser-mobile/jquery.browser.mobile.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/popper/umd/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/common/common.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/nanoscroller/nanoscroller.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
		<script src="<?php echo e(asset('vendor/jquery-placeholder/jquery-placeholder.js')); ?>"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo e(asset('js/theme.js')); ?>"></script>

		<!-- Theme Custom -->
		<script src="<?php echo e(asset('js/custom.js')); ?>"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo e(asset('js/theme.init.js')); ?>"></script>

	</body>
</html>
<?php /**PATH /var/www/SISAC/resources/views/layouts/login.blade.php ENDPATH**/ ?>