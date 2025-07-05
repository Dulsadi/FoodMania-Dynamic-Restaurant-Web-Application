<?php
include('../backend/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initializing variables
    $message = '';
    $result = 0;

    // Validating and sanitizing the email
    $email = $_POST["email"];
    $email = mysqli_real_escape_string($conn, $email); // Preventing SQL injection
    $email = trim($email); // Removing leading/trailing whitespace

    // Requesting current url
    $currentURL = $_POST["current_url"];

    // Function to validate email
    function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
  
    if (validateEmail($email)) {
        // Prepareing SQL statement
        $sub_date = date("Y-m-d");
        $sub_time = date("H:i:s");
        
        $sql = "INSERT INTO subscribers (Email, Sub_Time, Sub_Date) VALUES ('$email', '$sub_time', '$sub_date')";
  
        if ($conn->query($sql) === TRUE) {
            $result = 1;
            $message = "We really appreciate your concern!";
        } else {
            $result = 2;
            $message = "Sorry the subcription is failed. Try again.";
        }
    } else {
        $result = 2;
        $message = "Please re-check the email you entered.";
    }
    // Set the variables to pass
    $url = $currentURL . "?message=" . urlencode($message) . "&result=" . urlencode($result) . "#footer";
    header("Location: $url");
    exit;
}

?>