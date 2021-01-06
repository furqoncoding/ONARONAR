
<div class="content-body">
	<!-- Zero configuration table -->
	
	<section id="configuration">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><?php echo $title; ?></h4>
						<br>
						
					</div>
					
					<div class="card-content collapse show">
						<div class="card-body card-dashboard">
							
							<form action="<?php echo $action; ?>" method="post" class="form-horizontal">
								<div class="box-body">
									
									<div class="form-group">
										
										<label for="email">Email<?php echo form_error('email') ?></label>
										<input required="" type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
									</div>
									<div class="form-group">
										
										<label for="active">Active<?php echo form_error('active') ?></label>
										<?php 
											$result= array();
											$result['']= "Active";
											
											$result['0']= '0';
											$result['1']= '1';
											
											
											echo form_dropdown('active', $result,$active,"class='form-control' id='active'");	
										?>
									</div>
									<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
								</form>
							</body>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>