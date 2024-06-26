<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Font.css">
</head>

<body style="scroll-behavior: smooth">
  <div class="header">
    <?php
    $active = "home";
    include ('Head.php'); ?>

  </div>

  <div id="page-container" style="margin-top:10px; position: relative;min-height: 84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:75px;">
        <div id="demo" class="carousel slide" data-ride="carousel">

          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
          </ul>

          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Images\carousel_image1.jpg" alt="Images\carousel_image1.jpg" width="100%" height="500">
            </div>
            <div class="carousel-item">
              <img src="Images\carousel_image2.png" alt="Images\carousel_image2.png" width="100%" height="500">
            </div>

          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
        <br>
        <h1 style="text-align:center;font-size:45px;">Welcome to BloodBank & Donor Management System</h1>
        <br>
        <!-- --------------------------------------------------------- -->
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header card bg-danger text-white">Universal Donors And Recepients</h4>

              <div class="card-body overflow-auto"
                style="padding-left: 2%; height: 200px; text-align: left; overflow-y: auto;">
                <?php
                include 'Conn.php';
                $sql = "SELECT * FROM pages WHERE page_type='universal'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <!-- ----------------------------------------------------- -->
          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header card bg-danger text-white">About us</h4>

              <div class="card-body overflow-auto"
                style="padding-left: 2%; height: 200px; text-align: left; overflow-y: auto;">
                <?php
                include 'Conn.php';
                $sql = "SELECT * FROM pages WHERE page_type='aboutus'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <!-- ---------------------------------------------------------- -->
          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header card bg-danger text-white">Why Becom a Donor</h4>

              <div class="card-body overflow-auto"
                style="padding-left: 2%; height: 200px; text-align: left; overflow-y: auto;">
                <?php
                include 'Conn.php';
                $sql = "SELECT * FROM pages WHERE page_type='donor'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <!-- ------------------------------------------------------------- -->
          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header card bg-danger text-white">The need for blood</h4>

              <p class="card-body overflow-auto" style="padding-left:2%;height:120px;text-align:left;">
                <?php
                include 'Conn.php';
                $sql = $sql = "select * from pages where page_type='needforblood'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }

                ?>
              </p>
            </div>
          </div>
          <!-- ------------------------------------------------------------- -->
          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header card bg-danger text-white">Blood Tips</h4>

              <p class="card-body overflow-auto" style="padding-left:2%;height:120px;text-align:left;">
                <?php
                include 'Conn.php';
                $sql = $sql = "select * from pages where page_type='bloodtips'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }

                ?>
              </p>

            </div>
          </div>
          <!-- ------------------------------------------------------------ -->
          <div class="col-lg-4 mb-4">
            <div class="card">
              <h4 class="card-header card bg-danger text-white">Who you could Help</h4>

              <p class="card-body overflow-auto" style="padding-left:2%;height:120px;text-align:left;">
                <?php
                include 'Conn.php';
                $sql = $sql = "select * from pages where page_type='whoyouhelp'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['page_data'];
                  }
                }

                ?>
              </p>


            </div>
          </div>
        </div>
        <!-- ------------------------------------------------------------------- -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header card bg-danger text-white">Blood Groups</h4>

            <div class="card-body overflow-auto"
              style="padding-left: 2%; height: 200px; text-align: left; overflow-y: auto;">
              <?php
              include 'Conn.php';
              $sql = "SELECT * FROM pages WHERE page_type='bloodgroups'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['page_data'];
                }
              }
              ?>
            </div>
          </div>
        </div>

        <div>
          <h3 style="color:red">Note:-</h3>
          <p style="color:blue">1.You must be in good health at the time you donate. You cannot donate if you have a
            cold, flu, sore throat, cold sore, stomach bug or any other infection. If you have recently had a tattoo or
            body piercing you cannot donate for 6 months from the date of the procedure.</p>
          <p style="color:blue; margin-top:0">2.People with type 1 and type 2 diabetes are eligible to give blood
            donations. But you should properly manage your diabetes and be in otherwise good health before donating
            blood. Properly managing your diabetes means that you maintain healthy blood sugar levels. This requires you
            to be vigilant about your diabetes daily.</p>
            <p style="color:blue; margin-top:0">3.The minimum time advised between two donations is 3 months. This gap helps blood regain the normal haemoglobin count. The age of the donor must be above 18 years and below 65 years of age. He/she must have a haemoglobin count that is not less than 12.5 g/dl..</p>
        </div>


        <h2>Blood Donor Names</h2>

        <div class="row">
          <?php
          include 'Conn.php';
          $sql = "select * from donor_details join blood where donor_details.donor_blood=blood.blood_id order by rand() limit 6";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="col-lg-4 col-sm-6 portfolio-item"><br>
                <div class="card" style="width:300px">
                  <img class="card-img-top" src="Images\blood_drop_logo.jpg" alt="Card image"
                    style="width:100%;height:300px">
                  <div class="card-body">
                    <h3 class="card-title">
                      <?php echo $row['donor_name']; ?>
                    </h3>
                    <p class="card-text">
                      <b>Blood Group : </b> <b>
                        <?php echo $row['blood_group']; ?>
                      </b><br>
                      <b>Mobile No. : </b>
                      <?php echo $row['donor_number']; ?><br>
                      <b>Gender : </b>
                      <?php echo $row['donor_gender']; ?><br>
                      <b>Age : </b>
                      <?php echo $row['donor_age']; ?><br>
                      <b>Address : </b>
                      <?php echo $row['donor_address']; ?><br>
                    </p>

                  </div>
                </div>
              </div>
            <?php }
          } ?>
        </div>
        <br>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
          <div class="col-lg-6">
            <h2>BLOOD GROUPS</h2>
            <p>
              <?php
              include 'Conn.php';
              $sql = $sql = "select * from pages where page_type='bloodgroups'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['page_data'];
                }
              }

              ?>
            </p>

          </div>
          <div class="col-lg-6">
            <img class="img-fluid rounded" src="Images\Blood_Group.jpg" alt="image">
          </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
          <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
            <p>
              <?php
              include 'Conn.php';
              $sql = $sql = "select * from pages where page_type='universal'";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['page_data'];
                }
              }

              ?>
            </p>
          </div>
          <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="Donate_blood.php"
              style="align:center; background-color:#7FB3D5;color:#273746 ">Become a Donor </a>
          </div>
        </div>

      </div>
    </div>
    <?php include ('Footer.php'); ?>
  </div>

</body>

</html>