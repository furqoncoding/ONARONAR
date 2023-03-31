<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class=" nav-item"><a href="<?php echo base_url(); ?>index.php/welcome"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
			</li>
			<li class=" nav-item"><a href="index.html"><i class="la la-gg"></i><span class="menu-title" data-i18n="nav.dash.main">Master Data</span>
				<ul class="menu-content">
					<li <?php echo ($icon=="eventtype" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/eventtype"><i></i><span data-i18n="nav.dash.ecommerce">Event Type</span></a>
					</li>
					<li <?php echo ($icon=="outagelist" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/outagelist"><i></i><span data-i18n="nav.dash.crypto">Outage List</span></a>
					</li>
					<li <?php echo ($icon=="programtype" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/programtype"><i></i><span data-i18n="nav.dash.sales">Program Type</span></a>
					<li <?php echo ($icon=="player" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/source"><i></i><span data-i18n="nav.dash.sales">Source</span></a>
					<li <?php echo ($icon=="department" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/department"><i></i><span data-i18n="nav.dash.sales">Department</span></a>
					<li <?php echo ($icon=="users" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/users"><i></i><span data-i18n="nav.dash.sales">Users</span></a>
					<li <?php echo ($icon=="status" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/status"><i></i><span data-i18n="nav.dash.sales">Status</span></a>
					<li <?php echo ($icon=="onairchief" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/dm"><i></i><span data-i18n="nav.dash.sales">Duty Manager</span></a>
					</li>
				</ul>

			<li class=" nav-item"><a href="index.html"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="nav.dash.main">Report</span>
				<ul class="menu-content">
					<li <?php echo ($icon=="report" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/report"><i></i><span data-i18n="nav.dash.ecommerce">Input New Report</span></a>
					</li>
					<li <?php echo ($icon=="report_list" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/report/report_list"><i></i><span data-i18n="nav.dash.crypto">View and Update</span></a>
					</li>
					<li <?php echo ($icon=="report_form_read" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/report/report_form_read"><i></i><span data-i18n="nav.dash.sales">Daily Report</span></a>
					<li <?php echo ($icon=="report_search" ? "class='active'":""); ?>><a class="menu-item" href="<?php echo base_url(); ?>index.php/report/report_search"><i></i><span data-i18n="nav.dash.sales">Searching</span></a>
					</li>
				</ul> 
			</ul>	
		</div>
	</div>
</div>	

