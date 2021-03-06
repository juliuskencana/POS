
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add Items</h1>
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
					<a href="<?= site_url('items') ?>">Items</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Add Items
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

								<?php if($this->session->flashdata('success_insert')) : ?>
								<div class="alert alert-success">
									<button class="close" data-close="alert"></button>
									<span><b>Success!</b> New Item</span>
								</div>
								<?php endif; ?>
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-3 control-label">Item Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control" placeholder="Item Name" name="name">
											<?php echo (form_error('name') != '') ? form_error('name', '<span class="help-block">', '</span>') : ''; ?>
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