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
<title>POS Applications | <?= $title ?></title>
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
<?php
	$c = $this->uri->segment(1);
	$f = $this->uri->segment(2);
?>
<?php if ($c == 'transactions'): ?>
<!-- LIST.php -->
<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END LIST.php -->
<?php endif ?>

<?php if ($f == 'invoice'): ?>
<link href="<?= site_url() ?>assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
<?php endif ?>

<?php if ($c == 'settings'): ?>
<link href="<?= site_url() ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="<?= site_url() ?>assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<?php endif ?>

<?php if ($c == 'receivings' || $c == 'stocks'): ?>

	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/select2/select2.css"/>
	<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
	<!-- BEGIN THEME STYLES -->
<?php endif ?>

<!-- BEGIN THEME STYLES -->
<link href="<?= site_url() ?>assets/global/css/components.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?= site_url() ?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?= site_url() ?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->

<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->