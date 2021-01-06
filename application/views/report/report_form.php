<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"><?php echo $title; ?></h4>
			</div>
			<div class="card-content collpase show">
				<div class="card-body">
					<form class="form" action="<?php echo $action; ?>" method="post">
						
						<div class="form-group col-12 mb-2">
							<label for="engineer_name">Engineer Name</label>
							<?php
								if(!empty($row)){
									
									$result= array();
									$result['-']="-";
									
									if(!empty($row)){
										foreach ($row as $engineer) {
											$result[$engineer->NAME]=$engineer->NAME;
										}
									} 
									echo form_dropdown('engineer_name', $result,$engineer_name,"class='select2 form-control' id='engineer_name'"); 
								}
							?>
						</div>
						<div class="form-group col-6 mb-2">
							<label for="event_date">Event Date</label>
							<input type="date" id="event_date" class="form-control" name="event_date" placeholder="Event_date" value="<?php echo $event_date; ?>" />
						</div>
						
						<div class="form-group col-12 mb-2">
							
							<label for="priority">Priority <?php echo form_error('priority') ?></label>
							
							<?php 
								$result= array();
								$result['']= "Pilih Priority";
								$result['very high']= 'very high';
								$result['high']= 'high';
								$result['medium']= 'medium';
								$result['low']= 'low';
								//sort($result);
								echo form_dropdown('priority', $result,$priority,"class='form-control' id='priority'");
							?>
							
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="outage_type">Outage Type</label>
							<?php
								if(!empty($row_outage)){
									
									$result= array();
									$result['']= "Pilih Outage Type";
									
									foreach ($row_outage as $outage) {
										
										$result[$outage->id]= $outage->outage_name;
									}
									//sort($result);
									echo form_dropdown('outage_type', $result,$outage_type,"class='select2 form-control' id='outage_type'");
								}
							?>
						</div>
						<div class="row col-12 mb-2">
							<div class="form-group col-md-6 mb-2">
								<h5>Start Time</h5>
								<div class="position-relative has-icon-left">
									<input type="text" class="form-control input-lg" id="start_time" name="start_time" placeholder="Start Time" value="<?php echo $start_time; ?>" />
									<div class="form-control-position">
										<i class="ft-clock"></i>
									</div>
								</div>
							</div>
							<div class="form-group col-md-6 mb-2">
								<h5>End Time</h5>
								<div class="position-relative has-icon-left">
									<input type="text" class="form-control input-lg" id="end_time" name="end_time" placeholder="End Time" value="<?php echo $end_time; ?>" />
									<div class="form-control-position">
										<i class="ft-clock"></i>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="event_type">Event Type</label>
							<?php
								if(!empty($row_eventtype)){
									
									$result= array();
									$result['']= "Pilih Event Type";
									foreach ($row_eventtype as $event) {
										
										$result[$event->id]= $event->event_type_name;
									}
									//sort($result);
									echo form_dropdown('event_type', $result,$event_type,"class='select2 form-control' id='event_type'");
								}
							?>
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="departments_in_charge">Department in Charge</label>
							<?php
								if(!empty($row_department)){
									
									$result= array();
									$result['']= "Pilih Department";
									foreach ($row_department as $depart) {
										
										$result[$depart->id]= $depart->department_name;
									}
									//sort($result);
									echo form_dropdown('departments_in_charge', $result,$departments_in_charge,"class='select2 form-control' id='departments_in_charge'");
								}
							?>
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="onairchief">Duty Manager</label>
							<?php
								if(!empty($row_onairchief)){
									
									$result= array();
									$result['-']= "-";
									foreach ($row_onairchief as $onair) {
										
										$result[$onair->id]= $onair->onairchief_description;
									}
									//sort($result);
									echo form_dropdown('onairchief', $result,$onairchief,"class='select2 form-control' id='onairchief'");
								}
							?>
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="program_name">Program Name<?php echo form_error('program_name') ?></label>
							<input required="" type="text" class="form-control" name="program_name" id="program_name" placeholder="Program Name" value="<?php echo $program_name; ?>" />
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="program_type">Program Type</label>
							<?php
								if(!empty($row_programtype)){
									
									$result= array();
									$result['']= "Pilih Program Type";
									
									foreach ($row_programtype as $program) {
										
										$result[$program->id]= $program->program_type_description;
									}
									// sort($result);
									echo form_dropdown('program_type', $result,$program_type,"class='select2 form-control' id='program_type'");
								}
							?>
							
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="player">Source</label>
							<?php
								if(!empty($row_player)){
									
									$result= array();
									$result['']= "Pilih Source";
									foreach ($row_player as $play) {
										
										$result[$play->id]= $play->player_description;
									}
									//sort($result);
									echo form_dropdown('player', $result,$player,"class='select2 form-control' id='player'");
								}
							?>
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="temperatur">Temperatur<?php echo form_error('temperatur') ?></label>
							<input required="" type="text" class="form-control" name="temperatur" id="temperatur" placeholder="Temperatur" value="<?php echo $temperatur; ?>" />
						</div>
						
						<div class="form-group col-12 mb-2">
							<label for="problem">Problem<?php echo form_error('problem') ?></label>
						<textarea rows="5" input required="" type="text" class="form-control" name="problem" id="problem" placeholder="Problem" /><?php echo $problem; ?></textarea>
					</div>
					
					<?php
						if(isset($is_update)){	
						?>
						<div class="form-group col-12 mb-2">
							<label for="status">Status</label>
							<?php
								if(!empty($row_status)){
									
									$result= array();
									$result['']= "Pilih Status";
									foreach ($row_status as $stats) {
										
										$result[$stats->id]= $stats->status_name;
									}
									//sort($result);
									echo form_dropdown('status', $result,$status,"class='select2 form-control' id='status'");
								}
							?>
							
						</div>
						<?php
						}	
					?>
					
					<div class="form-group col-12 mb-2">
						<label for="caused_by">Caused By<?php echo form_error('problem') ?></label>
					<textarea rows="5" input required="" type="text" class="form-control" name="caused_by" id="caused_by" placeholder="Caused by" /><?php echo $caused_by; ?></textarea>
				</div>
				
				
				<div class="form-group col-12 mb-2">
					<label for="problem">Action Taken<?php echo form_error('action_taken') ?></label>
				<textarea rows="5" input required="" type="text" class="form-control" name="action_taken" id="action_taken" placeholder="Action taken" /><?php echo $action_taken; ?></textarea>
			</div>
			
			<div class="form-group col-12 mb-2">
				<label for="problem">Recommendation<?php echo form_error('recommendation') ?></label>
			<textarea rows="5" input required="" type="text" class="form-control" name="recommendation" id="recommendation" placeholder="Recommendation" /><?php echo $recommendation; ?></textarea>
		</div>
		
		<div class="form-group col-6 mb-2">
			<label for="follow_up_date">Follow Up Date</label>
			<?php	if(!isset($is_update)){?>
				
				<input type="date" id="follow_up_date" class="form-control" name="follow_up_date" placeholder="follow_up_date" value="<?php echo $follow_up_date; ?>"/>
				<?php } else {?>
				<br>
				
				<label for="follow_up_date">
					<a href="<?php echo base_url().'index.php/report/report_follow_up_date/'.$id?>">
						<?php echo $follow_up_date; ?>
						(<?php echo $hitung; ?>)
						
					</a>
				</label>
			<?php } ?>
		</div>
		
		<center>
			<div class="form-actions text-center">
				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				
				<button type="button" class="btn btn-danger" >
					<a href="<?php echo site_url('report/report_list') ?>">Cancel</a>
				</button>
				<button type="submit" class="btn btn-success">
					<href="<?php echo base_url().'index.php/report/report_list/'?>"><?php echo $button; ?> 
					</button>
				</div>
			</center>
		</form>
	</div>	
</div>
</div>
</div>
</div>
