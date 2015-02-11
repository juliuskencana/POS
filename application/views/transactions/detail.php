
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Transaction Details</h1>
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
					<a href="<?= site_url('transactions') ?>">Transactions</a>
					<i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Details
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->

			<!-- INFORMATION START -->
			<?php if($this->session->flashdata('success_cancel')) : ?>
			<div class="alert alert-success">
				<button class="close" data-close="alert"></button>
				<span><b>Success!</b> Cancel Transaction</span>
			</div>
			<?php endif; ?>
			<!-- INFORMATION END -->

			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="col-md-6">
							<table class="table table-bordered table-hover">
								<?php 
								if ($transaction->customer_id != NULL) { ?>
									<tr>
										<th>Customer Name</th>
										<td><?= $people->name; ?></td>
									</tr>
								<?php }elseif ($transaction->supplier_id != NULL) { ?>
									<tr>
										<th>Supplier Name</th>
										<td><?= $people->name; ?></td>
									</tr>
								<?php } ?>
									<tr>
										<th>Address</th>
										<td><?= $people->address; ?></td>
									</tr>
									<tr>
										<th>Phone Number</th>
										<td><?= $people->phone; ?></td>
									</tr>
									<tr>
										<th>Handphone</th>
										<td><?= $people->hp; ?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td>
											<?php if ($people->email == ""){ ?>
												-
											<?php }else{ ?>
												<?= $people->email ?>
											<?php } ?>
										</td>
									</tr>
									<tr>
										<th>Transaction Type</th>
										<td>
											<?php
												switch ($transaction->transaction_type) {
													case '1':
														$type = 'Sales';
														break;
													
													case '2':
														$type = 'Receivings';
														break;
													
													case '3':
														$type = 'Cancel';
														break;
												}
											?>
											<?= $type; ?>
										</td>
									</tr>
									<tr>
										<th>Transaction Date</th>
										<td><?= date('j F Y', strtotime($transaction->timestamp)); ?></td>
									</tr>
							</table>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Item Name</th>
											<th>Unit</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Total</th>
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
												<td><?= $row->unit_name ?></td>
												<td><?= $row->quantity ?></td>
												<td>IDR <?= $this->cart->format_number($row->capital_price) ?></td>
												<td>IDR <?= $this->cart->format_number($row->capital_price * $row->quantity) ?></td>
											</tr>
											<?php $i++; ?>
											<?php $total_price = $total_price + ($row->capital_price * $row->quantity); ?>
										<?php endforeach ?>
										<?php
										?>
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
												GRAND TOTAL
											</th>
											<td>
												IDR <?php echo $this->cart->format_number($total_price); ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<?php if ($transaction->transaction_type == 1): ?>
								<a href="<?= site_url('transactions/invoice/' . $transaction->transaction_id) ?>" class="btn btn-lg green margin-bottom-5">See Invoice</a>
							<?php endif ?>
							<?php if ($transaction->transaction_type == 1 || $transaction->transaction_type == 2): ?>
								<a href="<?= site_url('transactions/cancel/' . $transaction->transaction_id) ?>" class="btn btn-lg red margin-bottom-5">Cancel Transaction</a>
							<?php endif ?>
						</div>
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