<?php
// Establish database connection
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = $_POST['item_id'];
    $table = $_POST['table_name'];

    // Delete the item from the database
    $sql = "DELETE FROM $table WHERE Id='$itemId'";

    if ($conn->query($sql) === TRUE) {
        echo "Item deleted successfully";
    } else {
        echo "Error deleting item: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>