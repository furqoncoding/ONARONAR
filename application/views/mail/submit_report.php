<!DOCTYPE html> 
<html>
	<head>
		<title> On Air Report </title>
	</head>
	<body>
		<center>
			<h1>On Air Report</h1>
			
			<?php
				function format_hari_tanggal($waktu)
				{
					$hari_array = array(
					'Minggu',
					'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu'
					);
					$hr = date('w', strtotime($waktu));
					$hari = $hari_array[$hr];
					$tanggal = date('j', strtotime($waktu));
					$bulan_array = array(
					1 => 'Januari',
					2 => 'Februari',
					3 => 'Maret',
					4 => 'April',
					5 => 'Mei',
					6 => 'Juni',
					7 => 'Juli',
					8 => 'Agustus',
					9 => 'September',
					10 => 'Oktober',
					11 => 'November',
					12 => 'Desember',
					);
					$bl = date('n', strtotime($waktu));
					$bulan = $bulan_array[$bl];
					$tahun = date('Y', strtotime($waktu));
					$jam = date( 'H:i:s', strtotime($waktu));
					
					//untuk menampilkan hari, tanggal bulan tahun jam
					//return "$hari, $tanggal $bulan $tahun $jam";
					
					//untuk menampilkan hari, tanggal bulan tahun
					return "$hari, $tanggal $bulan $tahun";
				}
				$date=date('Y-m-d');
				echo "<br>".format_hari_tanggal($date);
			?>
			
			
			
			<?php if($jumlah!=0){ ?>
				<table border="1" class="table">
					<table border="1" style="width:100%" href="style.css" class="table">
					<tr>
						<th style="width:70%">No</th>
						<th>Engineer Name</th>
						<th>Report Date</th>
						<th>Priority</th>
						<th>Outage Type</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Event Type</th>
						<th>On Air Chief</th>
						<th>Departments in Charge</th>
						<th>Program Name</th>
						<th>Program Type</th>
						<th>Player</th>
						<th>Temperatur</th>
						<th>Problem</th>
						<th>Caused By</th>
						<th>Action Taken</th>
						<th>Recommendation</th>
						<th>Status</th></br>
						
					</tr>
					
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
								<td><?php echo $i+1; ?></td>
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
								<td><?php echo $data->status_name; ?></td><br>
							</tr>
							
							<?php 
								
							} 
						}
						
						
						else{?>
						
					</center>
					<div style="padding-top:20%;">
						<br>No On Air Issue.</br>
					<?php }?>
					
				</tbody>
			</table>
			<p><b><i>Please do not reply to this email, this report created by application - ANTV Information Technology</b></i></p>
			
			
			
			
			
		</body>
	</html>		
