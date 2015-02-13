
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add Receivings</h1>
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
					<a href="<?= site_url('receivings') ?>">Receivings</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Add Receivings
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<?php if(validation_errors()) : ?>
						<div class="alert alert-danger">
							<button class="close" data-close="alert"></button>
							<span><b>Error!</b> Please check your input. </span>
						</div>
					<?php endif; ?>
					<?php if($this->session->flashdata('error_add')) : ?>
						<div class="alert alert-danger">
							<button class="close" data-close="alert"></button>
							<span><b>Error!</b> Please check your input. </span>
						</div>
					<?php endif; ?>
					<?php if($this->session->flashdata('error_empty_cart')) : ?>
						<div class="alert alert-danger">
							<button class="close" data-close="alert"></button>
							<span><b>Error!</b> Please insert your items first. </span>
						</div>
					<?php endif; ?>
					<?php if($this->session->flashdata('success_receivings')) : ?>
					<div class="alert alert-success">
						<button class="close" data-close="alert"></button>
						<span><b>Success!</b> Add receiving</span>
					</div>
					<?php endif; ?>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<form class="form-horizontal" role="form" action="" method="post">
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-2">
											<select class="form-control select2me" data-placeholder="Item name" name="item_name">
												<option value=""></option>
												<?php foreach ($items as $row): ?>
													<option value="<?= $row->item_id ?>"><?= $row->name ?></option>
												<?php endforeach ?>
											</select>
											<?php echo (form_error('item_name') != '') ? form_error('item_name', '<span class="help-block">', '</span>') : ''; ?>
										</div>
										<div class="col-md-2">
											<select class="form-control select2me" data-placeholder="Unit" name="unit_name">
												<option value=""></option>
												<?php foreach ($units as $row): ?>
													<option value="<?= $row->unit_id ?>"><?= $row->name ?></option>
												<?php endforeach ?>
											</select>
											<?php echo (form_error('unit_name') != '') ? form_error('unit_name', '<span class="help-block">', '</span>') : ''; ?>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<span class="input-group-addon">
													IDR
												</span>
												<input type="text" class="form-control" name="cost" placeholder="Cost">
											</div>
											<?php echo (form_error('cost') != '') ? form_error('cost', '<span class="help-block">', '</span>') : ''; ?>
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" name="qty" placeholder="Quantity">
											<?php echo (form_error('qty') != '') ? form_error('qty', '<span class="help-block">', '</span>') : ''; ?>
										</div>
										<button type="submit" class="btn green"><i class="glyphicon glyphicon-ok"></i> Add</button>
									</div>
								</div>
							</form>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-hover">
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										Item Name
									</th>
									<th>
										Unit
									</th>
									<th>
										Cost
									</th>
									<th>
										Quantity
									</th>
									<th>
										Total
									</th>
								</tr>
								</thead>
								<tbody>
									<?php if (!empty($this->cart->contents())): ?>
										<?php $i = 1; ?>
										<?php foreach ($this->cart->contents() as $items): ?>
										<?php
											$item_cart = $this->m_item->get_by('item_id', $items['name']);
											$unit_cart = $this->m_unit->get_by('unit_id', $items['options']['unit_name']);
										?>
											<tr>
												<td>
													<?= $i; ?>
												</td>
												<td>
													<?= $item_cart->name ?>
												</td>
												<td>
													<?= $unit_cart->name ?>
												</td>
												<td>
													IDR <?= $this->cart->format_number($items['price']) ?>
												</td>
												<td>
													<?= $items['qty'] ?>
												</td>
												<td>
													IDR <?php echo $this->cart->format_number($items['subtotal']); ?>
												</td>
											</tr>
											<?php $i++; ?>
										<?php endforeach; ?>
											<tr>
												<td>
												</td>
												<td>
												</td>
												<td>
												</td>
												<td>
												</td>
												<th>
													TOTAL
												</th>
												<td>
													IDR <?php echo $this->cart->format_number($this->cart->total()); ?>
												</td>
											</tr>
									<?php endif ?>
								</tbody>
								</table>
							</div>
						</div>
						
							<form class="form-horizontal" role="form" method="post" action="<?= site_url('receivings/add_cart') ?>">
								<div class="form-body">
									<div class="form-group">
										<div class="col-md-3">
											<select class="form-control select2me" data-placeholder="Supplier name" name="supplier_id">
												<option value=""></option>
												<?php foreach ($suppliers as $row): ?>
													<option value="<?= $row->supplier_id ?>"><?= $row->name ?></option>
												<?php endforeach ?>
											</select>
											<?php if ($this->session->flashdata('error_add')){ ?>
												<span class="help-block">Supplier name is required.</span>
											<?php } ?>
										</div>
									</div>
								</div>
								<input type="submit" class="btn green"></input>
								<a href="<?= site_url('receivings/clear_cart'); ?>" type="submit" class="btn red-sunglo"><i class="glyphicon glyphicon-remove"></i> Clear items</a>
							</form>
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

<script>

</script>