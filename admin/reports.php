<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php

include('db_connect.php');


if (!isset($_SESSION['login_id'])) {
	header('location:login.php');
}
include('header.php');
?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<?php include('topbar.php') ?>
		<?php include('sidebar.php') ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-body text-white">
				</div>
			</div>
			<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0"><?php echo "HOME/REPORTS" ?></h1>
						</div><!-- /.col -->

					</div><!-- /.row -->
					<hr class="border-primary">
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

					<?php $status = isset($_GET['status']) ? $_GET['status'] : 'all' ?>
					<div class="col-lg-12">
						<div class="card card-outline card-primary">
							<div class="card-body">
								<div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
									<?php
									$status_arr = array("Item Accepted by Courier","Shipped", "In-Transit", "Arrived At Destination", "Delivered", "Picked-up", "Unsuccessfull Delivery Attempt"); ?>
									<label for="date_from" class="mx-1">Status</label>
									<select name="" id="status" class="custom-select custom-select-sm col-sm-3">
										<option value="all" <?php echo $status == 'all' ? "selected" : '' ?>>All</option>
										<?php foreach ($status_arr as $k => $v) : ?>
											<option value="<?php echo $k ?>" <?php echo $status != 'all' && $status == $k ? "selected" : '' ?>><?php echo $v; ?></option>
										<?php endforeach; ?>
									</select>
									<label for="date_from" class="mx-1">From</label>
									<input type="date" id="date_from" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_from']) ? date("Y-m-d", strtotime($_GET['date_from'])) : '' ?>">
									<label for="date_to" class="mx-1">To</label>
									<input type="date" id="date_to" class="form-control form-control-sm col-sm-3" value="<?php echo isset($_GET['date_to']) ? date("Y-m-d", strtotime($_GET['date_to'])) : '' ?>">
									<button class="btn btn-sm btn-primary mx-1 bg-gradient-primary" type="button" id='view_report'>View Report</button>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 ">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<button type="button" class="btn btn-success float-right" style="display: none" id="print"><i class="fa fa-print"></i> Print</button>
											</div>
										</div>

										<table class="table table-bordered" id="report-list">
											<thead>
												<tr>
													<th>#</th>
													<th>Date</th>
													<th>Sender</th>
													<th>Recepient</th>
													<th>Amount</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>
					</div>
					<noscript>
						<style>
							table.table {
								width: 100%;
								border-collapse: collapse;
							}

							table.table tr,
							table.table th,
							table.table td {
								border: 1px solid;
							}

							.text-cnter {
								text-align: center;
							}
						</style>
						<h3 class="text-center"><b>Report</b></h3>
					</noscript>
					<div class="details d-none">
						<p><b>Date Range:</b> <span class="drange"></span></p>
						<p><b>Status:</b> <span class="status-field">All</span></p>
					</div>
					
				</div>
				<!--/. container-fluid -->
			</section>
			<!-- /.content -->
			<div class="modal fade" id="confirm_modal" role='dialog'>
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Confirmation</h5>
						</div>
						<div class="modal-body">
							<div id="delete_content"></div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="uni_modal" role='dialog'>
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"></h5>
						</div>
						<div class="modal-body">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="uni_modal_right" role='dialog'>
				<div class="modal-dialog modal-full-height  modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span class="fa fa-arrow-right"></span>
							</button>
						</div>
						<div class="modal-body">
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="viewer_modal" role='dialog'>
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
						<img src="" alt="">
					</div>
				</div>
			</div>
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
	
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<!-- Bootstrap -->
	<?php include 'footer.php' ?>

	<script>
						function load_report() {
							start_load()
							var date_from = $('#date_from').val()
							var date_to = $('#date_to').val()
							var status = $('#status').val()
							$.ajax({
								url: 'ajax.php?action=get_report',
								method: 'POST',
								data: {
									status: status,
									date_from: date_from,
									date_to: date_to
								},
								error: err => {
									console.log(err)
									alert_toast("An error occured", 'error')
									end_load()
								},
								success: function(resp) {
									if (typeof resp === 'object' || Array.isArray(resp) || typeof JSON.parse(resp) === 'object') {
										resp = JSON.parse(resp)
										if (Object.keys(resp).length > 0) {
											$('#report-list tbody').html('')
											var i = 1;
											Object.keys(resp).map(function(k) {
												var tr = $('<tr></tr>')
												tr.append('<td>' + (i++) + '</td>')
												tr.append('<td>' + (resp[k].date_created) + '</td>')
												tr.append('<td>' + (resp[k].sfname) + '</td>')
												tr.append('<td>' + (resp[k].rfname) + '</td>')
												tr.append('<td>' + (resp[k].price) + '</td>')
												tr.append('<td>' + (resp[k].status) + '</td>')
												$('#report-list tbody').append(tr)
											})
											$('#print').show()
										} else {
											$('#report-list tbody').html('')
											var tr = $('<tr></tr>')
											tr.append('<th class="text-center" colspan="6">No result.</th>')
											$('#report-list tbody').append(tr)
											$('#print').hide()
										}
									}
								},
								complete: function() {
									end_load()
								}
							})
						}
						$('#view_report').click(function() {
							if ($('#date_from').val() == '' || $('#date_to').val() == '') {
								alert_toast("Please select dates first.", "error")
								return false;
							}
							load_report()
							var date_from = $('#date_from').val()
							var date_to = $('#date_to').val()
							var status = $('#status').val()
							var target = './index.php?page=reports&filtered&date_from=' + date_from + '&date_to=' + date_to + '&status=' + status
							window.history.pushState({}, null, target);
						})

						$(document).ready(function() {
							if ('<?php echo isset($_GET['filtered']) ?>' == 1)
								load_report()
						})
						$('#print').click(function() {
							start_load()
							var ns = $('noscript').clone()
							var details = $('.details').clone()
							var content = $('#report-list').clone()
							var date_from = $('#date_from').val()
							var date_to = $('#date_to').val()
							var status = $('#status').val()
							var stat_arr = '<?php echo json_encode($status_arr) ?>';
							stat_arr = JSON.parse(stat_arr);
							details.find('.drange').text(date_from + " to " + date_to)
							if (status > -1)
								details.find('.status-field').text(stat_arr[status])
							ns.append(details)

							ns.append(content)
							var nw = window.open('', '', 'height=700,width=900')
							nw.document.write(ns.html())
							nw.document.close()
							nw.print()
							setTimeout(function() {
								nw.close()
								end_load()
							}, 750)

						})
					</script>
</body>

</html>