<script>
		function checkAll(parent, field)
	{
		var children = document.getElementsByName(field);
		var newValue = parent.checked;
		
		
		for (i = 0; i < children.length; i++){
			children[i].checked = newValue;
		}
	}
	
</script>



<form class="form" action="<?php echo $action; ?>" method="post">
	
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
									<table class="table table-bordered">
										<thead>
											<tr>
												<th style="width:70%">ID</th>
												<th>Select to Send <br><center><input type="checkbox"  onClick="checkAll(this, 'multiUpdate[]')" /></center></th>
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
												<th>Player</th>
												<th>Temperatur</th>
												<th>Problem</th>
												<th>Caused By</th>
												<th>Action Taken</th>
												<th>Recommendation</th>
												<th>Follow Up</th>
												<th>Select to Send</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($row as $data) { ?>
												<input hidden type="text" name="totalReport[]" value="<?php echo count($data->id); ?>">
												<tr>
													<td><?php echo $data->id; ?></td>
													<td>
														
														<!-- Basic Checkbox start -->
														<div class="col-sm-12">
															<center><fieldset class="checkbox">
																<input type="checkbox" id="multiUpdate[]" name="multiUpdate[]" value="<?php echo $data->id; ?>"> </input>
															</fieldset>
															
															
															</center>
														</div>
													</td>
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
													<td><?php echo $data->follow_up_date; ?></td>
													<td>
														
														<!-- Basic Checkbox start -->
														<div class="col-sm-12">
															<center><fieldset class="checkbox">
																<input type="checkbox" value="report_list_by_date">
															</fieldset></center>
														</div>
													</td>
												</tr>
											<?php $date= $data->event_date; }  ?>
											
										</tbody>
									</table>
									<center>
										<div class="form-actions text-center">
											<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
											<button type="button" class="btn btn-danger">
												<a href="<?php echo site_url('report/report_form_read') ?>">Cancel</a>
											</button> 
											<button type="submit" class="btn btn-success">
												<div href="<?php echo base_url().'index.php/Email/'?>"><?php echo $button; ?></div> 
											</button>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>									
	</div>										