<?php
/**
 * <footer> section
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

  // Retrieve the variables passed from the subscribe function
  $message = isset($_GET['message']) ? $_GET['message'] : '';
  $result = isset($_GET['result']) ? $_GET['result'] : 0 ;

?>

</body>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>FoodMania</h3>
              <p><?php echo nl2br((!empty($contactItems[0]['Address'])) ? $contactItems[0]['Address'] : "" ); ?><br><br>
                <strong>Phone: </strong><?php echo nl2br((!empty($contactItems[0]['Phone'])) ? $contactItems[0]['Phone'] : "" ); ?><br>
                <strong>Email: </strong><?php echo nl2br((!empty($contactItems[0]['Email'])) ? $contactItems[0]['Email'] : "" ); ?><br>
              </p>
              <div class="social-links mt-3">
                <a href="<?php echo (!empty($contactItems[0]['Twitter'])) ? $contactItems[0]['Twitter'] : "/contact#contact" ; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="<?php echo (!empty($contactItems[0]['Facebook'])) ? $contactItems[0]['Facebook'] : "/contact#contact" ; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?php echo (!empty($contactItems[0]['Instagram'])) ? $contactItems[0]['Instagram'] : "/contact#contact" ; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="<?php echo (!empty($contactItems[0]['Tiktok'])) ? $contactItems[0]['Tiktok'] : "/contact#contact" ; ?>" class="tiktok"><i class="bx bxl-tiktok"></i></a>
                <a href="<?php echo (!empty($contactItems[0]['LinkedIn'])) ? $contactItems[0]['LinkedIn'] : "/contact#contact" ; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $homeLink; ?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home#events">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact#contact">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact#contact">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="home#gallery">Decorations</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact#contact">Home delivary</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact#contact">Reservations</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact#contact">Pre Orders</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="home#gallery">Music team</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Stay connected with FoodMania.<br>
              Subscribe to our newsletter for a taste of something special !</p>
              <form action="functions/subscribe-function.php" method="post">
                  <input type="email" name="email" placeholder="<?php echo (($result > 0) ? $message : $message ); ?>">
                  <input type="submit" value="Subscribe">
                  <?php $currentURL = $_SERVER['REQUEST_URI']; ?>
                  <input type="text" name="current_url" value="<?php echo $currentURL; ?>" style="display:none;">
              </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FoodMania</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://www.nsbm.ac.lk/" target="_blank">NSBM Computing Students</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- jQuery Library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>

  <!-- From CDNs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

  <!-- Main JS File -->
  <script src="js/main.js"></script>

  <?php $conn->close(); ?>
