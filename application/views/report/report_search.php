<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"><?php echo $title; ?></h4>
			</div>
			<div class="card-content collpase show">
				<div class="card-body">
					<form class="form" action="<?php echo $action; ?>" method="post">
						<div class="form-group col-6 mb-2">
							<label for="event_type">by Event Type</label>
							<select class="select2 form-control col-6 mb-2" name="event_type">
							<option value="">Pilih Event Type</option>
										
								<?php
									if(!empty($row_eventtype)){
										foreach ($row_eventtype as $data) {
										?>
										<option value="<?php echo $data->id ; ?>"><?php echo $data->event_type_name?></option>
										<?php
										}
									}
								?>
							</select>	
						</div>
						
						<div class="form-group col-6 mb-2">
							<label for="outage_type">by Problem Type</label>
							<select class="select2 form-control col-6 mb-2" name="outage_type">
							<option value="">Pilih Problem Type</option>
								<?php
									if(!empty($row_outage)){
										foreach ($row_outage as $data) {
										?>
										<option value="<?php echo $data->id ; ?>"><?php echo $data->outage_name?></option>
										<?php
										}
									}
								?>
							</select>	
						</div>
					<center>
						<div class="form-actions text-center">
							<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
							<button type="button" class="btn btn-danger">
							<a href="<?php echo site_url('report/report_search') ?>">Cancel</a>
							</button>
							<button type="submit" class="btn btn-success">
							<href="<?php echo base_url().'index.php/report/report_search_by_query'?>"><?php echo $button; ?> 
							</button>
						</div>
					</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>							