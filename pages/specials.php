<?php
/**
 * <specials> section
 */
 
 // Fetch special items from the database
 $sql = "SELECT * FROM specials";
 $result = $conn->query($sql);
 
 // Fetch all rows into an associative array
 $spItems = $result->fetch_all(MYSQLI_ASSOC);

?>

<main id="main">

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">

              <?php 
              if (!empty($spItems)) {
                  $count = 1;
                  foreach ($spItems as $Item) {
                      // Display each special item dynamically
                      echo '<li class="nav-item">';
                      echo '      <a class="nav-link'. (($count==1)?' active show':"") .'" data-bs-toggle="tab" href="#tab-'.$count.'">'.$Item['Name'].'</a>';
                      echo '</li>';
                      $count ++;
                  }
              } ?>

            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">

              <?php 
              if (!empty($spItems)) {
                  $count = 1;
                  foreach ($spItems as $Item) {
                      // Display each special item dynamically
                      echo '<div class="tab-pane'. (($count==1)?' active show':"") .'" id="tab-'.$count.'">';
                      echo '  <div class="row">';
                      echo '    <div class="col-lg-8 details order-2 order-lg-1">';
                      echo '      <h3>'.$Item['Title'].'</h3>';
                      echo '      <p class="fst-italic">'.$Item['Hint'].'</p>';
                      echo '      <p>'.$Item['Description'].'</p>';
                      echo '    </div>';
                      echo '    <div class="col-lg-4 text-center order-1 order-lg-2">';
                      echo '      <img src="'.$Item['Image'].'" alt="" class="img-fluid">';
                      echo '    </div>';
                      echo '  </div>';
                      echo '</div>';
                      $count ++;
                  }
              } ?>
              
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->

</main><!-- End #main -->