  <!-- ======= Resume Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <link href="../assets/css/style.css" rel="stylesheet">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Here is a portfolio of a few things that I have been able to accomplish</p>
        </div>

        <div class="portfolio-main">
          <div class="col-lg-12" data-aos="fade-up">
            <div class="portfolio-items row">
              <?php
              include('assets/server/connection.php');
              $sql = "SELECT * FROM personal ORDER BY RAND() LIMIT 10";
              $result = mysqli_query($con, $sql);
              if (mysqli_num_rows($result) > 0) {
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($count % 3 == 0) {
                    echo '<div class="row">';
                  }
                  ?>
                  <div class="col-lg-4 col-md-6 portfolio-item <?php echo "filter-" . $row["category"] ?>">
                    <div class="portfolio-wrap">
                      <img src="<?php echo 'portfolio/img/' . $row["homeImage"]; ?>" alt=""
                         style="width: 400px; height: 400px;">
                      <div class="portfolio-links">
                      <a href="<?php echo 'portfolio/img/' . $row["homeImage"]; ?>"
                           data-gallery="portfolioGallery" class="portfolio-lightbox"
                           title="<?php echo "<p>".$row["title"]."</p>". "<i>".$row["summary"]."</i>"?>"><i class="bx bx-plus"></i></a>

                        <a href="more.php?id=<?php echo $row['id']; ?>" title="More Details" onclick="document.cookie = 'more=' + <?php echo $row['id']; ?>;"><i
                          class="bx bx-link"></i></a>
                      </div>
                    </div>
                  </div>
                  <?php
                  $count++;
                  if ($count % 3 == 0) {
                    echo '</div>';
                  }
                }
                if ($count % 3 != 0) {
                  echo '</div>';
                }
              } else {
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

      <script src="../assets/js/main.js"></script>
