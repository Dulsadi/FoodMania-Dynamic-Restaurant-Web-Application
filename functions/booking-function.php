<?php
include('../backend/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initializing variables
    $message = '';
    $validity = true;
    $result = 0;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $content = $_POST['message'];

    // Validate $name (English Words)
    if (!preg_match('/^[A-Za-z ]+$/', $name)) {
        $message .= "Please enter a valid name with only English letters and spaces.<br>";
        $name = "";
    } else {
        $name = $name;
    }

    // Validate $email (Email Structure)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message .= "Please enter a valid email address.<br>";
        $email = "";
    } else {
        $email = $email;
    }

    // Validate $phone (Numbers Only)
    if (!preg_match('/^[0-9]+$/', $phone)) {
        $message .= "Please enter a valid phone number containing only numbers.<br>";
        $phone = "";
    } else {
        $phone = $phone;
    }

    // Validate $date (Date Structure)
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        $message .= "Please enter a valid date in YYYY-MM-DD format.<br>";
        $date = "";
    } else {
        $date = $date;
    }

    // Validate $time (Time Structure)
    if (!preg_match('/^([01][0-9]|2[0-3]):[0-5][0-9]$/', $time)) {
        $message .= "Please enter a valid time in HH:MM format.<br>";
        $time = "";
    } else {
        $time = $time;
    }

    // Validate $people (Numbers Only)
    if (!preg_match('/^[0-9]+$/', $people)) {
        $message .= "Please enter a valid number for the count of people.<br>";
        $people = "";
    } else {
        $people = $people;
    }

    // Validate $message (Avoiding Unrelated Contents)
    if (stripos($content, 'spam') !== false || stripos($content, 'unrelated') !== false) {
        $message .= "Please avoid unrelated content in your message.<br>";
        $content = "";
    } else {
        $content = $content;
    }

    // Validation to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $people = mysqli_real_escape_string($conn, $people);
    $content = mysqli_real_escape_string($conn, $content);

    $inputs = [$name, $email, $phone, $date, $time, $people, $content];

    foreach ($inputs as $input) {
      if (empty($input)) {
          $validity = false;
          break;
      }
    }

    if ($validity) {
        // Insert into bookings table
        $query = "INSERT INTO bookings (Name, Email, Phone, Date, Time, People, Message) VALUES ('$name', '$email', '$phone', '$date', '$time', '$people', '$content')";
        $output = mysqli_query($conn, $query);

        // Get site owner's email from contact table
        $ownerEmailQuery = "SELECT Email FROM contact LIMIT 1";
        $ownerEmailResult = mysqli_query($conn, $ownerEmailQuery);

        //  if ($ownerEmailResult && mysqli_num_rows($ownerEmailResult) > 0) {
        //      $row = mysqli_fetch_assoc($ownerEmailResult);
        //      $ownerEmail = $row['Email'];
        //      // Compose email mail
        //      $subject = "New Booking Request";
        //      $contentMessage = "Name: $name\nEmail: $email\nPhone: $phone\nDate: $date\nTime: $time\nPeople: $people\nMessage: $content";
        //      $headers = "From: $email";
        //      // Send email to site owner
        //      mail($ownerEmail, $subject, $contentMessage, $headers);
        //  }

        $result = 1;
        $message = "Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!<br>";
    } else {
        $result = 2;
        $errorCount = substr_count($message, '<br>');
        if (!empty($message) && $errorCount > 1) {
            $message = "There are some empty fields. Please check and try again.<br>";
        }
    }
    // Set the variables to pass
    $url = "/book?message=" . urlencode($message) . "&result=" . urlencode($result) . "#book-a-table";
    header("Location: $url");
    exit;

}
?>
