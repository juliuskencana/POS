
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Invoice</h1>
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
					<a href="<?= site_url('transactions') ?>">transactions</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Invoice
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->

			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet light">
				<div class="portlet-body">
					<div class="invoice">
						<div class="row invoice-logo">
							<div class="col-xs-6 invoice-logo-space">
								<img src="<?= site_url() ?>assets/admin/pages/media/invoice/walmart.png" class="img-responsive" alt=""/>
							</div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-xs-4 col-xs-offset-8">
								<h3>Client:</h3>
								<ul class="list-unstyled">
									<li>
										<?= $people->name ?>
									</li>
									<li>
										 <?= $people->address ?>
									</li>
									<li>
										<?= $people->phone; ?>
									</li>
									<li>
										<?= $people->hp; ?>
									</li>
									<li>
										<?= $people->email; ?>
									</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<table class="table table-striped table-hover">
								<thead>
								<tr>
									<th>
										 #
									</th>
									<th>
										 Item
									</th>
									<th class="hidden-480">
										 Unit
									</th>
									<th class="hidden-480">
										 Quantity
									</th>
									<th class="hidden-480">
										 Price
									</th>
									<th>
										 Total
									</th>
								</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php 
										$total_price = 0;
									?>
									<?php foreach ($records as $row): ?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $row->item_name ?></td>
											<td class="hidden-480"><?= $row->unit_name ?></td>
											<td class="hidden-480"><?= $row->quantity ?></td>
											<td class="hidden-480">IDR 
												<?php if ($transaction->transaction_type == 1): ?>
													<?= $this->cart->format_number($row->sell_price) ?>
												<?php else: ?>
													<?= $this->cart->format_number($row->capital_price) ?>
												<?php endif ?>
											</td>
											<td class="hidden-480">IDR 
												<?php if ($transaction->transaction_type == 1): ?>
													<?= $this->cart->format_number($row->sell_price * $row->quantity) ?>
												<?php else: ?>
													<?= $this->cart->format_number($row->capital_price * $row->quantity) ?>
												<?php endif ?>
											</td>
										</tr>
										<?php $i++; ?>
										<?php 
											if ($transaction->transaction_type == 1) {
												$total_price = $total_price + ($row->sell_price * $row->quantity);
											}else{
												$total_price = $total_price + ($row->capital_price * $row->quantity);
											}
										?>
									<?php endforeach ?>
								</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="well">
									<address>
									<strong>Loop, Inc.</strong><br/>
									795 Park Ave, Suite 120<br/>
									San Francisco, CA 94107<br/>
									<abbr title="Phone">P:</abbr> (234) 145-1810 </address>
									<address>
									<strong>Full Name</strong><br/>
									<a href="mailto:#">
									first.last@email.com </a>
									</address>
								</div>
							</div>
							<div class="col-xs-8 invoice-block">
								<ul class="list-unstyled amounts">
									<li>
										<strong>Grand Total:</strong> IDR <?= $this->cart->format_number($total_price) ?>
									</li>
								</ul>
								<br/>
								<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
								Print <i class="fa fa-print"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->