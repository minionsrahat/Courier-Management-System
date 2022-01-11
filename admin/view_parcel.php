<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM parcels where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Tracking Number:</dt>
						<dd> <h4><b><?php echo $reference_number ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Sender Information</b>
					<dl>
						<dt>First Name:</dt>
						<dd><?php echo ucwords($sfname) ?></dd>
						<dt>Last Name:</dt>
						<dd><?php echo ucwords($slname) ?></dd>
						<dt>Address:</dt>
						<dd><?php echo ucwords($sender_address) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($sender_contact) ?></dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Recipient Information</b>
					<dl>
					    <dt>First Name:</dt>
						<dd><?php echo ucwords($rfname) ?></dd>
						<dt>Last Name:</dt>
						<dd><?php echo ucwords($rlname) ?></dd>
						<dt>Address:</dt>
						<dd><?php echo ucwords($recipient_address) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($recipient_contact) ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Parcel Details</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Wight:</dt>
									<dd><?php echo $weight ?> Kg</dd>
									<dt>Height:</dt>
									<dd><?php echo $height ?> In</dd>
									<dt>Price:</dt>
									<dd><?php echo number_format($price,2) ?> GHC</dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								<dl>
									<dt>Width:</dt>
									<dd><?php echo $width ?> In</dd>
									<dt>length:</dt>
									<dd><?php echo $length ?> In</dd>
									<dt>Type:</dt>
									<dd><?php echo $type == 1 ? "<span class='badge badge-primary'>Deliver to Recipient</span>":"<span class='badge badge-info'>Pickup</span>" ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
						
						<dt>Status:</dt>
						<dd>
							<?php 
							switch ($status) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> Shipped</span>";
									break;
								case '2':
									echo "<span class='badge badge-pill badge-primary'> In-Transit</span>";
									break;
								case '3':
									echo "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
									break;
								case '4':
									echo "<span class='badge badge-pill badge-success'>Delivered</span>";
									break;
								case '5':
									echo "<span class='badge badge-pill badge-success'> Picked-up</span>";
									break;
								case '6':
									echo "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
									break;

								default:
									echo "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";

									break;
							}

							?>
							<span class="btn badge badge-primary bg-gradient-primary" id='update_status'><i class="fa fa-edit"></i> Update Status</span>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
	<h3 class="text-center"><b>Student Result</b></h3>
</noscript>
<script>
	$('#update_status').click(function(){
		uni_modal("Update Status of: <?php echo $reference_number ?>","manage_parcel_status.php?id=<?php echo $id ?>&cs=<?php echo $status ?>","")
	})
</script>