<?php
include('../backend/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Initializing variables
  $message = '';
  $validity = true;
  $result = 0;

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
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

  // Validate $subject (Avoiding Unrelated Contents)
  if (stripos($subject, 'spam') !== false || stripos($subject, 'unrelated') !== false) {
      $message .= "Please avoid unrelated content in your subject.<br>";
      $subject = "";
  } else {
      $subject = $subject;
  }

  // Validate $content (Avoiding Unrelated Contents)
  if (stripos($content, 'spam') !== false || stripos($content, 'unrelated') !== false) {
      $message .= "Please avoid unrelated content in your message.<br>";
      $content = "";
  } else {
      $content = $content;
  }

  // Validation to prevent SQL injection
  $name = mysqli_real_escape_string($conn, $name);
  $email = mysqli_real_escape_string($conn, $email);
  $subject = mysqli_real_escape_string($conn, $subject);
  $content = mysqli_real_escape_string($conn, $content);

  $inputs = [$name, $email, $subject, $content];

  foreach ($inputs as $input) {
      if (empty($input)) {
          $validity = false;
          break;
      }
  }

  if ($validity) {
      // Insert into emails table
      $query = "INSERT INTO emails (Sender, Name, Subject, Message) VALUES ('$email', '$name', '$subject', '$content')";
      $output = mysqli_query($conn, $query);

      // Get site owner's email from contact table
      $ownerEmailQuery = "SELECT Email FROM contact LIMIT 1";
      $ownerEmailResult = mysqli_query($conn, $ownerEmailQuery);

      // if ($ownerEmailResult && mysqli_num_rows($ownerEmailResult) > 0) {
      //     $row = mysqli_fetch_assoc($ownerEmailResult);
      //     $ownerEmail = $row['Email'];
      //     // Compose email message
      //     $emailSubject = "New Message: $subject";
      //     $emailContent = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $content";
      //     $emailHeaders = "From: $email";
      //     // Send email to site owner
      //     mail($ownerEmail, $emailSubject, $emailContent, $emailHeaders);
      // }

      $result = 1;
      $message = "Your message has been sent. Thank you!<br>";
  } else {
      $result = 2;
      $errorCount = substr_count($message, '<br>');
      if (!empty($message) && $errorCount > 1) {
          $message = "There are some empty fields. Please check and try again.<br>";
      }
  }
    // Set the variables to pass
    $url = "/contact?message=" . urlencode($message) . "&result=" . urlencode($result) . "#contact-form";
    header("Location: $url");
    exit;
}
?>
