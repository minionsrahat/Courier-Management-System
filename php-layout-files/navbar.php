<nav class="navbar navbar-light upper-navbar">
    <h3 class='text-center'>NEAA Courier Management System</h3>
    <?php if (isset($_SESSION['user_id'])) {
    ?>

        <div class="nav-item dropdown mr-5">

            <a class="nav-link dropdown-toggle profile-icon text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="
            <?php if ($_SESSION['gender'] == 1 || $_SESSION['gender'] == 3) {
                echo 'images/male-profile-pic.jpg';
            } else {
                echo 'images/female-profile-icon.png';
            }
            ?>" alt="" srcset=""><?php echo $_SESSION['name'] ?>


            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">


                <a class="dropdown-item" href="php-functions/logout.php">Log Out</a>

            </div>
        </div>

        <?php if (!empty($_SESSION['cart'])) {
        ?>
            <span class="cart badge badge-danger mb-3"><?php echo count($_SESSION['cart']) ?></span>
        <?php
        } ?>

    <?php
    } else { ?>

        <a name="" id="" class="btn btn-primary log-in-btn mr-2 curve-btn" href="login.php" role="button">Log In</a>
        <a name="" id="" class="btn btn-primary reg-btn curve-btn" href="Registration.php" role="button">Sign Up</a>
    <?php
    } ?>


</nav>
<nav class="navbar navbar-expand-md lower-navbar">
    <a class="navbar-brand text-center" href="index.php">
        <div>
            <div class="text-center  title"><i class="fa fa-truck" aria-hidden="true"></i> CMS</div>
        </div>
    </a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-navicon" style="color:black; font-size:28px;"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto py-2">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sendparcel_request.php">Send Parcel</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
            </li>
            <?php if (isset($_SESSION['user_id'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="request_history.php">Parcel Request History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Contact Us</a>
                </li>
            <?php
            } ?>

        </ul>

    </div>
</nav>