<?php
	$c = $this->uri->segment(1);
	$f = $this->uri->segment(2);
?>
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER TOP -->
	<div class="page-header-top">
		<div class="container">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="<?= site_url('dashboard') ?>">
				<img src="<?= site_url() ?>assets/admin/layout3/img/wamp-pos-black.png" alt=""/>
				</a>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler"></a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
						<span class="username username-hide-mobile">Welcome <?= $this->session->userdata('username') ?> !</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="<?= site_url('settings') ?>">
								<i class="icon-user"></i> Setting </a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="<?= site_url('auth/logout'); ?>">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
	</div>
	<!-- END HEADER TOP -->
	<!-- BEGIN HEADER MENU -->
	<div class="page-header-menu">
		<div class="container">
			<!-- BEGIN MEGA MENU -->
			<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
			<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
			<div class="hor-menu ">
				<ul class="nav navbar-nav">
					<li <?php if($c == 'dashboard'){echo 'class="active"';} ?>>
						<a href="<?= site_url('dashboard') ?>">Dashboard</a>
					</li>
					<li class="<?php if($c == 'sales'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Sales <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('sales') ?>" class="iconify">
								<i class="icon-plus"></i>
								Add </a>
							</li>
						</ul>
					</li>

					<li class="<?php if($c == 'items'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Items <i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('items') ?>" class="iconify">
								<i class="icon-list"></i>
								List </a>
							</li>
							<li>
								<a href="<?= site_url('items/add') ?>" class="iconify">
								<i class="icon-plus"></i>
								Add </a>
							</li>
						</ul>
					</li>

					<li class="<?php if($c == 'receivings'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Receivings <i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('receivings') ?>" class="iconify">
								<i class="icon-plus"></i>
								Add </a>
							</li>
						</ul>
					</li>

					<li class="<?php if($c == 'stocks'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Stocks <i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('stocks') ?>" class="iconify">
								<i class="icon-list"></i>
								List </a>
							</li>
						</ul>
					</li>

					<li class="<?php if($c == 'transactions'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Transactions <i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('transactions') ?>" class="iconify">
								<i class="icon-list"></i>
								List </a>
							</li>
						</ul>
					</li>

					<li class="<?php if($c == 'customers'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Customer <i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('customers') ?>" class="iconify">
								<i class="icon-list"></i>
								List </a>
							</li>
							<li>
								<a href="<?= site_url('customers/add') ?>" class="iconify">
								<i class="icon-plus"></i>
								Add </a>
							</li>
						</ul>
					</li>

					<li class="<?php if($c == 'units'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Units <i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('units') ?>" class="iconify">
								<i class="icon-list"></i>
								List </a>
							</li>
							<li>
								<a href="<?= site_url('units/add') ?>" class="iconify">
								<i class="icon-plus"></i>
								Add </a>
							</li>
						</ul>
					</li>

					<li class="<?php if($c == 'suppliers'){echo 'active';} ?> menu-dropdown mega-menu-dropdown ">
						<a data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Suppliers <i class="fa fa-angle-down"></i>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= site_url('suppliers') ?>" class="iconify">
								<i class="icon-list"></i>
								List </a>
							</li>
							<li>
								<a href="<?= site_url('suppliers/add') ?>" class="iconify">
								<i class="icon-plus"></i>
								Add </a>
							</li>
						</ul>
					</li>

					<!-- begin: mega menu with custom content -->
					<li class="menu-dropdown mega-menu-dropdown mega-menu-full hide">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Mega Menu <i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="mega-menu-content">
									<div class="row">
										<div class="col-md-6">
											<div id="accordion" class="panel-group">
												<div class="panel panel-success">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
														Mega Menu Info #1 </a>
														</h4>
													</div>
													<div id="collapseOne" class="panel-collapse in">
														<div class="panel-body">
															<p>
																 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements and jquery plugins.
															</p>
															<p>
																 Duis mollis, est non commodo luctus, nisi erat mattis consectetur purus sit amet porttitor ligula. nisi erat mattis consectetur purus
															</p>
														</div>
													</div>
												</div>
												<div class="panel panel-danger">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
														Mega Menu Info #2 </a>
														</h4>
													</div>
													<div id="collapseTwo" class="panel-collapse collapse">
														<div class="panel-body">
															<p>
																 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements and jquery plugins.
															</p>
															<p>
																 Duis mollis, est non commodo luctus, nisi erat mattis consectetur purus sit amet porttitor ligula. nisi erat mattis consectetur purus
															</p>
														</div>
													</div>
												</div>
												<div class="panel panel-info">
													<div class="panel-heading">
														<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
														Mega Menu Info #3 </a>
														</h4>
													</div>
													<div id="collapseThree" class="panel-collapse collapse">
														<div class="panel-body">
															<p>
																 Metronic Mega Menu Works for fixed and responsive layout and has the facility to include (almost) any Bootstrap elements and jquery plugins.
															</p>
															<p>
																 Duis mollis, est non commodo luctus, nisi erat mattis consectetur purus sit amet porttitor ligula. nisi erat mattis consectetur purus
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="portlet light">
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-cogs font-red-sunglo"></i>
														<span class="caption-subject font-red-sunglo bold uppercase">Notes</span>
														<span class="caption-helper">notes samples...</span>
													</div>
													<div class="tools">
														<a href="javascript:;" class="collapse">
														</a>
														<a href="#portlet-config" data-toggle="modal" class="config">
														</a>
														<a href="javascript:;" class="reload">
														</a>
														<a href="javascript:;" class="remove">
														</a>
													</div>
												</div>
												<div class="portlet-body">
													<div class="note note-success">
														<h4 class="block">Success! Some Header Goes Here</h4>
														<p>
															 Duis mollis, est non commodo luctus, nisi erat mattis consectetur purus sit amet porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<!-- end: mega menu with custom content -->
				</ul>
			</div>
			<!-- END MEGA MENU -->
		</div>
	</div>
	<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->