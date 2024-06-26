<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#donorForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data
            var formData = new FormData(this);

            // Send form data via AJAX
            $.ajax({
                url: 'Savedata.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#successModal').modal('show'); // Show success modal
                        $('#donorForm')[0].reset(); // Reset the form
                    } else {
                        $('#errorModal .modal-body').text(response.message); // Update modal message
                        $('#errorModal').modal('show'); // Show error modal
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error: ' + status + '\n' + error); // Display error message in an alert
                }
            });
        });

        // Reset form fields when modal is closed
        $('#successModal, #errorModal').on('hidden.bs.modal', function (e) {
            $('#donorForm')[0].reset(); // Reset the form
        });
    });
</script>


</head>

<body>
  <?php
  $active = 'donate';
  include ('Head.php') ?>

  <div id="page-container" style="margin-top:20px; position: relative;min-height: 90vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="mt-5 mb-3">Donate Blood </h1>
          </div>
        </div>
        <form id = "donorForm" name="donor" action="Savedata.php" method="post">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Full Name<span style="color:red">*</span></div>
              <div><input type="text" name="fullname" class="form-control" required></div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Mobile Number<span style="color:red">*</span></div>
              <div><input type="text" name="mobileno" class="form-control" required></div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Email Id</div>
              <div><input type="email" name="emailid" class="form-control"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Age<span style="color:red">*</span></div>
              <div><input type="text" name="age" class="form-control" required></div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Gender<span style="color:red">*</span></div>
              <div><select name="gender" class="form-control" required>
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Blood Group<span style="color:red">*</span></div>
              <div><select name="blood" class="form-control" required>
                  <option value="" selected disabled>Select</option>
                  <?php
                  include 'conn.php';
                  $sql = "select * from blood";
                  $result = mysqli_query($conn, $sql) or die("query unsuccessful.");
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value=" <?php echo $row['blood_id'] ?>"> <?php echo $row['blood_group'] ?> </option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Address<span style="color:red">*</span></div>
              <div><textarea class="form-control" name="address" required></textarea></div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Last Donation Date</div>
              <div><input type="date" name="lastdonation_date" class="form-control" required></div>
              <div class="font-italic mt-2">Donation Date</div>
              <div><input type="date" name="donation_date" class="form-control" required></div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="font-italic">Medical History</div>
              <div><textarea class="form-control" name="medical_history" required></textarea></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php include ('Footer.php') ?>
  </div>
  <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data submitted successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Error message will be inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>