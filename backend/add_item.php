<?php
// Establish database connection
include('db_connection.php');
include('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tableName = $_POST['tableName'];

    if ( $tableName == "menu" ) {

        $name = $_POST['name'];
        $type = $_POST['type'];
        $ingredients = $_POST['ingredients'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        // Update image on Non-image uploads
        $image = checkDefaultImage($image);

        // Pass SQL errors on empty prices
        if ($price === '') {
            $price = 0;
        }

        // Insert the new item into the database
        $sql = "INSERT INTO menu (Name, Type, Ingredients, Price, Image) VALUES ('$name', '$type', '$ingredients', '$price', '$image')";

    } else if ($tableName == "chefs") {

        $name = $_POST['name'];
        $occupation = $_POST['occupation'];
        $image = $_POST['image'];
        $twitter = $_POST['twitter'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $linkedin = $_POST['linkedin'];

        // Update image on Non-image uploads
        $image = checkDefaultImage($image);

        // Insert the new chef into the database for the CHEFS section
        $sql = "INSERT INTO chefs (Name, Occupation, Image, Twitter, Facebook, Instagram, LinkedIn) VALUES ('$name', '$occupation', '$image', '$twitter', '$facebook', '$instagram', '$linkedin')";

    } else if ($tableName == "whyus") {

        $title = $_POST['title'];
        $description = str_replace("'", "''", $_POST['description']);

        // Insert the new item into the database for the Why Us section
        $sql = "INSERT INTO whyus (Title, Description) VALUES ('$title', '$description')";

    } else if ($tableName == "specials") {

        $name = $_POST['name'];
        $title = $_POST['title'];
        $hint = str_replace("'", "''", $_POST['hint']);
        $description = str_replace("'", "''", $_POST['description']);
        $image = $_POST['image'];

        // Update image on Non-image uploads
        $image = checkDefaultImage($image);

        // Insert the new item into the specials table in the database
        $sql = "INSERT INTO specials (Name, Title, Hint, Description, Image) VALUES ('$name', '$title', '$hint', '$description', '$image')";

    } else if ($tableName == "events") {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $topDesc = str_replace("'", "''", $_POST['topDesc']);
        $points = str_replace("'", "''", $_POST['points']);
        $bottomDesc = str_replace("'", "''", $_POST['bottomDesc']);
        $image = $_POST['image'];

        // Update image on Non-image uploads
        $image = checkDefaultImage($image);

        // Pass SQL errors on empty prices
        if ($price === '') {
            $price = 0;
        }

        // Insert the new item into the events database table
        $sql = "INSERT INTO events (Name, Price, Top_Desc, Points, Bottom_Desc, Image) VALUES ('$name', '$price', '$topDesc', '$points', '$bottomDesc', '$image')";

    } else if ($tableName == "testimonials") {

        $name = $_POST['name'];
        $occupation = $_POST['occupation'];
        $quote = str_replace("'", "''", $_POST['quote']);
        $image = $_POST['image'];

        // Update image on Non-image uploads
        $image = checkDefaultImage($image);

        // Insert the new testimonial into the database
        $sql = "INSERT INTO testimonials (Name, Occupation, Quote, Image) VALUES ('$name', '$occupation', '$quote', '$image')";
    } else if ($tableName == "gallery") {

        $image = $_POST['image'];

        if ($image != "") {

            // Update image on Non-image uploads
            $image = checkDefaultImage($image);

            // Insert the new gallery image into the database
            $sql = "INSERT INTO gallery (Image) VALUES ('$image')";

            $conn->query($sql);
            echo "New gallery item added successfully";
            exit();

        } else {

            echo "New gallery item is empty";
            exit();

        }
    }

    if ($conn->query($sql) === TRUE) {
        echo "New item added successfully";
    } else {
        echo "Error adding new item: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>