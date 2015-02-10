
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Add Sales</h1>
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
				<li class="active">
					 Add Sales
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<form class="form-horizontal" role="form">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-2 control-label">Search</label>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Nama barang">
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="Satuan">
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
										 First Name
									</th>
									<th>
										 Last Name
									</th>
									<th>
										 Username
									</th>
									<th>
										 Status
									</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										 1
									</td>
									<td>
										 Mark
									</td>
									<td>
										 Otto
									</td>
									<td>
										 makr124
									</td>
									<td>
										<span class="label label-sm label-success">
										Approved </span>
									</td>
								</tr>
								<tr>
									<td>
										 2
									</td>
									<td>
										 Jacob
									</td>
									<td>
										 Nilson
									</td>
									<td>
										 jac123
									</td>
									<td>
										<span class="label label-sm label-info">
										Pending </span>
									</td>
								</tr>
								<tr>
									<td>
										 3
									</td>
									<td>
										 Larry
									</td>
									<td>
										 Cooper
									</td>
									<td>
										 lar
									</td>
									<td>
										<span class="label label-sm label-warning">
										Suspended </span>
									</td>
								</tr>
								<tr>
									<td>
										 4
									</td>
									<td>
										 Sandy
									</td>
									<td>
										 Lim
									</td>
									<td>
										 sanlim
									</td>
									<td>
										<span class="label label-sm label-danger">
										Blocked </span>
									</td>
								</tr>
								</tbody>
								</table>
							</div>
						</div>

						<a href="<?= site_url('sales/invoice') ?>" type="submit" class="btn green"><i class="glyphicon glyphicon-ok"></i> Submit</a>
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