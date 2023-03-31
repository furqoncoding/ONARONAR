<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
	<!-- BEGIN: Head-->
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
		<meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
		<meta name="author" content="PIXINVENT">
		<title><?php echo $title; ?></title>
		<link rel="apple-touch-icon" href="<?php echo base_url(); ?>app-assets/images/logo/antv-red.svg">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>app-assets/images/logo/antv-red.png">
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
		
		<!-- BEGIN: Vendor CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/vendors.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/forms/icheck/icheck.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/forms/icheck/custom.css">
		<!-- END: Vendor CSS-->
		
		<!-- BEGIN: Theme CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/bootstrap-extended.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/colors.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/components.css">
		<!-- END: Theme CSS-->
		
		<!-- BEGIN: Page CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/colors/palette-gradient.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/pages/login-register.css">
		<!-- END: Page CSS-->
		
		<!-- BEGIN: Custom CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
		<!-- END: Custom CSS-->
		
	</head>
	<!-- END: Head-->
	
	<!-- BEGIN: Body-->
	
	<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
		<!-- BEGIN: Content-->
		
		
		<div class="app-content content">
			<div class="content-wrapper">
				<div class="content-header row mb-1">
				</div>
				<div class="content-body">
					<section class="flexbox-container">
						<div class="col-12 d-flex align-items-center justify-content-center">
							<div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
								<div class="card border-grey border-lighten-3 px-1 py-1 m-0">
									<div class="card-header border-0">
										<div class="card-title text-center">
											<img width="50%" src="<?php echo base_url(); ?>app-assets/images/logo/antv-red.svg" alt="branding logo">
										</div>
										<h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>ONAR</span></h6>
									</div>
									<div class="card-content">
										
										<div class="card-body">
											
											<div id="infoMessage"><?php echo $message;?></div>
											
											
											
											
											
											
											<form class="form-horizontal" action="<?php echo base_url()."index.php/auth/login"; ?>" novalidate method="POST">
												<fieldset class="form-group position-relative has-icon-left">
													<input type="text" class="form-control" id="identity" name="identity" placeholder="Your Username" required>
													<div class="form-control-position">
														<i class="ft-user"></i>
													</div>
												</fieldset>
												<fieldset class="form-group position-relative has-icon-left">
													<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
													<div class="form-control-position">
														<i class="la la-key"></i>
													</div>
												</fieldset>
												
												<button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
											</form>
										</div>
										
										
									</div>
								</div>
							</div>
						</div>
					</section>
					
				</div>
			</div>
		</div>
		<!-- END: Content-->
		
		
		<!-- BEGIN: Vendor JS-->
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/vendors.min.js"></script>
		<!-- BEGIN Vendor JS-->
		
		<!-- BEGIN: Page Vendor JS-->
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
		<!-- END: Page Vendor JS-->
		
		<!-- BEGIN: Theme JS-->
		<script src="<?php echo base_url(); ?>app-assets/js/core/app-menu.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/js/core/app.js"></script>
		<!-- END: Theme JS-->
		
		<!-- BEGIN: Page JS-->
		<script src="<?php echo base_url(); ?>app-assets/js/scripts/forms/form-login-register.js"></script>
		<!-- END: Page JS-->
		
		<script type="text/javascript">
			$(document).ready(function () {
				toastrStateConfig();
			});
			function toastrStateConfig()
			{
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-bottom-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}	
			}
			
		</script>
		
		<?php if($this->session->flashdata('error')) { ?>
			<script>$(function () {toastr.error('<?php echo $this->session->flashdata('error'); ?>', '');});</script>
		<?php } ?>
		<?php if($this->session->flashdata('success')) { ?>
			<script>$(function () {toastr.success('<?php echo $this->session->flashdata('success'); ?>', '');});</script>
		<?php } ?>
	</body>
	
</body>
<!-- END: Body-->

</html>








