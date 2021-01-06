<!DOCTYPE html> 
<html>
	<head>
		<title>On Air Report</title>
		<style>
			<?php include 'style.css'; ?>
		</style>
	</head>
	<body>
	
	<center>
		<img src="<?php echo base_url(); ?>app-assets/images/logo/logo2.png">
		</center>
		
		<center>
			<p class="serif">On Air Report</p>
			<p class="serif-tgl"><?php echo format_indo($date);?></p>
		</center>
		<hr style="height:1px;border-width:0;color:gray;background-color:gray">
		<?php if($jumlah!=0){ ?>
			<table class="table1" border="1" style="width:100%" link rel="stylesheet" type="text/css" href="style.css">
				<tbody>
					<?php 
						//print_r($rows);exit;
						
						//$i=1;
						
						for($i=0; $i < $jumlah; $i++) {
							
							$id=$multiUpdate[$i];
							//$row=$this->Report_model->get_by_id($id);
							$data=$this->db->query("SELECT * FROM onar_v_report WHERE id='$id'")->row();
						?>
						<tr>
							<th><style="width:30%;">No:</th>
								<td width="70%"><?php echo $i+1; ?></td>
							</tr>
							<tr>
								<th>Engineer Name:</th>
								<td><?php echo $data->engineer_name; ?></td>
							</tr>
							<tr>
								<th>Report Date:</th>
								<td><?php echo $data->event_date; ?></td>
							</tr>
							<tr>
								<th>Priority:</th>
								<td><?php echo $data->priority; ?></td>
							</tr>
							<tr>
								<th>Outage Type:</th>
								<td><?php echo $data->outage_name; ?></td>
							</tr>
							<tr>
								<th>Start Time:</th>
								<td><?php echo $data->start_time; ?></td>
							</tr>
							<tr>
								<th>End Time:</th>
								<td><?php echo $data->end_time; ?></td>
							</tr>
							<tr>
								<th>Event Type:</th>
								<td><?php echo $data->event_type_name; ?></td>
							</tr>
							<tr>
								<th>Duty Manager:</th>
								<td><?php echo $data->onairchief_description; ?></td>
							</tr>
							<tr>
								<th>Departments in Charge:</th>
								<td><?php echo $data->department_name; ?></td>
							</tr>
							<tr>
								<th>Program Name:</th>
								<td><?php echo $data->program_name; ?></td>
							</tr>
							<tr>
								<th>Program Type:</th>
								<td><?php echo $data->program_type_description; ?></td>
							</tr>
							<tr>
								<th>Source:</th>
								<td><?php echo $data->player_description; ?></td>
							</tr>
							<tr>
								<th>Temperatur:</th>
								<td><?php echo $data->temperatur; ?></td>
							</tr>
							<tr>
								<th>Problem:</th>
								<td><?php echo $data->problem; ?></td>
							</tr>
							<tr>
								<th>Caused By:</th>
								<td><?php echo $data->caused_by; ?></td>
							</tr>
							<tr>
								<th>Action Taken:</th>
								<td><?php echo $data->action_taken; ?></td>
							</tr>
							<tr>
								<th>Recommendation:</th>
								<td><?php echo $data->recommendation; ?></td>
							</tr>
							<tr>
								<th>Status:</th>
								<td><?php echo $data->status_name; ?></td>
							</tr>
							
							<?php 
								
							} 
						}
						
						
						else{?>
						
						
						<div style="padding-top:20%;">
							<br>No On Air Issue.</br>
						<?php }?>	
					</tbody>
				</table>
				<div class="footer">
					<div class="container"><b>Please do not reply to this email, this report created by application</b></p>PT. Cakrawala Andalas Televisi. Developed by IT Application - Information Technology Department.</div>
				</div>
			</body>
		</html>		
		