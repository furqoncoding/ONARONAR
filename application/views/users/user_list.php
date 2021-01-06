
<div class="content-body">
	<!-- Zero configuration table -->
	
	
	<section id="configuration">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><?php echo $title; ?></h4>
						<br>
						<a style="color:white" href="<?php echo $create; ?>" type="button" class="btn btn-secondary btn-min-width sr-1 mb-1 btn-sm float-md-left">Create</a>
						
					</div>

					<div class="card-content collapse show">
						<div class="card-body card-dashboard">
							
							<div class="table-responsive">
								<table class="table table-striped table-bordered zero-configuration">
									<thead>
										<tr>
											<th style="width:70%">Email</th>
											<th>Active</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($row as $data) { ?>
											<tr>
												<td><?php echo $data->email; ?></td>
												<td><?php echo $data->active; ?></td>
												<td>
													
                                                    <!-- Split Button Dropdown -->
                                                    <div class="btn-group mr-1 mb-1 ">
                                                        <button type="button" class="btn-sm btn btn-secondary">Action</button>
                                                        <button type="button" class="btn-sm btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														</button>
                                                        <div class="dropdown-menu btn-sm">
                                                            <a class="dropdown-item" href="<?php echo base_url().'index.php/users/read/'.$data->id ?>">Read</a>
                                                            <a class="dropdown-item" href="<?php echo base_url().'index.php/users/update/'.$data->id ?>">Update</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" onclick='return confirm("Are you sure?");' href="<?php echo base_url().'index.php/users/delete/'.$data->id ?>">Delete</a>
															</div>
													</div>	
												</td>
											</tr>
											
										<?php } ?>
									</tbody>
									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>