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
							<h1 class="m-0"><?php echo "HOME/CUSTOMER LISTS" ?></h1>
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
							<div class="card-body">
								<table class="table tabe-hover table-bordered" id="list">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>User Name</th>
											<th>User Email</th>
											<th>Date Of Birth</th>
											<th>Address</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										$qry = $conn->query("SELECT * from users");
										while ($row = $qry->fetch_assoc()) :
										?>
											<tr>
												<td class="text-center"><?php echo $i++ ?></td>
												<td><b><?php echo ($row['fname'])." ".($row['lame']) ?></b></td>
												<td><b><?php echo ucwords($row['username']) ?></b></td>
												<td><b><?php echo ucwords($row['birth_date']) ?></b></td>
												<td><b><?php echo ucwords($row['address']) ?></b></td>
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
		$(document).ready(function() {
			$('#list').dataTable()
		})

	
	</script>
</body>

</html>