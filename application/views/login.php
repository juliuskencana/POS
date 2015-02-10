<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.2.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>POS Application | Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?= site_url() ?>assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="<?= site_url() ?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?= site_url() ?>assets/global/css/components.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?= site_url() ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?= site_url() ?>">
	<img src="<?= site_url() ?>assets/admin/layout3/img/wamp-pos-white.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?= site_url('auth/login') ?>" method="post">
		<?php if(validation_errors()) : ?>
			<div class="alert alert-danger">
				<button class="close" data-close="alert"></button>
				<span>
				Please check your input. </span>
			</div>
		<?php endif; ?>
		<?php
		switch($this->session->flashdata('login_error')) {
			case 'query_error':
				$msg = 'Server is busy. please try again later.';
				break;

			case 'not_found':
				$msg = 'Username and password wrong.';
				break;

			case 'password_mismatch':
				$msg = 'Username and password wrong.';
				break;

			case 'not_active':
				$msg = 'user is inactive.';
				break;
		}
		?>
		<?php if($this->session->flashdata('login_error')) : ?>
		<div class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span><?php echo $msg; ?></span>
		</div>
		<?php endif; ?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>"/>
			</div>
			<?php echo (form_error('username') != '') ? form_error('username', '<span class="help-block">', '</span>') : ''; ?>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
			<?php echo (form_error('password') != '') ? form_error('password', '<span class="help-block">', '</span>') : ''; ?>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<button type="submit" class="btn green pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END LOGIN FORM -->

<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2014 &copy; wamplo.com. POS Application.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?= site_url() ?>assets/global/plugins/respond.min.js"></script>
<script src="<?= site_url() ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?= site_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?= site_url() ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= site_url() ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= site_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>