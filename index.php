<?php
    // Establish database connection
    include('backend/db_connection.php');

    // Include the header
    include('temps/header.php');

    // Include the navigation menu
    include('temps/navbar.php');

    // Include the hero video
    include('temps/hero.php');
    
    // Get the page name from the URL parameter
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Check if the requested page exists, if not, default to home page
    $allowed_pages = ['home', 'menu', 'chefs', 'specials', 'book', 'contact'];
    if (in_array($page, $allowed_pages)) {
        include("pages/$page.php");
    } else { // default page
        include('pages/home.php');
    }

    // Include the footer
    include('temps/footer.php');
?>