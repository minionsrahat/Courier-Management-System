  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
      <a href="./" class="brand-link">

        <h3 class="text-center p-0 m-0"><b>ADMIN</b></h3>

      </a>

    </div>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_staff">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Customer List
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user_lists.php" class="nav-link nav-staff_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>User Lists</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="parcel_requests.php" class="nav-link nav-reports">
              <i class="nav-icon fas fa-plus"></i>
              <p>
               Parcel Requests
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_parcel">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Parcels
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new_parcel.php" class="nav-link nav-new_parcel tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="parcel_list.php" class="nav-link nav-parcel_list nav-sall tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List All</p>
                </a>
              </li>
              <?php
              $status_arr = array("Item Accepted<br/>by Courier", "Shipped", "In-Transit", "Arrived At<br/>Destination", "Delivered", "Picked-up", "Unsuccessfull<br/>Delivery Attempt");
              foreach ($status_arr as $k => $v) :
              ?>
                <li class="nav-item">
                  <a href="parcel_list.php?s=<?php echo $k ?>" class="nav-link nav-parcel_list_<?php echo $k ?> tree-item">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p><?php echo $v ?></p>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="track.php" class="nav-link nav-track">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Track Parcel
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="reports.php" class="nav-link nav-reports">
              <i class="nav-icon fas fa-file"></i>
              <p>
               Datewise Reports
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="feedback.php" class="nav-link nav-reports">
              <i class="nav-icon fas fa-user"></i>
              <p>
               User Feedbacks
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <script>
    $(document).ready(function() {
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if (s != '')
        page = page + '_' + s;
      if ($('.nav-link.nav-' + page).length > 0) {
        $('.nav-link.nav-' + page).addClass('active')
        if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
          $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
          $('.nav-link.nav-' + page).parent().addClass('menu-open')
        }

      }

    })
  </script>