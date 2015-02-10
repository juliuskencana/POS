
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>List Sales</h1>
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
					 List Sales
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
											<select class="form-control">
												<option>Customer Name</option>
												<option>Items</option>
											</select>
										</div>
										<div class="col-md-2">
											<input type="text" class="form-control" placeholder="">
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
								<a href="javascript:;" class="btn btn-default btn-circle">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Add Sales </span>
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
						<ul class="pagination">
									<li>
										<a href="#"><i class="fa fa-angle-left"></i></a>
									</li>
									<li>
										<a href="#">1 </a>
									</li>
									<li>
										<a href="#">2 </a>
									</li>
									<li>
										<a href="#">3 </a>
									</li>
									<li>
										<a href="#">4 </a>
									</li>
									<li>
										<a href="#">5 </a>
									</li>
									<li>
										<a href="#">6 </a>
									</li>
									<li>
										<a href="#"><i class="fa fa-angle-right"></i></a>
									</li>
								</ul>
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