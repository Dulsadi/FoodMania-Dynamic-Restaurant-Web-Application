<?php
include('../db_connection.php');
include('../functions.php');

// Function to check if a user exists by email
function doesUserExist($email)
{
    global $conn;
    $email = $conn->real_escape_string($email);
    $query = "SELECT * FROM admin WHERE Email = '$email'";
    $result = $conn->query($query);
    return $result->num_rows > 0;
}

// Function to register a new user
function registerUser($name, $email, $password, $image)
{
    global $conn;
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Update image on Non-image uploads
    $image = checkDefaultImage($image);

    $query = "INSERT INTO admin (Name, Email, Password, Role, Image) VALUES ('$name', '$email', '$password', 'Developer', '$image')";
    return $conn->query($query);
}

// Function to authenticate user
function authenticateUser($email, $password)
{
    global $conn;
    $email = $conn->real_escape_string($email);
    $query = "SELECT * FROM admin WHERE Email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            return $user; // Return user data if authenticated
        }
    }
    return null;
}
?>
