<?php
include 'assets/server/connection.php';

// Check if the user is logged in
session_start();
if ($_SESSION['login']) {
  // Redirect to home#portfolio


// Assuming you have a database connection established
if (isset($_COOKIE['more'])) {
  $sql = "SELECT * FROM personal WHERE id = " . $_COOKIE['more'];
  $result = mysqli_query($con, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $portfolio = mysqli_fetch_assoc($result);
    $category = $portfolio['category'];
    $client = $portfolio['client'];
    $projectDate = $portfolio['dates'];
    $projectURL = $portfolio['link'];
    $description = $portfolio['summary'];
    $title = $portfolio['title'];
    $homeImage = $portfolio['homeImage'];
    $image3 = $portfolio['image3'];
    $image4 = $portfolio['image4'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>More</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>


  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="assets/img/profile.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="/nyabuto">Felix Nyabuto</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="github"><i class="bx bxl-github"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
    </div>
  </header>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h1><?php echo $title; ?></h1>
          <ol>
            <li><a href="index.php#portfolio">Back</a></li>
            <li>Portfolio Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="<?php echo 'portfolio/img/' . $homeImage; ?>" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="<?php echo 'portfolio/img/' . $image3; ?>" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="<?php echo 'portfolio/img/' . $image4; ?>" alt="">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $category; ?></li>
                <li><strong>Client</strong>: <?php echo $client; ?></li>
                <li><strong>Project date</strong>: <?php echo $projectDate; ?></li>
                <li><strong>Project URL</strong>: <a href="<?php echo $projectURL; ?>" target="_blank"><?php echo $projectURL; ?></a></li>
                <li><strong>Summary</strong>: <?php echo $description; ?></li>
                <!-- <li>Article ID: <?php echo $portfolioId; ?></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
}else{
    header("Location: error.php");
  echo "<p>To see more details, you need to be logged in</p>";
  sleep(.5);
    // header("Location: index.php#portfolio");
  exit;
}
    include 'parts/botttom.php';
    ?>
  </main><!-- End #main -->
  <script src="assets/js/main.js"></script>

</body>

</html>