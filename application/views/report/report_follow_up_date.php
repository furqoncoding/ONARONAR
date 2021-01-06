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
							<label for="id">ID<?php echo form_error('no') ?></label>
							<input required="" type="text" class="form-control" name="id_report" id="id_report"  value="<?php echo $id_report; ?>" />
						</div>
						<div class="form-group col-6 mb-2">
							<label for="follow_up_date">Follow Up Date<?php echo form_error('follow_up_date') ?></label>
							<input required="" type="date" class="form-control" name="follow_up_date" id="follow_up_date" placeholder="Follow Up Date" value="<?php echo $follow_up_date; ?>" />
						</div>
						<div class="form-group col-12 mb-2">
							<label for="description">Follow Up Description<?php echo form_error('Follow Up Description') ?></label>
							<textarea rows="5" input required="" type="text" class="form-control" name="description" id="description" placeholder="Follow Up Description" /><?php echo $description; ?></textarea>
						</div>
					<center>
						<div class="form-actions text-center">
							
							<button type="button" class="btn btn-danger">
								<a href="<?php echo site_url('report/report_list') ?>" class="ft-x">Cancel</a>
							</button>
							<button type="submit" class="btn btn-success">
								<i class="la la-check-square-o" href="<?php echo base_url().'index.php/report/create_follow/'?>"><?php echo $button; ?></i> 
							</button>
						</div>
					</center>
				</form>
			</div>
		</div>
	</div>
</div>
</div>