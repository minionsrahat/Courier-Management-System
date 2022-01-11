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


<!-- contact-us section start -->
    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto p-3">
                    <div class="card">
                        <div class="card-body">

                            <?php
                            if (isset($_GET['success'])) {
                            ?>
                                <h4 class="card-title text-center">Thank you for your Kind Opinion</h4>
                            <?php
                            } else {
                            ?>
                                <h4 class="card-title text-center">Contact Us</h4>
                                <form action="php-functions/curd-data-man.php" method="post">
                                    <div class="form-group">
                                        <label for="">Your Name</label>
                                        <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" required placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Your Mail</label>
                                        <input type="email" class="form-control" name="mail" id="" aria-describedby="helpId" required placeholder="">
                                    </div>


                                    <div class="form-group">
                                    <label for="">Your Message</label>
                                      <textarea class="form-control" name="msg" id="" rows="3" required></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="contact-submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
    <!-- contact-us section end -->

    
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