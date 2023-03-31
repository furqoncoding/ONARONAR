<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Chart morris.js</title>
		<!--<link rel="stylesheet" href="<?php echo base_url().'app-assets/vendors/css/charts/morris.css'?>">-->
		<link rel="stylesheet" href="/path/to/morris.css">
		<script src="<?php echo base_url().'app-assets/js/core/libraries/jquery.min.js'?>"></script>
		<script src="<?php echo base_url().'app-assets/vendors/js/charts/raphael-min.js'?>"></script>
		<script src="<?php echo base_url().'app-assets/vendors/js/charts/morris.min.js'?>"></script>
		<!--<script src="/path/to/jquery.min.js"></script>
			<script src="/path/to/raphael-min.js"></script>
		<script src="/path/to/morris.min.js"></script>-->
	</head>
	<body>
		<!-- Bar Chart -->
		
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">	
						<h4 class="card-title">Bar1 Chart</h4>
						<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
								<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
								<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
								<li><a data-action="close"><i class="ft-x"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="card-content collapse show">
						<div class="card-body">
							<ul class="list-inline text-center">
								<li>
									<h6><i class="ft-circle purple"></i> Data 1</h6>
								</li>
								<li>
									<h6><i class="ft-circle pink"></i> Data 2</h6>
								</li>
							</ul>
							<div id="myfirstchart" style="height: 250px;"></div>
							<!--<div id="bar-chart" class="height-400"></div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- Bar Chart -->
		
		<script>
			new Morris.Bar({
			// ID of the element in which to draw the chart.
			element: 'myfirstchart',
			// Chart data records -- each entry in this array corresponds to a point on
			// the chart.
			/**data: [
			{ year: '2008', value: 20 },
			{ year: '2009', value: 10 },
			{ year: '2010', value: 5 },
			{ year: '2011', value: 5 },
			{ year: '2012', value: 20 }
			],**/
			data: <?php echo $data;?>,
			// The name of the data record attribute that contains x-values.
			xkey: 'event_date',
			// A list of names of data record attributes that contain y-values.
			ykeys: ['event_type','outage_type'],
			// Labels for the ykeys -- will be displayed when you hover over the
			// chart.
			labels: ['eventtype','outagetype']
			});
		</script>
		
		
	</body>
</html>			