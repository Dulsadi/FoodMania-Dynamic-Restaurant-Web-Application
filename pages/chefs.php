<?php
/**
 * <chefs> section
 */

 // Fetch menu items from the database
 $sql = "SELECT * FROM chefs";
 $result = $conn->query($sql);
 
 // Fetch all rows into an associative array
 $chefItems = $result->fetch_all(MYSQLI_ASSOC);

?>

<main id="main">

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">
          <?php 
          if (!empty($chefItems)) {
              foreach ($chefItems as $Item) {
                  // Display each TESTIMONIAL item dynamically
                  echo  '<div class="col-lg-4 col-md-6">';
                  echo  '  <div class="member" data-aos="zoom-in" data-aos-delay="100">';
                  echo  '    <img src="'.$Item['Image'].'" class="img-fluid">';
                  echo  '    <div class="member-info">';
                  echo  '      <div class="member-info-content">';
                  echo  '        <h4>'.$Item['Name'].'</h4>';
                  echo  '        <span>'.$Item['Occupation'].'</span>';
                  echo  '      </div>';
                  echo  '      <div class="social">';
                  echo  '        <a href="'.$Item['Twitter'].'"><i class="bi bi-twitter"></i></a>';
                  echo  '        <a href="'.$Item['Facebook'].'"><i class="bi bi-facebook"></i></a>';
                  echo  '        <a href="'.$Item['Instagram'].'"><i class="bi bi-instagram"></i></a>';
                  echo  '        <a href="'.$Item['LinkedIn'].'"><i class="bi bi-linkedin"></i></a>';
                  echo  '      </div>';
                  echo  '    </div>';
                  echo  '  </div>';
                  echo  '</div>';
              }
          } ?>
        </div>

      </div>
    </section><!-- End Chefs Section -->

</main><!-- End #main -->