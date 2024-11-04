<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $companyName = $_POST['companyName'];
    $rolePosition = $_POST['rolePosition'];
    $message = $_POST['message'];
    $demoOptions = isset($_POST['demoOption']) ? implode(", ", $_POST['demoOption']) : 'None selected';

    // Email settings
    $to = "petrosntralos@gmail.com"; // Replace with your email address
    $subject = "Demo Request from $fullName";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email content
    $emailBody = "
    <html>
    <head><title>Demo Request</title></head>
    <body>
        <h2>Demo Request Details</h2>
        <p><strong>Full Name:</strong> $fullName</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Company Name:</strong> $companyName</p>
        <p><strong>Role/Position:</strong> $rolePosition</p>
        <p><strong>Message/Requests:</strong> $message</p>
        <p><strong>Demo Options Selected:</strong> $demoOptions</p>
    </body>
    </html>
    ";

    // Send email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "Thank you! Your request has been sent.";
    } else {
        echo "Sorry, there was an error sending your request. Please try again later.";
    }
}
?>


