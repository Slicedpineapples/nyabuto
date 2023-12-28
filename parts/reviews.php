   <!-- ======= reviews Section ======= -->
   <section id="reviews" class="reviews section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Reviews</h2>
          <p>


          </p>
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php
            include('assets/server/connection.php');
            $sql = "SELECT name, role, review, photo FROM reviews ORDER BY RAND() LIMIT 50";

            // Execute the query
            $result = mysqli_query($con, $sql);

            // Check if the query returned any results
            if (mysqli_num_rows($result) > 0) {
              // Output data of each row
              while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <div class="swiper-slide reviews-item">
                      <div class="review">
                          <div class="reviews-img">
                              <img src="<?php echo 'reviews/img/' . $row["photo"]; ?>" 
                              alt="reviewer Photo" style="max-width: 100px; border-radius: 50%;">
                          </div>
                          <h3><?php echo $row["name"]; ?></h3>
                          <h4><?php echo $row["role"]; ?></h4>
                          
                          <div class="quote-icon-left">&#8220;</div>
                          <p><?php echo $row["review"]; ?></p>
                          <div class="quote-icon-right">&#8221;</div>
                      </div>
                  </div>
                  <?php
              }
              
            
            } else {
              // Handle the case when no articles are found
              ?>
              <div class="swiper-slide">
                <div class="review">
                  <p>No articles found</p>
                </div>
              </div>
            <?php
            }

            // Close the database connection
            mysqli_close($con);
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End reviews Section -->
    <?php
    // Add the missing import statement for the Swiper class
    ?>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
          var swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
              delay: 3600,
            },
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });
        </script>
