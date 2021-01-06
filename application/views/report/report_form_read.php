
<div class="content-body">
	<!-- Full calendar basic example section start -->
	<section id="basic-examples">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Please Select Date</h4>
						<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
						<div class="heading-elements">
							<ul class="list-inline mb-0">
								<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
								<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
								<li><a data-action="close"><i class="ft-x"></i></a></li>
							</ul>
						</div>
					</div>
					<?php foreach ($row as $data) { ?>
					<div class="card-content collapse show">
						<div class="card-body">
							<div id='fc-default-1'></div>
					<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- // Full calendar basic example section end -->
</div>
