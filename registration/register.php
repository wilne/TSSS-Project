<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection here
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'web';

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $adminNumber = $_POST['adminNo'];
    $studentName = $_POST['studentname'];
    $parentName = $_POST['parentname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Not hashed password

    // Generate activation code
    $activationCode = rand(100000, 999999);

    // Insert user data into the database
    $insertQuery = "INSERT INTO accounts (adminNo, studentname, parentname, phone, email, password, activation_code) VALUES ('$adminNumber', '$studentName', '$parentName', '$phone', '$email', '$password', '$activationCode')";
 
    if ($conn->query($insertQuery) === TRUE) {
    require 'PHPMailer-master\src\PHPMailer.php';
    require 'PHPMailer-master\src\SMTP.php';
    require 'PHPMailer-master\src\Exception.php';
    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // Rest of your code
    // Set SMTP settings for Outlook (Microsoft 365)
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'abelelifuraha@outlook.com'; // Your Outlook email address
    $mail->Password = 'kooltuo6002';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );  
    $mail->Port = 587;

    // Set email details
    $recipientEmail = $_POST['email']; // Recipient's email address
    $act_code = $activationCode; // Replace with your activation code

    $mail->setFrom('abelelifuraha@outlook.com', 'Abel'); // Your Outlook email address and name
    $mail->addAddress($recipientEmail);
    $mail->Subject = 'Activation Code';
    $mail->Body = "Your activation code is: $act_code";

    // Send the email
    if ($mail->send()) {
        echo 'Activation code sent successfully.';
    } else {
        echo 'Error sending activation code: ' . $mail->ErrorInfo;
    }
}
}
?>
