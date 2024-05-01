<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    #sidebar {
      position: relative;
      margin-top: -20px
    }

    #content {
      position: relative;
      margin-left: 210px
    }

    @media screen and (max-width: 600px) {
      #content {
        position: relative;
        margin-left: auto;
        margin-right: auto;
      }
    }
  </style>
</head>

<body style="color:black">

  <?php
  include 'Conn.php';
  include 'Session.php';
  if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

    <div id="header">
      <?php include 'Header.php';
      ?>
    </div>
    <div id="sidebar">
      <?php
      $active = "contact";
      include 'Sidebar.php'; ?>

    </div>
    <div id="content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 lg-12 sm-12">

              <h1 class="page-title">Update Contact Info</h1>
            </div>
          </div>
          <hr>
          <?php if (isset ($_POST['update'])) {
            $address = $_POST['address'];
            $contactno = $_POST['contactno'];
            $email = $_POST['email'];
            $conn = mysqli_connect("localhost", "root", "", "blood_donation") or die ("Connection error");
            // Check if contact_info table is empty
            $check_sql = "SELECT * FROM contact_info";
            $check_result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($check_result) > 0) {
              // Update existing data
              $sql = "UPDATE contact_info SET contact_address='$address', contact_mail='$email', contact_phone='$contactno' WHERE contact_id='5'";
              $result = mysqli_query($conn, $sql) or die ("Query unsuccessful.");
              echo '<div class="alert alert-success"><b>Contact Details Updated Successfully.</b></div>';
            } else {
              // Insert new data
              $sql = "INSERT INTO contact_info (contact_address, contact_mail, contact_phone) VALUES ('$address', '$email', '$contactno')";
              $result = mysqli_query($conn, $sql) or die ("Query unsuccessful.");
              echo '<div class="alert alert-success"><b>Contact Details Inserted Successfully.</b></div>';
            }

            mysqli_close($conn);
          }
          ?>


          <div class="row">
            <div class="col-md-10">
              <div class="panel panel-default">
                <div class="panel-heading">Contact Details</div>
                <div class="panel-body">
                  <form method="post" name="change_contact" class="form-horizontal">

                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Address</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" name="address" id="address" required></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Email id</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" id="email" value="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label"> Contact Number </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" value="" name="contactno" id="contactno" required>
                      </div>
                    </div>

                    <div class="hr-dashed"></div>




                    <div class="form-group">
                      <div class="col-sm-8 col-sm-offset-4">

                        <button class="btn btn-primary" name="update" type="submit">Update</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>

          </div>


        </div>
      </div>
    </div>
    <?php
  } else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
    ?>
    <form method="post" name="" action="Login.php" class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-4" style="float:left">

          <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
        </div>
      </div>
    </form>
  <?php }
  ?>

</body>

</html>