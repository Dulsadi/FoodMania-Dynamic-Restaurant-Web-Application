<?php
include('../functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $query = "SELECT * FROM admin WHERE Email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Generate a unique token (generate a random string)
        $token = bin2hex(random_bytes(32));

        // Store the token in the database along with the user's email and a timestamp (for expiration)
        $timestamp = date('Y-m-d H:i:s', strtotime('+1 hour')); // Set expiration time
        $insertQuery = "INSERT INTO password_reset (email, token, expires_at) VALUES ('$email', '$token', '$timestamp')";
        $conn->query($insertQuery);

        // Send reset password email with the token as part of the link
        $site = getSiteUrl();
        $resetLink = "$site/backend/reset_password.php?token=$token&email=$email";
        $subject = "FOODMANIA Password Reset";
        $message = "To reset your password, click the following link: $resetLink";

        // Get site owner's email
        $mailquery = "SELECT Email FROM contact WHERE Id = 1";
        $mail = $conn->query($mailquery);
        $headers = "From: $mail";

        // Use PHP's mail function to send the email
        if (mail($email, $subject, $message, $headers)) {
            // Redirect the user after initiating the reset process
            header("Location: ../login_register.php?success=EmailSent");
            exit();
        } else {
            // Handle email sending failure
            header("Location: ../login_register.php?error=EmailNotSent");
            exit();
        }
    } else {
        // Handle case where email does not exist in the database
        header("Location: ../login_register.php?error=UserNotFound");
        exit();
    }
}
?>
