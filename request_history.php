<!doctype html>
<html lang="en">

<head>
    <title>Home-NEAA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


</head>

<body>
    <!-- NAVIGATON BAR START -->
    <?php
    session_start();
    include('php-layout-files/navbar.php');
    ?>
    <!-- NAVIGATON BAR END -->


    <!-- import database file-->
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>

    <!-- Request History SECTION START -->

    <section>
        <div class="container my-5">
            <h2 class="text-center">Parcel Requests History</h2>
            <div class="row mt-5">
                <div class="col-md-10 mx-auto">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `parcel_requests` where user_id=$user_id";
                    $result = $con->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tracking ID</th>
                                    <th>Sender Name</th>
                                    <th>Sender Contact</th>
                                    <th>Reciver Name</th>
                                    <th>Reciver Contact</th>
                                    <th>Status</th>
                                    <th>Payment Mode</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $row['reference_number'] ?></td>
                                        <td><?php echo $row['sfname'] ?></td>
                                        <td><?php echo $row['sender_contact'] ?></td>
                                        <td><?php echo $row['rfname'] ?></td>
                                        <td><?php echo $row['recipient_contact'] ?></td>
                                        <td><?php echo $row['status'] > 7 ? "Accepted" : 'In Processing' ?></td>
                                        <td><?php echo $row['payment_mode'] ==1 ? "Pay on pick up" : 'Via Momo' ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo $row['date_created'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else {
                    ?>
                        <h4 class="text-center">
                            No Available History
                        </h4>

                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>

    </section>



    <!-- Request History SECTION END -->



    <!-- FOOTER SECTION START -->
    <?php include('php-layout-files/footer.php') ?>
    <!-- HOME SECTION END -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
</body>

</html>