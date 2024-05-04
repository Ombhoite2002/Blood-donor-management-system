<?php
// Handle form data here
$name = $_POST['fullname'] ?? '';
$number = $_POST['mobileno'] ?? '';
$email = $_POST['emailid'] ?? '';
$age = $_POST['age'] ?? '';
$gender = $_POST['gender'] ?? '';
$blood_group = $_POST['blood'] ?? '';
$address = $_POST['address'] ?? '';
$lastdonation_date = $_POST['lastdonation_date'] ?? '';
$medical_history = isset($_POST['medical_history']) ? $_POST['medical_history'] : '';
$donation_date = $_POST['donation_date'] ?? '';

$conn = mysqli_connect("localhost", "root", "", "blood_donation");

// Check for connection errors
if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}

// Escape user inputs to prevent SQL injection
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

// Calculate days difference
$last_donation_timestamp = strtotime($lastdonation_date);
$current_donation_timestamp = strtotime($donation_date);
$days_difference = ($current_donation_timestamp - $last_donation_timestamp) / (60 * 60 * 24);

if ($days_difference < 90) { // Less than 3 months (90 days)
    $next_donation_date = date('Y-m-d', strtotime($lastdonation_date . ' + 3 months'));
    $message = "You can't donate blood right now. Donate blood after 3 months from the last donation date. Next donation date: $next_donation_date.";
    echo $message;
} else {
    // Proceed with inserting data into the database
    $sql = "INSERT INTO donor_details (donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address, lastdonation_date, medical_history, donation_date) 
    VALUES ('$name', '$number', '$email', '$age', '$gender', '$blood_group', '$address', '$lastdonation_date', '$medical_history', '$donation_date')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        include 'Send_email.php';
        header("Location: Donate_blood.php");
        exit; 
    } else {
        die("Query error: " . mysqli_error($conn));
    }
}

// Close database connection
mysqli_close($conn);
?>