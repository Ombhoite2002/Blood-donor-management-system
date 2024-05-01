<?php
include 'Conn.php';
  $donor_id = $_GET['id'];
$sql= "DELETE FROM donor_details where donor_id={$donor_id}";
$result=mysqli_query($conn,$sql);

header("Location: Donor_list.php");

mysqli_close($conn);

 ?>
