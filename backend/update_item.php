<?php
// Establish database connection
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tableName = $_POST['tableName'];

    if ($tableName == "menu") {
        $itemId = $_POST['item_id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $ingredients = $_POST['ingredients'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        // Update the item in the menu section
        $sql = "UPDATE menu SET Name='$name', Type='$type', Ingredients='$ingredients', Price='$price', Image='$image' WHERE Id='$itemId'";
    } elseif ($tableName == "chefs") {
        $itemId = $_POST['item_id'];
        $name = $_POST['name'];
        $occupation = $_POST['occupation'];
        $image = $_POST['image'];
        $twitter = $_POST['twitter'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $linkedin = $_POST['linkedin'];
    
        // Update the item in the chefs section
        $sql = "UPDATE chefs SET Name='$name', Occupation='$occupation', Image='$image', Twitter='$twitter', Facebook='$facebook', Instagram='$instagram', LinkedIn='$linkedin' WHERE Id='$itemId'";
    } elseif ($tableName == "whyus") {
        $itemId = $_POST['item_id'];
        $title = $_POST['title'];
        $description = str_replace("'", "''", $_POST['description']);
    
        // Update the item in the whyus section
        $sql = "UPDATE whyus SET Title='$title', Description='$description' WHERE Id='$itemId'";
    } elseif ($tableName == "specials") {
        $itemId = $_POST['item_id'];
        $name = $_POST['name'];
        $title = $_POST['title'];
        $hint = str_replace("'", "''", $_POST['hint']);
        $description = str_replace("'", "''", $_POST['description']);
        $image = $_POST['image'];
    
        // Update the item in the specials section
        $sql = "UPDATE specials SET Name='$name', Title='$title', Hint='$hint', Description='$description', Image='$image' WHERE Id='$itemId'";
    } elseif ($tableName == "events") {
        $itemId = $_POST['item_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $topDesc = str_replace("'", "''", $_POST['topDesc']);
        $points = str_replace("'", "''", $_POST['points']);
        $bottomDesc = str_replace("'", "''", $_POST['bottomDesc']);
        $image = $_POST['image'];
    
        // Update the item in the events section
        $sql = "UPDATE events SET Name='$name', Price='$price', Top_Desc='$topDesc', Points='$points', Bottom_Desc='$bottomDesc', Image='$image' WHERE Id='$itemId'";
    } elseif ($tableName == "testimonials") {
        $itemId = $_POST['item_id'];
        $name = $_POST['name'];
        $occupation = $_POST['occupation'];
        $quote = str_replace("'", "''", $_POST['quote']);
        $image = $_POST['image'];
    
        // Update the item in the testimonials section
        $sql = "UPDATE testimonials SET Name='$name', Occupation='$occupation', Quote='$quote', Image='$image' WHERE Id='$itemId'";
    } elseif ($tableName == "gallery") {
        $itemId = $_POST['item_id'];
        $image = $_POST['image'];
    
        // Update the item in the gallery section
        $sql = "UPDATE gallery SET Image='$image' WHERE Id='$itemId'";
    } elseif ($tableName == "home") {
        $itemId = $_POST['item_id'];
        $heroVideo = $_POST['heroVideo'];
        $heroDesc = str_replace("'", "''", $_POST['heroDesc']);
        $aboutTopDesc = str_replace("'", "''", $_POST['aboutTopDesc']);
        $aboutPoints = str_replace("'", "''", $_POST['aboutPoints']);
        $aboutBottomDesc = str_replace("'", "''", $_POST['aboutBottomDesc']);
    
        // Update the item in the testimonials section
        $sql = "UPDATE home SET Hero_Video='$heroVideo', Hero_Desc='$heroDesc', About_Top_Desc='$aboutTopDesc', About_Points='$aboutPoints', About_Bottom_Desc='$aboutBottomDesc' WHERE Id='$itemId'";
    } elseif ($tableName == "contact") {
        $itemId = $_POST['item_id'];

        $contactAddress = str_replace("'", "''", $_POST['contactAddress']);
        $contactEmail = $_POST['contactEmail'];
        $contactPhone = $_POST['contactPhone'];
        $contactMapLocation = $_POST['contactMapLocation'];
        $contactOpenHours = $_POST['contactOpenHours'];

        $contactTwitter = $_POST['contactTwitter'];
        $contactFacebook = $_POST['contactFacebook'];
        $contactInstagram = $_POST['contactInstagram'];
        $contactTiktok = $_POST['contactTiktok'];
        $contactLinkedIn = $_POST['contactLinkedIn'];
        
        // Update the item in the testimonials section
        $sql = "UPDATE contact SET Address='$contactAddress', Email='$contactEmail', Phone='$contactPhone', Open_Hours='$contactOpenHours', Map_Location='$contactMapLocation', Twitter='$contactTwitter', Facebook='$contactFacebook', Instagram='$contactInstagram', Tiktok='$contactTiktok', LinkedIn='$contactLinkedIn' WHERE Id='$itemId'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully";
    } else {
        echo "Error updating item: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

