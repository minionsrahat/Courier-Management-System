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

    <style>
        .container-m {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 20px
        }

        .card {
            background-color: #fff;
            padding: 15px;
            border: none;
            height: 250px;
            margin-top: 10px;

        }

        .card p {
            color: black !important;
        }

        .u-color {
            color: blue !important;
        }

        .user-image img {
            border: 3px solid #00f;
            padding: 2px
        }
        .carousel-indicators li {
            background-color:black!important;
        }
        .carousel img{
            width: 100%!important;
            height: 400px;
        }
    </style>
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

    <!-- HOME SECTION START -->
    <!--
    ####################################################
    C A R O U S E L
    ####################################################
    -->
    <div id="carousel" class="carousel slide carousel-fade " data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
            <li data-target="#carousel" data-slide-to="4"></li>
            <li data-target="#carousel" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="index.php">
                    <picture>
                        <img srcset="images/Slider/1.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>
                    
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="index.php/">
                    <picture>
                        <img srcset="images/Slider/2.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>
                </a>
            </div>
            <!-- /.carousel-item -->
            <div class="carousel-item">
                <a href="index.php">
                    <picture>
                        <img srcset="images/Slider/3.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>                    
                </a>
            </div>
            <div class="carousel-item">
                <a href="index.php">
                    <picture>
                        <img srcset="images/Slider/4.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture> 
                </a>
            </div>
            <div class="carousel-item">
                <a href="index.php">
                    <picture>
                        <img srcset="images/Slider/5.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>
                </a>
            </div>
            <div class="carousel-item">
                <a href="index.php">
                    <picture>
                        <img srcset="images/Slider/6.jpg" alt="responsive image" class="d-block img-fluid">
                    </picture>   
                </a>
            </div>
            <!-- /.carousel-item -->
        </div>
        <!-- /.carousel-inner -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->


    <!-- /.container -->






    <section id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <div class="title-div">
                        <h3 class='title'>Our Courier Management System offers you to ease your daily work of your courier service.If you are looking for a best Courier Management software, then you are in the right place.</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="tracking-product.php" method="post">
                        <div class="input-group track-search-div">
                            <input type="text" class="form-control" name="tracking-number" required placeholder="Tracking Number">
                            <div class="input-group-append">
                                <button class="btn search-icon btn-secondary" type="submit">
                                    Track
                                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <div class="title-div">
                        <h3 class='title'>Want to buy Delicious Product?</h3>
                        <a name="" id="" class="btn btn-primary search-icon" href="#" role="button">Buy Product</a>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- HOME SECTION END -->

    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-10 mx-auto text-center">
                <h2 class="">Customer Reviews</h2>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-4 ">
                <div class="card p-2 shadow"> <i class="fa fa-quote-left u-color"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user-about"> <span class="font-weight-bold d-block">Alex Smith</span>
                            <div class="d-flex flex-row mt-1"> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star-o u-color"></i> <i class="fa fa-star-o u-color"></i> <i class="fa fa-star-o u-color"></i> </div>
                        </div>
                        <div class="user-image"> <img src="https://i.imgur.com/UUW3zLx.jpg" class="rounded-circle" width="70"> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow p-2 "> <i class="fa fa-quote-left u-color"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user-about"> <span class="font-weight-bold d-block">Sophia T.</span>
                            <div class="d-flex flex-row mt-1"> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star-o u-color"></i> <i class="fa fa-star-o u-color"></i> </div>
                        </div>
                        <div class="user-image"> <img src="https://i.imgur.com/o5uMfKo.jpg" class="rounded-circle" width="70"> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow p-2 "> <i class="fa fa-quote-left u-color"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user-about"> <span class="font-weight-bold d-block">Mike Vincent</span>
                            <div class="d-flex flex-row mt-1"> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star u-color"></i> <i class="fa fa-star-o u-color"></i> </div>
                        </div>
                        <div class="user-image"> <img src="https://i.imgur.com/At1IG6H.png" class="rounded-circle" width="70"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- FOOTER SECTION START -->
    <?php include('php-layout-files/footer.php') ?>
    <!-- HOME SECTION END -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>