<?php
/**
 * <home> section
 */

// Define SQL queries
$sql1 = "SELECT * FROM home";
$sql2 = "SELECT * FROM whyus";
$sql3 = "SELECT * FROM events";
$sql4 = "SELECT * FROM testimonials";
$sql5 = "SELECT * FROM gallery";

// Execute SQL queries 
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);

// Fetch rows into associative arrays
$homeItems = $result1->fetch_all(MYSQLI_ASSOC);
$whyItems = $result2->fetch_all(MYSQLI_ASSOC);
$evtItems = $result3->fetch_all(MYSQLI_ASSOC);
$tesItems = $result4->fetch_all(MYSQLI_ASSOC);
$imgItems = $result5->fetch_all(MYSQLI_ASSOC);

?>

<main id="main">


<!-- ======= About Section ======= -->
<section id="about" class="about" style="background: url(<?php echo (!empty($homeItems[0]['About_Background'])) ? $homeItems[0]['About_Background'] : "" ; ?>) center center no-repeat;">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
        <div class="about-img">
          <img src="<?php echo (!empty($homeItems[0]['About_Image'])) ? $homeItems[0]['About_Image'] : "" ; ?>" alt="About Us">
        </div>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>Welcome to FoodMania</h3>
        <p class="fst-italic"><?php echo nl2br((!empty($homeItems[0]['About_Top_Desc'])) ? $homeItems[0]['About_Top_Desc'] : "" ); ?></p>
        <ul>
          <?php
          if (!empty($homeItems[0]['About_Points'])) {
              $points = $homeItems[0]['About_Points'];
              $sentences = preg_split('/(?<=[.!?])\s+/', $points, -1, PREG_SPLIT_NO_EMPTY); // Split text into sentences
              foreach ($sentences as $sentence) {
                  echo  '<li><i class="bi bi-check-circle"></i> '.$sentence.'</li>';
              }
          } ?>
        </ul>
        <p><?php echo nl2br((!empty($homeItems[0]['About_Bottom_Desc'])) ? $homeItems[0]['About_Bottom_Desc'] : "" ); ?></p>
      </div>
    </div>
  </div>
</section><!-- End About Section -->


<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Why Us</h2>
      <p>Why Choose Our Restaurant</p>
    </div>
    <div class="row">
      <?php
      if (!empty($whyItems)) {
          $count = 1;
          foreach ($whyItems as $Item) {
              echo '<div class="col-lg-4">';
              echo '  <div class="box" data-aos="zoom-in" data-aos-delay="'.$count.'00">';
              echo '    <span>0'.$count.'</span>';
              echo '    <h4>'.$Item['Title'].'</h4>';
              echo '    <p>'.$Item['Description'].'</p>';
              echo '  </div>';
              echo '</div>';
              $count++;
          }
      } ?>
    </div>
  </div>
</section><!-- End Why Us Section -->


<!-- ======= Events Section ======= -->
<section id="events" class="events" style="background: url(<?php echo (!empty($homeItems[0]['Events_Background'])) ? $homeItems[0]['Events_Background'] : "" ; ?>) center center no-repeat;">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Events</h2>
      <p>Host Your Special Occasions at Our Restaurant</p>
    </div>
    <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        <?php 
        if (!empty($evtItems)) {
            foreach ($evtItems as $Item) {
                // Display each EVENT item dynamically
                echo  '<div class="swiper-slide">';
                echo  '    <div class="row event-item">';
                echo  '      <div class="col-lg-6">';
                echo  '        <img src="'.$Item['Image'].'" class="img-fluid" alt="'.$Item['Name'].'">';
                echo  '      </div>';
                echo  '      <div class="col-lg-6 pt-4 pt-lg-0 content">';
                echo  '        <h3>'.$Item['Name'].'</h3>';
                echo  '        <div class="price">';
                echo  '          <p><span>$'.$Item['Price'].'</span></p>';
                echo  '        </div>';
                echo  '        <p class="fst-italic">'.$Item['Top_Desc'].'</p>';
                echo  '        <ul>';
                $points = $Item['Points'];
                $sentences = preg_split('/(?<=[.!?])\s+/', $points, -1, PREG_SPLIT_NO_EMPTY); // Split text into sentences
                foreach ($sentences as $sentence) {
                    echo  '          <li><i class="bi bi-check-circled"></i> '.$sentence.'</li>';
                }
                echo  '        </ul>';
                echo  '        <p>'.$Item['Bottom_Desc'].'</p>';
                echo  '      </div>';
                echo  '    </div>';
                echo  '  </div><!-- End event item -->';
            }
        } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section><!-- End Events Section -->


<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Testimonials</h2>
      <p>What they're saying about us</p>
    </div>
    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
          <?php 
          if (!empty($tesItems)) {
              foreach ($tesItems as $Item) {
                  // Display each TESTIMONIAL item dynamically
                  echo  '<div class="swiper-slide">';
                  echo  '  <div class="testimonial-item">';
                  echo  '    <p>';
                  echo  '      <i class="bx bxs-quote-alt-left quote-icon-left"></i>'.$Item['Quote'].'<i class="bx bxs-quote-alt-right quote-icon-right"></i>';
                  echo  '    </p>';
                  echo  '    <img src="'.$Item['Image'].'" class="testimonial-img" alt="'.$Item['Name'].'">';
                  echo  '    <h3>'.$Item['Name'].'</h3>';
                  echo  '    <h4>'.$Item['Occupation'].'</h4>';
                  echo  '  </div>';
                  echo  '</div><!-- End testimonial item -->';
              }
          } ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section><!-- End Testimonials Section -->


<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Gallery</h2>
      <p>Some photos from Our Restaurant</p>
    </div>
  </div>
  <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-0">
      <?php 
      if (!empty($imgItems)) {
          foreach ($imgItems as $Item) {
              // Display each GALLERY item dynamically
              echo  '<div class="col-lg-3 col-md-4">';
              echo  '  <div class="gallery-item">';
              echo  '   <a href="'.$Item['Image'].'" class="gallery-lightbox" data-gall="gallery-item">';
              echo  '      <img src="'.$Item['Image'].'" class="img-fluid">';
              echo  '   </a>';
              echo  '  </div>';
              echo  '</div><!-- End gallery item -->';
          }
      } ?>
    </div>
  </div>
</section><!-- End Gallery Section -->

</main><!-- End #main -->