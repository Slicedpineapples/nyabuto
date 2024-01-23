<?php
session_start();

// Check if admin session is started
if (!isset($_SESSION['admin'])) {
    // Redirect to login.php
    header("Location: ../error.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="../https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/admin.css" rel="stylesheet">
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
          <h1>Admin</h1>
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li>Admin</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    
    <?php
    session_start();

    // Check if admin session is started
    if (!isset($_SESSION['admin'])) {
            // Redirect to login.php
            header("Location: ../error.php");
            exit;
    }

    // Include database connection
    include_once "../config/db.php";

    // Fetch all portfolio items
    $query = "SELECT * FROM portfolio";
    $result = mysqli_query($conn, $query);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Head content here -->
    </head>

    <body>

        <!-- Header content here -->

        <main id="main">
            <!-- Breadcrumbs content here -->

            <section class="portfolio">
                <div class="container">
                    <div class="row">
                        <?php
                        // Display portfolio items
                        while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image = $row['image'];
                                $description = $row['description'];
                        ?>
                        <div class="col-lg-4 col-md-6 portfolio-item">
                            <div class="portfolio-wrap">
                                <img src="<?php echo $image; ?>" class="img-fluid" alt="<?php echo $title; ?>">
                                <div class="portfolio-info">
                                    <h4><?php echo $title; ?></h4>
                                    <div class="portfolio-links">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $id; ?>" title="More Details"><i class="bx bx-link"></i></a>
                                        <a href="#" title="Delete" onclick="deleteItem(<?php echo $id; ?>)"><i class="bx bx-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <!-- Portfolio Modals -->
            <?php
            // Display portfolio modals
            mysqli_data_seek($result, 0);
            while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image = $row['image'];
                    $description = $row['description'];
            ?>
            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="portfolioModal<?php echo $id; ?>Label" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <h2 class="text-uppercase"><?php echo $title; ?></h2>
                                        <img src="<?php echo $image; ?>" class="img-fluid" alt="<?php echo $title; ?>">
                                        <p><?php echo $description; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </main>

        <!-- Footer content here -->

        <script>
            function deleteItem(id) {
                if (confirm("Are you sure you want to delete this item?")) {
                    // Perform delete operation using AJAX or form submission
                    // Example: $.post("delete.php", { id: id }, function(result) { ... });
                }
            }
        </script>

    </body>

    </html>



  </main><!-- End #main -->


<?php include '../parts/botttom.php'?>

</body>

</html>