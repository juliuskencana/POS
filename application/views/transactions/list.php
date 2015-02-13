
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Transactions</h1>
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
					 Transactions
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<form class="form-horizontal" role="form" action="" method="get">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Search</label>
										<div class="col-md-2">
											<select class="form-control" name="type">
												<option value="1">Sales</option>
												<option value="2">Receivings</option>
												<option  value="3">Cancel</option>
											</select>
										</div>
										<div class="col-md-4">
											<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
												<input type="text" class="form-control" name="from">
												<span class="input-group-addon"> to </span>
												<input type="text" class="form-control" name="to">
											</div>
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
									<th>Supplier/Customer name</th>
									<th>Transaction Type</th>
									<th>Transaction Date</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php $i = ($this->uri->segment(3)) ? $this->uri->segment(3)+1 : 1; ?>
									<?php foreach ($records as $row): ?>
										<?php
											if ($row->supplier_id != NULL) {
												$name = $this->m_people->get_by('suppliers', 'supplier_id', $row->supplier_id);
											}else{
												$name = $this->m_people->get_by('customers', 'customer_id', $row->customer_id);
											}
										?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $name->name ?></td>
											<td>
												<?php if ($row->is_cancel == 1){ ?>
												<span class="label label-sm label-danger">Cancel</span>
												<?php }elseif ($row->transaction_type == 2) { ?>
												<span class="label label-sm label-info">Receivings</span>
												<?php }elseif ($row->transaction_type == 1) { ?>
												<span class="label label-sm label-success">Sales</span>
												<?php } ?>
											</td>
											<td><?= date('j F Y', strtotime($row->timestamp)); ?></td>
											<td>
												<a data-toggle="modal" href="<?= site_url('transactions/details/' . $row->transaction_id) ?>">Details</a>
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