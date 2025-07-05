<?php
// Establish database connection
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $itemId = $_POST['itemId'];
    $tableName = $_POST['tableName'];
    $fieldName = $_POST['fieldName'];

    // Check if file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileType = $_FILES['image']['type'];

        // Directory path in the site's root directory
        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/img/upload/';

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $uploadPath = $uploadDirectory . $fileName;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            $pos = strpos($uploadPath, "/img/upload/");
            $shortPath = substr($uploadPath, $pos);

            // Check if the item ID and table name are provided and valid
            if (!empty($tableName) && !empty($itemId) && ($itemId != "new-gallery-item")) {

                if (!empty($fieldName)) {
                    // Update the specified table with the specified filed path
                    $updateQuery = "UPDATE $tableName SET $fieldName = '$shortPath' WHERE Id = $itemId";
                } else {
                    // Update the specified table with the image path
                    $updateQuery = "UPDATE $tableName SET Image = '$shortPath' WHERE Id = $itemId";
                }

                $conn->query($updateQuery);
            }
            echo $shortPath;
        }
    }
}

// Close database connection
$conn->close();
?>
