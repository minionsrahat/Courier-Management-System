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
<style>
	table td {
		vertical-align: middle !important;
	}
</style>

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
							<h1 class="m-0">HOME/PARCEL REQUESTS</h1>
						</div><!-- /.col -->

					</div><!-- /.row -->
					<hr class="border-primary">
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<?php include 'db_connect.php' ?>
					<div class="col-lg-12">
						<div class="card card-outline card-primary">
							<div class="card-header">
								<div class="card-tools">
									<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="new_parcel.php"><i class="fa fa-plus"></i> Add New</a>
								</div>
							</div>
							<div class="card-body">
								<table class="table tabe-hover table-bordered" id="list">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Reference Number</th>
											<th>Sender Name</th>
											<th>Recipient Name</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										
										$qry = $conn->query("SELECT * from parcel_requests where parcel_requests.status<10  order by  unix_timestamp(date_created) desc ");
										while ($row = $qry->fetch_assoc()) :
										?>
											<tr>
												<td class="text-center"><?php echo $i++ ?></td>
												<td><b><?php echo ($row['reference_number']) ?></b></td>
												<td><b><?php echo ucwords($row['sfname']) ?></b></td>
												<td><b><?php echo ucwords($row['rfname']) ?></b></td>
												<td><b><?php echo ucwords($row['date_created']) ?></b></td>
												<td class="text-center">
													<div class="btn-group">
														<a href="edit_parcel_request.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
															<i class="fas fa-edit"></i>
														</a>
														<button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['id'] ?>">
															<i class="fas fa-trash"></i>
														</button>
													</div>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</div>
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

		
	
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<!-- Bootstrap -->
	<?php include 'footer.php' ?>

	<script>
		$(document).ready(function() {
			$('#list').dataTable()
			$('.view_parcel').click(function() {
				uni_modal("Parcel's Details", "view_parcel.php?id=" + $(this).attr('data-id'), "large")
			})
			$('.delete_parcel').click(function() {
				_conf("Are you sure to delete this parcel Requests?", "delete_parcel", [$(this).attr('data-id')])
			})
		})

		function delete_parcel($id) {
			start_load()
			$.ajax({
				url: 'ajax.php?action=delete_parcel_request',
				method: 'POST',
				data: {
					id: $id
				},
				success: function(resp) {
					if (resp == 1) {
						alert_toast("Data successfully deleted", 'success')
						setTimeout(function() {
							location.reload()
						}, 1500)

					}
				}
			})
		}
	</script>
</body>

</html>