<?php
/**
 * <contact> section
 */

  // Fetch contact items from the database
  $sql = "SELECT * FROM contact";
  $results = $conn->query($sql);

  // Fetch all rows into an associative array
  $conItems = $results->fetch_all(MYSQLI_ASSOC);

  // Retrieve the variables passed from the contact function
  $message = isset($_GET['message']) ? $_GET['message'] : '';
  $result = isset($_GET['result']) ? $_GET['result'] : 0 ;

?>


<main id="main">
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="<?php echo (!empty($conItems[0]['Map_Location'])) ? $conItems[0]['Map_Location'] : "" ; ?>" frameborder="0" allowfullscreen></iframe>
      </div>
    </section>

    <!-- ======= Contact Form Section ======= -->
    <section id="contact-form" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php echo nl2br((!empty($conItems[0]['Address'])) ? $conItems[0]['Address'] : "" ); ?></p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p><?php echo nl2br((!empty($conItems[0]['Open_Hours'])) ? $conItems[0]['Open_Hours'] : "" ); ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo nl2br((!empty($conItems[0]['Email'])) ? $conItems[0]['Email'] : "" ); ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php echo nl2br((!empty($conItems[0]['Phone'])) ? $conItems[0]['Phone'] : "" ); ?></p>
              </div>
            </div>
          </div>


          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="functions/contact-function.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
                <?php if ($result) { ?>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="sent-message" style="<?php echo (($result == 1) ? "display: block;" : "" ); ?>"><?php echo $message; ?></div>
                  <div class="error-message" style="<?php echo (($result == 2) ? "display: block;" : "" ); ?>"><?php echo $message; ?></div>
                </div>
              <?php } ?>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        
        </div>
      </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->