<div class="content-body">
	<!-- Zero configuration table -->
	<section id="configuration">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><?php echo $title; ?></h4>
					</div>
					<div class="card-content collpase show">
						<div class="card-body card-dashboard">
							<div class="table-responsive">
								
								<table class="table table-striped table-bordered zero-configuration">
									
									<thead>
										<tr>
											<th style="width:70%">No</th>
											<th></th>
											<th>Status</th>
											<th>Engineer Name</th>
											<th>Report Date</th>
											<th>Priority</th>
											<th>Outage Type</th>
											<th>Start Time</th>
											<th>End Time</th>
											<th>Event Type</th>
											<th>Duty Manager</th>
											<th>Departments in Charge</th>
											<th>Program Name</th>
											<th>Program Type</th>
											<th>Source</th>
											<th>Temperatur</th>
											<th>Problem</th>
											<th>Caused By</th>
											<th>Action Taken</th>
											<th>Recommendation</th>
											<th></th>
										</tr>
									</thead>
									
									<tbody>
										<?php 
										$i=1;
										foreach ($row as $data) { //print_r($row);?>
											<tr>
												<td><?php echo $i; ?></td>
												<td>
													<!-- Split Button Dropdown -->
													<div class="btn-group mr-1 mb-1 ">
														<button type="button" class="btn-sm btn btn-secondary">Action</button>
														<button type="button" class="btn-sm btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														</button>
														<div class="dropdown-menu btn-sm">
															<a class="dropdown-item" href="<?php echo base_url().'index.php/report/update/'.$data->id ?>">Update</a>
														</div>
													</div>
												</td>
												<td><?php echo $data->status_name; ?></td>
												<td><?php echo $data->engineer_name; ?></td>
												<td><?php echo $data->event_date; ?></td>
												<td><?php echo $data->priority; ?></td>
												<td><?php echo $data->outage_name; ?></td>
												<td><?php echo $data->start_time; ?></td>
												<td><?php echo $data->end_time; ?></td>
												<td><?php echo $data->event_type_name; ?></td>
												<td><?php echo $data->onairchief_description; ?></td>
												<td><?php echo $data->department_name; ?></td>
												<td><?php echo $data->program_name; ?></td>
												<td><?php echo $data->program_type_description; ?></td>
												<td><?php echo $data->player_description; ?></td>
												<td><?php echo $data->temperatur; ?></td>
												<td><?php echo $data->problem; ?></td>
												<td><?php echo $data->caused_by; ?></td>
												<td><?php echo $data->action_taken; ?></td>
												<td><?php echo $data->recommendation; ?></td>
												<td>
													<!-- Split Button Dropdown -->
													<div class="btn-group mr-1 mb-1 ">
														<button type="button" class="btn-sm btn btn-secondary">Action</button>
														<button type="button" class="btn-sm btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														</button>
														<div class="dropdown-menu btn-sm">
															<a class="dropdown-item" href="<?php echo base_url().'index.php/report/update/'.$data->id ?>">Update</a>
														</div>
													</div>
												</td>
											</tr>
										<?php 
											$i++;
											} ?>
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