  <!-- ======= Resume Section ======= -->
  <section id="portfolio" class="portfolio">
      <div class="container">
        <link href="../assets/css/portfolio.css" rel="stylesheet">
        

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Here is aportfolio of a few things that I have been able to accomplish</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Applications</li>
              <li data-filter=".filter-card">Art</li>
              <li data-filter=".filter-web">Websites</li>
            </ul>
          </div>

        <div class="portfolio-main">
          <div class="col-lg-6" data-aos="fade-up">
            <div class="portfolio-items">
            <?php
            include('assets/server/connection.php');
            $sql = "SELECT * FROM personal ORDER BY RAND() LIMIT 10";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>

              
              <div class="portfolio-title-image">
                <a href="more.php">
                  <h3><?php echo $row["title"]; ?></h3>
                  <img src="<?php echo 'portfolio/img/' . $row["homeImage"]; ?>" alt="" style="width: 500px; height: 500px;">
                </a>
              </div>
            
              <?php
                }
            } else{
              ?>
              <p>Nothing found</p>
                <?php
            }
            mysqli_close($con);
            ?>

            </div>           
          </div>
        </div>

      </div>
      <!-- </section>End Resume Section -->
