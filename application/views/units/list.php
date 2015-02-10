
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>List Units</h1>
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
					<a href="<?= site_url('units') ?>">Units</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 List Units
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->

			<!-- INFORMATION START -->
			<?php if($this->session->flashdata('success_edit')) : ?>
			<div class="alert alert-success">
				<button class="close" data-close="alert"></button>
				<span><b>Success!</b> Edit Unit</span>
			</div>
			<?php endif; ?>

			<?php if($this->session->flashdata('success_delete')) : ?>
			<div class="alert alert-success">
				<button class="close" data-close="alert"></button>
				<span><b>Success!</b> Delete Unit</span>
			</div>
			<?php endif; ?>
			<!-- INFORMATION END -->

			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<form class="form-horizontal" role="form" method="get">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-4 control-label">Search</label>
										<div class="col-md-3">
											<input type="text" class="form-control" placeholder="Units Name" name="name">
										</div>
										<button type="submit" class="btn green"><i class="glyphicon glyphicon-ok"></i> Submit</button>
									</div>
								</div>
							</form>
						</div>
						<div class="portlet-title">
							<div class="actions">
								<a href="<?= site_url('units/add'); ?>" class="btn btn-default btn-circle">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Add Units </span>
								</a>
								<div class="btn-group">
									<a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
									<i class="fa fa-share"></i>
									<span class="hidden-480">
									Export </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Export to Excel </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-hover">
								<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php $i = ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1; ?>
									<?php foreach ($records as $row): ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $row->name ?></td>
											<td>
												<a href="<?= site_url('units/edit/' . $row->unit_id) ?>">Edit</a> | 
												<a href="<?= site_url('units/delete/' . $row->unit_id) ?>">Delete</a>
											</td>
										</tr>
										<?php $i++; ?>
									<?php endforeach ?>
								</tbody>
								</table>
							</div>
						</div>
						<?php echo $pagination ?>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->