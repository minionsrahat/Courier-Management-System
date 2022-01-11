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


    <!-- Parcel Customer input Information  -->

    <section class="mt-5">

        <div class="container-fluid my-5 mt-5">

            <div class="col-lg-10 mx-auto">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <form action="" id="manage-parcel">
                            <div id="msg" class=""></div>
                            <div class="row">

                                <div class="col-md-6">
                                    <b>Sender Information</b>
                                    <div class="form-group">
                                        <label for="" class="control-label">First Name</label>
                                        <input type="text" name="sfname" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Last Name</label>
                                        <input type="text" name="slname" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Address</label>
                                        <input type="text" name="sender_address" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Contact #</label>
                                        <input type="text" name="sender_contact" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <b>Recipient Information</b>
                                    <div class="form-group">
                                        <label for="" class="control-label">First Name</label>
                                        <input type="text" name="rfname" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Last Name</label>
                                        <input type="text" name="rlname" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Address</label>
                                        <input type="text" name="recipient_address" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="control-label">Contact #</label>
                                        <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" value="" required>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <input type="hidden" name="user_id" value="<?php
                            if(isset($_SESSION['user_id'])){
                                echo $_SESSION['user_id'];
                            }
                            else{
                                echo 0;
                            }
                             ?>">

                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6" id="">
                                    <div class="form-group" id="fbi-field">
                                        <label for="" class="control-label">Branch Processed</label>
                                        <select name="from_branch_id" id="from_branch_id" class="form-control select2" required="">
                                            <option value=""></option>
                                            <?php
                                            $branches = $con->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                                            while ($row = $branches->fetch_assoc()) :
                                            ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['branch_code'] . ' | ' . (ucwords($row['address'])) ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="tbi-field">
                                        <label for="" class="control-label">Pickup Branch</label>
                                        <select name="to_branch_id" id="to_branch_id" class="form-control select2">
                                            <option value=""></option>
                                            <?php
                                            $branches = $con->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                                            while ($row = $branches->fetch_assoc()) :
                                            ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['branch_code'] . ' | ' . (ucwords($row['address'])) ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="tbi-field">
                                        <label for="" class="control-label">Mode of payment</label>
                                        <select name="payment_mode" id="" class="form-control select">
                                            <option value="1">Pay on pick up</option>
                                            <option value="2">Via Momo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                            <b>Parcel Information : (5 GHC/Kg, Hanling fee: 2 GHC, Distance Fee: 3 GHC)</b><br>
                                    
                            <table class="table table-bordered mt-2" id="parcel-items">
                                <thead>
                                    <tr>
                                        <th>Weight(Kg)</th>
                                        <th>Height(Inch)</th>
                                        <th>Length(Inch)</th>
                                        <th>Width(Inch)</th>
                                        <th>Price(Inch)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name='weight' value="<?php echo isset($weight) ? $weight : '' ?>" required></td>
                                        <td><input type="text" name='height' value="<?php echo isset($height) ? $height : '' ?>" required></td>
                                        <td><input type="text" name='length' value="<?php echo isset($length) ? $length : '' ?>" required></td>
                                        <td><input type="text" name='width' value="<?php echo isset($width) ? $width : '' ?>" required></td>
                                        <td><input type="text" class="text-right number"id="tAmount" name='price' value="" readonly></td>
                                    </tr>
                                </tbody>
                            </table>

                    </div>
                    <div class="card-footer border-top border-info">
                        <div class="d-flex w-100 justify-content-center align-items-center">
                            <button class="btn btn-primary mx-2" form="manage-parcel">Save</button>
                            <a class="btn btn-secondary mx-2" href="index.php">Cancel</a>
                        </div>
                    </div>

                    </form>
                </div>
            </div>


        </div>

    </section>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#successmodelId">
      Launch
    </button> -->
    
    <!-- Modal -->
    <div class="modal fade" id="successmodelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                   <h4 class="text-success text-center">You Succesfully Send Your Parcel Information Request</h4>
                   <h4 id="tracking-id" class="text-primary text-center">Your Parcel Tracking ID: 897856905844 </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload()">Close</button>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- Parcel Customer input Information  -->


    <!-- FOOTER SECTION START -->
    <?php include('php-layout-files/footer.php') ?>
    <!-- HOME SECTION END -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $('#dtype').change(function() {
            if ($(this).prop('checked') == true) {
                $('#tbi-field').hide()
            } else {
                $('#tbi-field').show()
            }
        })
        $('[name="weight"]').keyup(function() {
            calc()
        })
        $('#new_parcel').click(function() {
            var tr = $('#ptr_clone tr').clone()
            $('#parcel-items tbody').append(tr)
            $('[name="price[]"]').keyup(function() {
                calc()
            })
            $('.number').on('input keyup keypress', function() {
                var val = $(this).val()
                val = val.replace(/[^0-9]/, '');
                val = val.replace(/,/g, '');
                val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
                $(this).val(val)
            })

        })
        $('#manage-parcel').submit(function(e) {
            e.preventDefault()
            if ($('#parcel-items tbody tr').length <= 0) {
                alert_toast("Please add atleast 1 parcel information.", "error")
                end_load()
                return false;
            }
            $.ajax({
                url: 'php-functions/curd-data-man.php?action=send_request',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function(resp) {

                    $('#tracking-id').text('Your Parcel Tracking ID:'+resp);
                    $('#successmodelId').modal('show');

                }
            })
        })

        function displayImgCover(input, _this) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#cover').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function calc() {
            var total = 5;
            $('#parcel-items [name="weight"]').each(function() {
                var p = $(this).val();
                p = p.replace(/,/g, '')
                p = p > 0 ? p : 0;
                total = parseFloat(p)*5 + parseFloat(total)
            })
            if ($('#tAmount').length > 0)
                $('#tAmount').val(parseFloat(total).toLocaleString('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 2,
                    minimumFractionDigits: 2
                }))
        }
    </script>



</body>

</html>