<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo 'Method Not Allowed: Only POST requests are allowed.';
    exit();
}

// Check if report data exists in session
if (!isset($_SESSION['report'])) {
    echo "No report data found.";
    exit();
}

// Retrieve report data from session
$report = $_SESSION['report'];

// Validate email address
if (empty($report['email'])) {
    echo "Error: Email address is not provided.";
    exit();
}

// Initialize PHPMailer
$mail = new PHPMailer(true);

// Server settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'aayushpalande28@gmail.com'; // SMTP username
$mail->Password = 'klqt mqyc ontn mlne'; // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

try {
    // Recipients
    $mail->setFrom('aayushpalande28@gmail.com', 'Student Report System');
    $mail->addAddress($report['email'], $report['first_name'] . ' ' . $report['last_name']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Student Report Card';
    $mail->Body    = '<h1>Student Report</h1>'
                    . '<p>Student ID: ' . htmlspecialchars($report['student_id']) . '</p>'
                    . '<p>First Name: ' . htmlspecialchars($report['first_name']) . '</p>'
                    . '<p>Last Name: ' . htmlspecialchars($report['last_name']) . '</p>'
                    . '<p>Batch: ' . htmlspecialchars($report['batch']) . '</p>'
                    . '<p>Email: ' . htmlspecialchars($report['email']) . '</p>'
                    . '<p>English: ' . htmlspecialchars($report['english']) . '</p>'
                    . '<p>Hindi: ' . htmlspecialchars($report['hindi']) . '</p>'
                    . '<p>Math: ' . htmlspecialchars($report['math']) . '</p>'
                    . '<p>Science: ' . htmlspecialchars($report['science']) . '</p>'
                    . '<p>History: ' . htmlspecialchars($report['history']) . '</p>'
                    . '<p>Geography: ' . htmlspecialchars($report['geography']) . '</p>'
                    . '<p>Total: ' . htmlspecialchars($report['total']) . '</p>'
                    . '<p>Percentage: ' . htmlspecialchars($report['percentage']) . '%</p>'
                    . '<p>Grade: ' . htmlspecialchars($report['grade']) . '</p>'
                    . '<p>Remarks: ' . htmlspecialchars($report['remarks']) . '</p>';

    // Send email
    $mail->send();
    echo '<script>alert("Email has been sent."); window.location.replace("index.html");</script>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
