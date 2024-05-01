<?php
$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];
$lastdonation_date = $_POST['lastdonation_date'];
$medical_history = isset($_POST['medical_history']) ? $_POST['medical_history'] : ''; 
$donation_date = $_POST['donation_date'];

$conn = mysqli_connect("localhost", "root", "", "blood_donation") or die("Connection error");

// Escape all user inputs to prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$number = mysqli_real_escape_string($conn, $number);
$email = mysqli_real_escape_string($conn, $email);
$age = mysqli_real_escape_string($conn, $age);
$gender = mysqli_real_escape_string($conn, $gender);
$blood_group = mysqli_real_escape_string($conn, $blood_group);
$address = mysqli_real_escape_string($conn, $address);
$lastdonation_date = mysqli_real_escape_string($conn, $lastdonation_date);
$medical_history = mysqli_real_escape_string($conn, $medical_history);
$donation_date = mysqli_real_escape_string($conn, $donation_date);

$sql = "INSERT INTO donor_details (donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address, lastdonation_date, medical_history, donation_date) 
VALUES ('{$name}', '{$number}', '{$email}', '{$age}', '{$gender}', '{$blood_group}', '{$address}', '{$lastdonation_date}', '{$medical_history}', '{$donation_date}')";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Query error: ' . mysqli_error($conn));
}

header("Location: http://localhost/BDMS/Donate_blood.php");

mysqli_close($conn);
?>
