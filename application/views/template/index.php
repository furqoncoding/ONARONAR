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
		<link rel="shortcut icon" href="<?php echo base_url(); ?>app-assets/images/logo/antv-red.png">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
		
		
		<!-- BEGIN: Vendor CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/vendors.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/calendars/fullcalendar.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/forms/selects/select2.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/extensions/timedropper.min.css">
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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/charts/morris.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/fonts/simple-line-icons/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/colors/palette-gradient.css">
		<link href="<?php echo base_url()?>app-assets/css/toastr/toastr.css?1425466569" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/plugins/calendars/fullcalendar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/extensions/timedropper.min.css">
		<!-- END: Page CSS-->
		
		<!-- BEGIN: Custom CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
		<!-- END: Custom CSS-->
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/tables/datatable/datatables.min.css">
		
	</head>
	<!-- END: Head-->
	
	<!-- BEGIN: Body-->
	
	<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
		
		<!-- BEGIN: Header-->
		<?php echo $header; ?>
		
		<!-- END: Header-->
		
		
		<!-- BEGIN: Main Menu-->
		
		<?php echo $menubar; ?>
		<!-- END: Main Menu-->
		<!-- BEGIN: Content-->
		<div class="app-content content">
			<div class="content-wrapper">
				<div class="content-header row mb-1">
				</div>
				<div class="content-body">
					
					<?php echo $content; ?>
				</div>
			</div>
		</div>
		<!-- END: Content-->
		
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
		
		<!-- BEGIN: Footer-->
		<footer class="footer footer-static footer-light navbar-border navbar-shadow">
			<?php echo $footer; ?>
		</footer>
		<!-- END: Footer-->
		
		
		<!-- BEGIN: Vendor JS-->
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/vendors.min.js"></script>
		<!-- BEGIN Vendor JS-->
		
		<!-- BEGIN: Page Vendor JS-->
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/chart.min.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/raphael-min.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/morris.min.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/data/jvector/visitor-data.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/timedropper.min.js"></script>
		<!-- END: Page Vendor JS-->
		
		<!-- BEGIN: Theme JS-->
		<script src="<?php echo base_url(); ?>app-assets/js/core/app-menu.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/js/core/app.js"></script>
		<!-- END: Theme JS-->
		
		<!-- BEGIN: Page JS-->
		<script src="<?php echo base_url(); ?>app-assets/js/scripts/pages/dashboard-sales.js"></script>
		<!-- END: Page JS-->
		
		<script src="<?php echo base_url(); ?>app-assets/js/toastr/toastr.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/js/scripts/tables/datatables/datatable-basic.js"></script>
		
		<script src="<?php echo base_url(); ?>app-assets/js/scripts/extensions/fullcalendar.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
		
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/js/scripts/forms/select/form-select2.js"></script>
		
		<script src="<?php echo base_url(); ?>app-assets/js/scripts/extensions/date-time-dropper.js"></script>
		<script src="<?php echo base_url(); ?>app-assets/vendors/js/extensions/timedropper.min.js"></script>
		
		
		<script type="text/javascript">
			$(document).ready(function () {
				toastrStateConfig();
				
				
				$('#fc-default-1').fullCalendar({
				
				
					defaultDate: "<?php echo date('Y-m-d') ?>",
					eventLimit: true, // allow "more" link when too many events
					events: [
					<?php foreach ($row as $data) : ?>
					
					
					{
						title: 'SUBMIT REPORT',
						start: "<?php echo $data->event_date; ?>",
						url: "<?php echo base_url().'index.php/report/report_list_by_date/'.date('Y-m-d', strtotime( $data->event_date)); ?>",

					},
					{
					
						title: '<?php echo $data->outage_name; ?>',
						start: "<?php echo $data->event_date; ?>",
						url: "<?php echo base_url().'index.php/report/report_list_by_date/'.date('Y-m-d', strtotime( $data->event_date)); ?>",
						

					},
					
					<?php endforeach; ?>
					],
					navLinks: true,
					navLinkDayClick: function(date, jsEvent) {
						window.location = "<?php echo base_url().'index.php/report/report_list_by_date/'; ?>" + date.toISOString();
					}
					
					
				});
				
				$(".select2").select2();
				$( "#start_time" ).timeDropper({ setCurrentTime: false });
				$( "#end_time" ).timeDropper({ setCurrentTime: false });
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
	<!-- END: Body-->
	
</html>

