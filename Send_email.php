<?php
// Include PHPMailer autoloader and SMTP settings
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'om.bhoite2002@gmail.com'; // Your email address
$mail->Password = 'egpp dqqb ubmx tztv'; // Your email password
$mail->SMTPSecure = 'tls'; // Set to 'ssl' or 'tls' based on your email provider
$mail->Port = 587; // Set the appropriate SMTP port

// Enable debugging
$mail->SMTPDebug = SMTP::DEBUG_CONNECTION;  // Enable verbose debug output
$mail->Debugoutput = 'html';  // Set debug output format to HTML

$mail->setFrom('om.bhoite2002@gmail.com', 'Admin'); // Your email and name
$mail->addAddress($email, $name); // Recipient's email and name
$mail->Subject = 'Thank you for donating blood';
$mail->isHTML(true);
$mail->Body = '<p>Thank you for donating blood!</p><br><p>Name: ' . $name . '<br>Email: ' . $email . '<br>number: ' . $number.'<br>age: ' . $age.'<br>Gender: ' . $gender.'<br>Blood Group: ' . $blood_group.'<br>Address: ' . $address.'<br>last donation date: ' . $lastdonation_date.'<br>Medical History: ' . $medical_history.'<br>Donation date: ' . $donation_date.'</p>';

try {
    // Send the email
    if ($mail->send()) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Error sending email: ' . $mail->ErrorInfo);
    }
} catch (Exception $e) {
    $response = array('status' => 'error', 'message' => 'Error sending email: ' . $e->getMessage());
}
?>