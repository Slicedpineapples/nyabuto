<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Review</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> -->
  <!-- <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>


  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="../assets/img/profile.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="../">Felix Nyabuto</a></h1>
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
          <h1>Review</h1>
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li>Review</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- <section class="inner-page"> -->
      <div class="container">
        <head>
<link rel="stylesheet" type="text/css" href="../assets/css/review-style.css">
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['login'])) {
    ?>
    <div class="container" name="reviews-container">
        <form action="../forms/send-review-auth.php" onsubmit="return validation()" method="post" enctype="multipart/form-data" name="form">
        <div class = "name">    
        <label for="name">Name:</label>
            <input type="text" name="name" required><br>
        </div>
        <div class ="role">
            <label for="role">Role:</label>
            <input type="text" name="role" required><br>
        </div>
        <div class ="review">
            <label for="review">Review:</label>
            <textarea name="review" rows="4" required></textarea><br>
        </div>
        <div class ="photo">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" accept="image/*"><br>
        </div>
        <div class ="submit ">
            <input type="submit" name="submit" value="Submit">
        </div>
        </form>

            <div class = "tips">
                <p>
                    Important tips!
                </p>
                    <ul>
                        <li>You can use your official name. Alternatively, your default username can be used by leaving the name field empty</li>
                        <li>The photo uploaded will be compressed. For best quality, use a close-up photo with minimal background </li>
                        <li>Finally, smile and be proud to celebrate the achievements we have made together</li>
                    </ul>
            </div>
            
    </div>
    <?php
    } else {
        header("Location: ../login/login.php");
        exit();
    }
    ?>
</body>


      </div>
    <!-- </section> -->

  </main><!-- End #main -->

<?php include '../parts/botttom.php'?>

</body>

</html>