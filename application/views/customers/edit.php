
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Edit Customers</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?= site_url('dashboard') ?>">Dashboard</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?= site_url('customers') ?>">Customers</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Edit Customers
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" action="" method="post">
								<?php if(validation_errors()) : ?>
									<div class="alert alert-danger">
										<button class="close" data-close="alert"></button>
										<span><b>Error!</b> Please check your input. </span>
									</div>
								<?php endif; ?>
								
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $records->name; ?>">
											<?php echo (form_error('name') != '') ? form_error('name', '<span class="help-block">', '</span>') : ''; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $records->address; ?>">
											<?php echo (form_error('address') != '') ? form_error('address', '<span class="help-block">', '</span>') : ''; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Phone</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $records->phone; ?>">
											<?php echo (form_error('phone') != '') ? form_error('phone', '<span class="help-block">', '</span>') : ''; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Handphone</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Hp" name="hp" value="<?php echo $records->hp; ?>">
											<?php echo (form_error('hp') != '') ? form_error('hp', '<span class="help-block">', '</span>') : ''; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $records->email; ?>">
											<?php echo (form_error('email') != '') ? form_error('email', '<span class="help-block">', '</span>') : ''; ?>
										</div>
									</div>
								</div>
								<div class="form-actions right1">
									<button type="submit" class="btn green"><i class="glyphicon glyphicon-ok"></i> Submit</button>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->