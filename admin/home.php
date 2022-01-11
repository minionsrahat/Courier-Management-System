<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
             <a href="parcel_requests.php">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcel_requests")->num_rows; ?></h3>
                <p>Parcels Request</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
            </a>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
             <a href="parcel_list.php">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?></h3>
                <p>Total Parcels</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
            </a>
          </div>
          <hr>
          <?php 
              $status_arr = array("Item Accepted by Courier","Shipped","In-Transit","Arrived At Destination","Delivered","Picked-up","Unsuccessfull Delivery Attempt");
               foreach($status_arr as $k =>$v):
           ?>
          <div class="col-12 col-sm-6 col-md-4">
            <a href="parcel_list.php?s=<?php echo $k ?>">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels where status = {$k} ")->num_rows; ?></h3>

                <p><?php echo $v ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
            </a>
          </div>
         
            <?php endforeach; ?>
      </div>

<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
          
<?php endif; ?>
