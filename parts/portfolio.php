  <section id="portfolio" class="portfolio section-bg">
    <div class="portfolio-container">
      <div class="section-title">
        <h2>Portfolio</h2>
        <p>Here is aportfolio of a few things that I have been able to accomplish</p>
      </div>
      
      <section id = "port-display">
        <?php
        include('assets/server/connection.php');
        $sql = "SELECT * FROM personal ORDER BY RAND() LIMIT 10";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="portfolio">
              <div class = "project-title">
              <h3><?php echo $row["title"]; ?></h3>
              </div>

              <div class="portfolio-img">
                <img src="<?php echo 'portfolio/img/' . $row["homeImage"]; ?>" alt="" style="width: 500px; height: 500px;">
              </div>
            </div>

          </div>
        <?php
          }
        } else {
        ?>
          <div class="swiper-slide">
            <div class="review">
              <p>No articles found</p>
            </div>
          </div>
        <?php
        }
        mysqli_close($con);
        ?>
      </div>
    </section>
  </div>
  </section>
