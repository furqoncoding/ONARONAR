
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
										<label for="email">Email</label>
										<?php
											if(!empty($row)){
												
												$result= array();
												$result['']="-";
												
												if(!empty($row)){
													foreach ($row as $data) {
														$result[$data->EMAIL]=$data->NAME;
													}
												} 
												echo form_dropdown('email', $result,$email,"class='select2 form-control' id='email'"); 
											}
										?>
										
									</div>
									
									<div class="form-group">
										
										<label for="active">Active <?php echo form_error('active') ?></label>
										<?php 
											$result= array();
											$result['']= "Status Active";
											$result['0']= '0';
											$result['1']= '1';
											
											echo form_dropdown('active', $result,$active,"class='form-control' id='active'");
											
										?>
									</div>
									<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
									<button type="submit" class="btn btn-secondary"><?php echo $button ?></button> 
									<a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
								</form>
							</body>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>										