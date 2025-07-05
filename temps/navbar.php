<?php
/**
 * <head> section
 */

// Get the page name from the URL parameter
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page == 'home') {
  $homeLink = 'home#hero';
} else {
  $homeLink = 'home';
}

// Fetch contact items from the database
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

// Fetch all rows into an associative array
$contactItems = $result->fetch_all(MYSQLI_ASSOC);
 
?>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span><?php echo nl2br((!empty($contactItems[0]['Phone'])) ? $contactItems[0]['Phone'] : "" ); ?></span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span><?php echo nl2br((!empty($contactItems[0]['Open_Hours'])) ? $contactItems[0]['Open_Hours'] : "" ); ?></span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>Fodm</li>
          <li><a href="https://www.nsbm.ac.lk/" target="_blank">Nsbm</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <a href="home" class="logo me-auto me-lg-0"><img src="img/icons/logo.png" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto me-lg-0"><a href="home">FoodMania</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="<?php echo $homeLink; ?>">Home</a></li>
          <li><a class="nav-link scrollto" href="home#about">About</a></li>
          <li><a class="nav-link scrollto" href="menu#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="specials#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="home#events">Events</a></li>
          <li><a class="nav-link scrollto" href="chefs#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="home#gallery">Gallery</a></li>
          <li class="dropdown"><a href="#"><span>Explore</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="home#gallery">Decorations</a></li>
              <li class="dropdown"><a href="#"><span>Music Team</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="home#gallery">Sound Engineer</a></li>
                  <li><a href="home#gallery">Pianist</a></li>
                  <li><a href="home#gallery">Guitarist</a></li>
                  <li><a href="home#gallery">Drummer</a></li>
                  <li><a href="home#gallery">Violinaire</a></li>
                </ul>
              </li>
              <li><a href="contact#contact">Home Delivery</a></li>
              <li><a href="contact#contact">Reservations</a></li>
              <li><a href="contact#contact">Pre Orders</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="contact#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="book#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header><!-- End Header -->

  <body>