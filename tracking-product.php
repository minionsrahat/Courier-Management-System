<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Home Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {

            font-family: 'Open Sans', serif
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 102px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #FF5722
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }

        .modal-body p {
            color: black !important;
        }
    </style>

</head>

<body>
    <?php

    include('php-layout-files/navbar.php');
    ?>
    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>


    <?php

    $status_arr = array("Item Accepted by Courier", "Shipped", "In-Transit", "Arrived At Destination", "Delivered", "Picked-up", "Unsuccessfull Delivery Attempt");

    if (isset($_POST['tracking-number'])) {
        $tracking_number = $_POST['tracking-number'];
        $sql = "SELECT * FROM `parcels` WHERE parcels.reference_number='$tracking_number'";
        $result = $con->query($sql);
        $found = false;
        if (mysqli_num_rows($result) > 0) {
            $found = true;
            $row = mysqli_fetch_array($result);
            $estimated_del_date = date('Y-m-d', strtotime($row['date_created'] . ' + 5 days'));
            $status = $status_arr[$row['status']];
            $parcel_id = $row['id'];
        }
    }
    ?>

    <section id="track-product">
        <div class="container mt-5">
            <article class="card">
                <header class="card-header"> My Orders / Tracking </header>
                <div class="card-body">
                    <!-- <h6>Order ID: OD45345345435</h6> -->
                    <?php
                    if ($found) {
                    ?>

                        <article class="card">
                            <div class="card-body row">
                                <div class="col"> <strong>Estimated Delivery time:</strong> <br>
                                    <?php
                                    echo  $estimated_del_date;
                                    ?>
                                </div>
                                <div class="col"> <strong>Shipping BY:</strong> <br> <?php echo $row['sfname'] ?>| <i class="fa fa-phone"></i> <?php echo $row['sender_contact'] ?> </div>
                                <div class="col"> <strong>Status:</strong> <br><?php echo $status ?> </div>
                                <div class="col"> <strong>Tracking #:</strong> <br> <?php echo $tracking_number ?> </div>
                            </div>
                        </article>
                        <div class="track">
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text m"><?php echo $status_arr[0] ?> <br><?php echo date('Y:m:d', strtotime($row['date_created'])); ?> </span>
                            </div>
                            <?php
                            $sql = "SELECT * FROM `parcel_tracks`  WHERE parcel_tracks.parcel_id=$parcel_id";
                            $result = $con->query($sql);

                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text m"><?php echo $status_arr[$row['status']] ?> <br> <?php echo
                                                                                                                                                                                        date('Y:m:d', strtotime($row['date_created']));
                                                                                                                                                                                        ?> </span>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="text-center mt-5">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId" aria-pressed="false" autocomplete="off">View Parcel Details</button>
                        </div>

                    <?php
                    } else {
                    ?>
                        <h4 class="text-center text-danger">No orders Found</h4>

                    <?php
                    }
                    ?>
                </div>
            </article>
        </div>
    </section>




    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">



        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                    $sql = "SELECT * FROM `parcels` WHERE parcels.reference_number=$tracking_number";
                    $result = $con->query($sql);
                    ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="contentpdf">
                        <h5 class="modal-title text-center">Percel Details</h5>
                        <hr>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            $estimated_del_date = date('Y-m-d', strtotime($row['date_created'] . ' + 5 days'));
                            $status = $status_arr[$row['status']];
                            $parcel_id = $row['id'];
                        ?>

                            <div class="row">

                                <div class="col-md-6 p-2">
                                    <p>
                                        Sender Name:<?php echo $row['sfname'] ?>
                                    </p>
                                    <p>
                                        Sender Address: <?php echo $row['sender_address'] ?>
                                    </p>
                                    <p>
                                        Sender Contact: <?php echo $row['sender_contact'] ?>
                                    </p>
                                </div>
                                <div class="col-md-6 p-2">
                                    <p>
                                        Recipient Name: <?php echo $row['rfname'] ?>
                                    </p>
                                    <p>
                                        Recipient Address: <?php echo $row['recipient_address'] ?>
                                    </p>
                                    <p>
                                        Recipient Contact: <?php echo $row['recipient_contact'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">

                                <?php
                                $from_id = $row['from_branch_id'];
                                $from_brance_result = $con->query("SELECT * FROM branches WHERE branches.id= $from_id");
                                $from_brance_result = mysqli_fetch_array($from_brance_result);
                                $to_id = $row['to_branch_id'];
                                $to_brance_result = $con->query("SELECT * FROM branches WHERE branches.id= $to_id");
                                $to_brance_result = mysqli_fetch_array($to_brance_result);
                                ?>
                                <div class="col-md-8 mx-auto text-center">
                                    <p>Parcel Weight : <?php echo $row['weight'] ?> Kg</p>
                                    <p>Parcel Height : <?php echo $row['height'] ?> In</p>
                                    <p>Parcel Width : <?php echo $row['width'] ?> In</p>
                                    <p>Parcel Length : <?php echo $row['length'] ?> In</p>
                                    <p>Parcel Price : <?php echo $row['price'] ?> GHC</p>
                                    <p>Branch Processed: <?php echo $from_brance_result['street'] . " " . $from_brance_result['city']  ?> </p>
                                    <p>Pick Up Branch: <?php echo $to_brance_result['street'] . " " . $to_brance_result['city']  ?> </p>
                                    <p>Status : <span class="badge badge-success p-2"><?php echo $status ?></span></p>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" id="gerarPDF">Download</button> -->

                </div>
            </div>
        </div>
    </div>

    <?php include('php-layout-files/footer.php') ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha256-c3RzsUWg+y2XljunEQS0LqWdQ04X1D3j22fd/8JCAKw=" crossorigin="anonymous"></script>

    <script>
        let doc = new jsPDF('portrait', 'pt', 'a4');

        let btn = document.getElementById('gerarPDF');

        let conteudo = document.getElementById('contentpdf');

        btn.addEventListener('click', function() {

            doc.addHTML(conteudo, 0, 10, function() {

                var blob = doc.output("blob");
                window.open(URL.createObjectURL(blob));
            });

        })
    </script>


</body>

</html>