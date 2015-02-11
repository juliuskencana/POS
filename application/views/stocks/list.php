
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Stocks</h1>
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
				<li class="active">
					 Stocks
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
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
										<div class="col-md-2">
											<select class="form-control select2me" data-placeholder="Item name" name="item_id">
												<option value=""></option>
												<?php foreach ($items as $row): ?>
													<option value="<?= $row->item_id ?>"><?= $row->name ?></option>
												<?php endforeach ?>
											</select>
											<?php echo (form_error('item_name') != '') ? form_error('item_name', '<span class="help-block">', '</span>') : ''; ?>
										</div>
										<div class="col-md-2">
											<select class="form-control select2me" data-placeholder="Unit" name="unit_id">
												<option value=""></option>
												<?php foreach ($units as $row): ?>
													<option value="<?= $row->unit_id ?>"><?= $row->name ?></option>
												<?php endforeach ?>
											</select>
											<?php echo (form_error('unit_name') != '') ? form_error('unit_name', '<span class="help-block">', '</span>') : ''; ?>
										</div>
										<button type="submit" class="btn green"><i class="glyphicon glyphicon-ok"></i> Submit</button>
									</div>
								</div>
							</form>
						</div>
						<div class="portlet-title">
							<div class="actions">
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
									<th>Item Name</th>
									<th>Unit Name</th>
									<th>Capital Price</th>
									<th>Benefit</th>
									<th>Sell Price</th>
									<th>Stock</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php $i = ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1; ?>
									<?php foreach ($records as $row): ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $row->item_name ?></td>
											<td><?= $row->unit_name ?></td>
											<td>IDR <?= $this->cart->format_number($row->capital_price) ?></td>
											<td>
												<?php if ($row->benefit == NULL || $row->benefit == 0): ?>
													<span class="label label-sm label-danger">Not setting</span>
												<?php else: ?>
													<span class="label label-sm label-success"><?= $row->benefit ?> %</span>
												<?php endif ?>
											</td>
											<td>
												<?php if ($row->benefit == NULL || $row->benefit == 0): ?>
													-
												<?php else: ?>
													IDR <?= $this->cart->format_number(round($row->capital_price * ($row->benefit/100))) ?>
												<?php endif ?>
											</td>
											<td><?= $row->stock ?></td>
											<td>
												<a href="<?= site_url() ?>" class="btn btn-xs red margin-bottom-5"><i class="fa fa-warning"></i> Setting Benefit</a>
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