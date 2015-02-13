
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
					<a href="#">Sales</a>
					<i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?= site_url('sales/add') ?>">Add Sales</a>
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
										<strong>Grand Total:</strong> IDR <?= $this->cart->format_number($this->cart->total()) ?>
									</li>
								</ul>
								<br/>
								<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
								Print <i class="fa fa-print"></i>
								</a>
								<a href="<?= site_url('sales/submit_invoice') ?>" class="btn btn-lg green hidden-print margin-bottom-5">
								Submit Your Invoice <i class="fa fa-check"></i>
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