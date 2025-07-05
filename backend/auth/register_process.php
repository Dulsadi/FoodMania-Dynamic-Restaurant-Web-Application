<?php
session_start();
include('auth_functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_POST['image'];

    if (doesUserExist($email)) {
        // User already exists, handle accordingly (e.g., display error message)
        header("Location: ../login_register.php?error=UserExists");
        exit();
    } else {
        if (registerUser($name, $email, $password, $image)) {
            $user = authenticateUser($email, $password);
            $_SESSION['user'] = $user; // Store user data in session
            // Registration successful, redirect to login or dashboard
            header("Location: ../");
            exit();
        } else {
            // Registration failed, handle accordingly (e.g., display error message)
            header("Location: ../login_register.php?error=RegistrationFailed");
            exit();
        }
    }
}
?>
