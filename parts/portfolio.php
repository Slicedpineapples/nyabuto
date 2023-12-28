   <!-- ======= Portfolio Section ======= -->
   <section id="portfolio" class="portfolio section-bg">
      <div class="portfolio-container">
        
        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Here is aportfolio of a few things that I have been able to accomplish</p>        
        </div>
<!--         
        <div class="mini-sort" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Applications</li>
              <li data-filter=".filter-card">Art</li>
              <li data-filter=".filter-web">Websites</li>
            </ul>
          </div>
        </div> -->
        <section>
  <link href="assets/css/portfolio.css" rel="stylesheet">
        <?php
            include('assets/server/connection.php');
            $sql = "SELECT homeImage, link, title FROM personal ORDER BY RAND() LIMIT 5";

            // Execute the query
            $result = mysqli_query($con, $sql);

            // Check if the query returned any results
            if (mysqli_num_rows($result) > 0) {
              // Output data of each row
              while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <div class="portfolio">
                        <div class="portfolio-img">
                            <img src="<?php echo 'portfolio/img/' . $row["homeImage"]; ?>" alt="" style="width: 500px; height: 500px;">
                        </div>
                        <h3><?php echo $row["title"]; ?></h3>
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
   </section>

      </div>
    </section><!-- End Portfolio Section -->