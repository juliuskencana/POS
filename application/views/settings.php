
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Setting profile</h1>
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
				<i class="fa fa-circle"></i>
				<li class="active">
					Setting profile
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row profile">
				<div class="col-md-12">
						<div class="row profile-account">
							<div class="col-md-3">
								<ul class="ver-inline-menu tabbable margin-bottom-10">
									<li class="active">
										<a data-toggle="tab" href="#tab_3-3">
										<i class="fa fa-lock"></i> Change Password </a>
									</li>
								</ul>
							</div>
							<div class="col-md-9">
								<div class="tab-content">
									<div id="tab_3-3" class="tab-pane active">
										<form action="<?= site_url('settings/change_password') ?>" method="post">
											
											<?php if(validation_errors()) : ?>
												<div class="alert alert-danger">
													<button class="close" data-close="alert"></button>
													<span>
													<b>Error!</b> Please check your input. </span>
												</div>
											<?php endif; ?>

											<?php
											switch($this->session->flashdata('change_password_error')) {
												case 'password_mismatch':
													$msg = 'Current password wrong.';
													break;
											}
											?>

											<?php if($this->session->flashdata('change_password_error')) : ?>
											<div class="alert alert-danger">
												<button class="close" data-close="alert"></button>
												<span><b>Error!</b> <?php echo $msg; ?></span>
											</div>
											<?php endif; ?>

											<?php if($this->session->flashdata('change_password_success')) : ?>
											<div class="alert alert-success">
												<button class="close" data-close="alert"></button>
												<span>Success change password</span>
											</div>
											<?php endif; ?>


											<div class="form-group">
												<label class="control-label">Current Password</label>
												<input type="password" class="form-control" name="c_pass"/>
												<?php echo (form_error('c_pass') != '') ? form_error('c_pass', '<span class="help-block">', '</span>') : ''; ?>
											</div>
											<div class="form-group">
												<label class="control-label">New Password</label>
												<input type="password" class="form-control" name="n_pass"/>
												<?php echo (form_error('n_pass') != '') ? form_error('n_pass', '<span class="help-block">', '</span>') : ''; ?>
											</div>
											<div class="form-group">
												<label class="control-label">Re-type New Password</label>
												<input type="password" class="form-control" name="r_pass"/>
												<?php echo (form_error('r_pass') != '') ? form_error('r_pass', '<span class="help-block">', '</span>') : ''; ?>
											</div>
											<div class="margin-top-10">
												<button type="button" class="btn default"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
												<button type="submit" class="btn green"><i class="glyphicon glyphicon-ok"></i> Change Password</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!--end col-md-9-->
						</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->