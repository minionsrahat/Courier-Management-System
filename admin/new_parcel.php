<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php
if (!isset($_SESSION['login_id']))
  header('location:login.php');
include 'db_connect.php';
include 'header.php'
?>
<style>
  textarea {
    resize: none;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <?php include 'topbar.php' ?>
    <?php include 'sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
      <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?php echo "HOME/ADD NEW PARCEL" ?></h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
          <hr class="border-primary">
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="col-lg-12">
            <div class="card card-outline card-primary">
              <div class="card-body">
                <form action="" id="manage-parcel">
                  <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                  <div id="msg" class=""></div>
                  <div class="row">
                    <div class="col-md-6">
                      <b>Sender Information</b>
                      <div class="form-group">
                        <label for="" class="control-label">First Name</label>
                        <input type="text" name="sfname" id="" class="form-control form-control-sm" value="<?php echo isset($sfname) ? $sfname : '' ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Last Name</label>
                        <input type="text" name="slname" id="" class="form-control form-control-sm" value="<?php echo isset($slname) ? $slname : '' ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <input type="text" name="sender_address" id="" class="form-control form-control-sm" value="<?php echo isset($sender_address) ? $sender_address : '' ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Contact #</label>
                        <input type="text" name="sender_contact" id="" class="form-control form-control-sm" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <b>Recipient Information</b>
                      <div class="form-group">
                        <label for="" class="control-label">First Name</label>
                        <input type="text" name="rfname" id="" class="form-control form-control-sm" value="<?php echo isset($rfname) ? $rfname : '' ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Last Name</label>
                        <input type="text" name="rlname" id="" class="form-control form-control-sm" value="<?php echo isset($rlname) ? $rlname : '' ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <input type="text" name="recipient_address" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_address) ? $recipient_address : '' ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Contact #</label>
                        <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>" required>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6" id="">

                      <div class="form-group" id="fbi-field">
                        <label for="" class="control-label">Branch Processed</label>
                        <select name="from_branch_id" id="from_branch_id" class="form-control select2" required="">
                          <option value=""></option>
                          <?php
                          $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                          while ($row = $branches->fetch_assoc()) :
                          ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($from_branch_id) && $from_branch_id == $row['id'] ? "selected" : '' ?>><?php echo $row['branch_code'] . ' | ' . (ucwords($row['address'])) ?></option>
                          <?php endwhile; ?>
                        </select>
                      </div>
                      <div class="form-group" id="tbi-field">
                        <label for="" class="control-label">Pickup Branch</label>
                        <select name="to_branch_id" id="to_branch_id" class="form-control select2">
                          <option value=""></option>
                          <?php
                          $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                          while ($row = $branches->fetch_assoc()) :
                          ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($to_branch_id) && $to_branch_id == $row['id'] ? "selected" : '' ?>><?php echo $row['branch_code'] . ' | ' . (ucwords($row['address'])) ?></option>
                          <?php endwhile; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <b>Parcel Information : (5 GHC/Kg, Hanling fee: 2 GHC, Distance Fee: 3 GHC)</b><br>
                  <table class="table table-bordered" id="parcel-items">
                    <thead>
                      <tr>
                        <th>Weight(Kg)</th>
                        <th>Height(Inch)</th>
                        <th>Length(Inch)</th>
                        <th>Width(Inch)</th>
                        <th>Price(Inch)</th>
                        <?php if (!isset($id)) : ?>
                          <th></th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text" name='weight[]' value="<?php echo isset($weight) ? $weight : '' ?>" required></td>
                        <td><input type="text" name='height[]' value="<?php echo isset($height) ? $height : '' ?>" required></td>
                        <td><input type="text" name='length[]' value="<?php echo isset($length) ? $length : '' ?>" required></td>
                        <td><input type="text" name='width[]' value="<?php echo isset($width) ? $width : '' ?>" required></td>
                        <td><input type="text" class="text-right number" id="tAmount" name='price[]' value="<?php echo isset($price) ? $price : '' ?>" readonly></td>
                        <!-- <?php if (!isset($id)) : ?>
                          <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
                        <?php endif; ?> -->
                      </tr>
                    </tbody>
                    <?php if (!isset($id)) : ?>
                      <tfoot>
                        <th colspan="4" class="text-right">Total</th>
                        <th class="text-right" id="tAmount-text">0.00</th>
                        <th></th>
                      </tfoot>
                    <?php endif; ?>
                  </table>

                </form>
              </div>
              <div class="card-footer border-top border-info">
                <div class="d-flex w-100 justify-content-center align-items-center">
                  <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-parcel">Save</button>
                  <a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=parcel_list">Cancel</a>
                </div>
              </div>
            </div>
          </div>
          <div id="ptr_clone" class="d-none">
            <table>
              <tr>
                <td><input type="text" name='weight[]' required></td>
                <td><input type="text" name='height[]' required></td>
                <td><input type="text" name='length[]' required></td>
                <td><input type="text" name='width[]' required></td>
                <td><input type="text" class="text-right number" name='price[]' required></td>
                <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
              </tr>
            </table>
          </div>


        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
      <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body">
              <div id="delete_content"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height  modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fa fa-arrow-right"></span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
            <img src="" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <!-- Bootstrap -->
  <?php include 'footer.php' ?>
  <script>
    $('#dtype').change(function() {
      if ($(this).prop('checked') == true) {
        $('#tbi-field').hide()
      } else {
        $('#tbi-field').show()
      }
    })
    $('[name="weight[]"]').keyup(function() {
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
      start_load()
      if ($('#parcel-items tbody tr').length <= 0) {
        alert_toast("Please add atleast 1 parcel information.", "error")
        end_load()
        return false;
      }
      $.ajax({
        url: 'ajax.php?action=save_parcel',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
          if (resp == 1) {
            alert_toast('Data successfully saved', "success");
            setTimeout(function() {
              location.href = 'parcel_list.php';
            }, 2000)

          }
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
      $('#parcel-items [name="weight[]"]').each(function() {
        var p = $(this).val();
        p = p.replace(/,/g, '')
        p = p > 0 ? p : 0;
        total = parseFloat(p) * 5 + parseFloat(total)
      })
      if ($('#tAmount').length > 0)
        $('#tAmount').val(parseFloat(total).toLocaleString('en-US', {
          style: 'decimal',
          maximumFractionDigits: 2,
          minimumFractionDigits: 2
        }))
      $('#tAmount-text').text(parseFloat(total).toLocaleString('en-US', {
        style: 'decimal',
        maximumFractionDigits: 2,
        minimumFractionDigits: 2
      }))
    }
  </script>
</body>

</html>