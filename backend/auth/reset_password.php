<?php

// Check if token or identifier is provided in URL (sent via email)
if(isset($_GET['token']) && isset($_GET['email'])) {
    $token = $_GET['token']; // Get token from URL
    $email = $_GET['email']; // Get email from URL

    // Display form to reset password
    echo '
        <form action="reset_password_process.php" method="POST">
            <input type="hidden" name="email" value="' . $email . '">
            <input type="hidden" name="token" value="' . $token . '">
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" name="reset" value="Reset Password">
        </form>
    ';
} else {
    // Token or identifier not provided, handle accordingly
    echo "Invalid or expired reset link. Please try again with a new link.";
}
?>
