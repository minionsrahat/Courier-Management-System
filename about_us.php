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
        #team {
            padding: 60px 0;
            text-align: center;
            background-color: #d1d1d1;
            color: #145889;
        }

        #team h2 {
            position: relative;
            padding: 0px 0px 15px;
        }

        #team p {
            font-size: 15px;
            font-style: italic;
            padding: 0px;
            margin: 25px 0px 40px;
        }

        #team h2::after {
            content: '';
            border-bottom: 2px solid #fff;
            position: absolute;
            bottom: 0px;
            right: 0px;
            left: 0px;
            width: 90px;
            margin: 0 auto;
            display: block;
        }

        #team .member {
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            padding: 10px;
            border-radius: 15px 0px 15px 0px;
            box-shadow: 0px 1px 6px 0px rgba(0, 0, 0, 0.4);
        }

        #team .member .member-info {
            display: block;
            position: absolute;
            bottom: 0px;
            left: -200px;
            transition: 0.4s;
            padding: 15px 0;
            background: rgba(0, 0, 0, 0.4);
        }

        #team .member-img img {
            height: 300px !important;
        }

        #team .member:hover .member-info {
            left: 0px;
            right: 0px;
        }

        #team .member h4 {
            font-weight: 700;
            margin-bottom: 2px;
            font-size: 18px;
            color: #fff;
        }

        #team .member span {
            font-style: italic;
            display: block;
            font-size: 13px;
        }

        #team .member .social-links {
            margin-top: 15px;
        }

        #team .member .social-links a {
            transition: none;
            color: #fff;
        }

        #team .member .social-links a:hover {
            color: #ffc107;
        }

        #team .member .social-links i {
            font-size: 18px;
            margin: 0 2px;
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

    <?php
    include('php-functions/db_connection.php');
    include('php-functions/php_query_functions.php');
    ?>


<!-- team section start -->
    <section id="team" class="">
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center mb-2">
                <div class="col-md-6">
                    <h2>Meet Our Team</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="member-img">
                            <img src="images/ABOUT IMAGES/Alex Ofori - ADS19A00160Y.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Alex Ofori</h4>
                            <span class="text-white">Web Designer</span>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitch" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="member-img">
                            <img src="images/ABOUT IMAGES/Atumpami Abakomi - ADS19A00049Y.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Atumpami Abakomi</h4>
                            <span class="text-white">Web Developer</span>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitch" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="member-img">
                            <img src="images/ABOUT IMAGES/Boateng Eric Kwakye - ADS19A00055Y.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Boateng Eric Kwakye</h4>
                            <span class="text-white">Web Developer</span>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitch" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="member-img">
                            <img src="images/ABOUT IMAGES/Norbert Naanume - ADS19A00091Y.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Norbert Naanume</h4>
                            <span class="text-white">Web Developer</span>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitch" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team section end -->



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