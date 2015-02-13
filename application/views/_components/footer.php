<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="container">
		 2015 &copy; wamplo.com. All Rights Reserved.
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<?php
	$c = $this->uri->segment(1);
	$f = $this->uri->segment(2);
?>
<!-- END FOOTER -->
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
<script src="<?= site_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>


<?php if ($c == 'transactions'): ?>
<!-- BEGIN PAGE list.php -->
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?= site_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?= site_url() ?>assets/admin/pages/scripts/components-pickers.js"></script>
<!-- END PAGE list.php -->
<?php endif ?>

<?php if ($c == 'receivings' || $c == 'stocks'): ?>
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="<?= site_url() ?>assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?= site_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?= site_url() ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
	<script src="<?= site_url() ?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
	<script src="<?= site_url() ?>assets/admin/pages/scripts/components-dropdowns.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
<?php endif ?>
<?php if($c == 'stocks'): ?>    
	<script src="<?= site_url() ?>assets/admin/pages/scripts/components-jqueryui-sliders.js"></script>
	<script src="<?= site_url() ?>assets/admin/pages/scripts/setting-profit.js"></script>
<?php endif ?>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features

	<?php if ($c == 'transactions'): ?>
    ComponentsPickers.init(); // list.php
	<?php endif; ?>
	<?php if($c == 'receivings' || $c == 'stocks'): ?>      
    ComponentsDropdowns.init();
	<?php endif; ?>
	<?php if($c == 'stocks'): ?>    
    ComponentsjQueryUISliders.init();
	<?php endif; ?>
});

</script>
</body>
<!-- END BODY -->
</html>