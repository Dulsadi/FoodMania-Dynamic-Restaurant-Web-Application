<?php
/**
 * <menu> section
 */
 
 // Fetch menu items from the database
 $sql = "SELECT * FROM menu";
 $result = $conn->query($sql);
 
 // Fetch all rows into an associative array
 $menuItems = $result->fetch_all(MYSQLI_ASSOC);

?>

<main id="main">

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php 
              if (!empty($menuItems)) {
                // Array to store unique types
                $uniqueTypes = array();
                foreach ($menuItems as $Item) {
                    $type = $Item['Type'];
                    // Check if the type is not already added to the uniqueTypes array
                    if (!in_array($type, $uniqueTypes)) {
                        $uniqueTypes[] = $type;
                        // Display each unique menu item type
                        echo '<li data-filter=".filter-'.$type.'">'.$type.'</li>';
                    }
                }
              } ?> 
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
          <?php 
          if (!empty($menuItems)) {
              foreach ($menuItems as $Item) {
                // Display each menu item dynamically
                echo '<div class="col-lg-6 menu-item filter-'.$Item['Type'].'">';
                echo '  <img src="'.$Item['Image'].'" class="menu-img" alt="">';
                echo '  <div class="menu-content">';
                echo '    <a href="#">'.$Item['Name'].'</a><span>$'.$Item['Price'].'</span>';
                echo '  </div>';
                echo '  <div class="menu-ingredients">'.$Item['Ingredients'].'</div>';
                echo '</div>';
              }
          } ?>
        </div>

      </div>
    </section><!-- End Menu Section -->

</main><!-- End #main -->