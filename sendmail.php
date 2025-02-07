<?php
// Only run the script if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(stripslashes(trim($_POST["name"])));
    $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
    $message = htmlspecialchars(stripslashes(trim($_POST["message"])));

    // Specify your email address
    $to = "your-email@example.com";
    // Specify the email subject
    $subject = "New Contact Form Submission";
    // Create the email body
    $body = "You have received a new message from: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";

    // Send the email using PHP's mail function
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us, $name. We will get back to you shortly.";
    } else {
        echo "Oops! Something went wrong, please try submitting the form again.";
    }
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
