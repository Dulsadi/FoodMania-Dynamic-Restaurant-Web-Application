<?php
session_start();
include('auth_functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = authenticateUser($email, $password);

    if ($user) {
        $_SESSION['user'] = $user; // Store user data in session
        header("Location: ../"); // Redirect to dashboard after successful login
        exit();
    } else {
        // Invalid credentials, handle accordingly
        header("Location: ../login_register.php?error=InvalidCredentials");
        exit();
    }
}
?>
