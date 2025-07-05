<?php
/**
 * <hero> section
 */

  // Fetch home items from the database
  $sql = "SELECT * FROM home";
  $result = $conn->query($sql);

  // Fetch all rows into an associative array
  $homeItems = $result->fetch_all(MYSQLI_ASSOC);
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background: url(<?php echo (!empty($homeItems[0]['Hero_Background'])) ? $homeItems[0]['Hero_Background'] : "" ; ?>) top center;">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>FoodMania</span></h1>
          <h2><?php echo (!empty($homeItems[0]['Hero_Desc'])) ? $homeItems[0]['Hero_Desc'] : "" ; ?></h2>

          <div class="btns">
            <a href="menu#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="book#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="<?php echo (!empty($homeItems[0]['Hero_Video'])) ? $homeItems[0]['Hero_Video'] : "" ; ?>" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->