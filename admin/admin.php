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
    
    <div class="container">
        <div class="addtoportfolio">
            <button onclick="togglePortfolio()">+Portfolio</button>
        </div>
        <div id="portfolioLink" style="display: none;">
            <?php include '../portfolio/portfolio.php'; ?>
        </div>
        <script>
            function togglePortfolio() {
                var portfolioLink = document.getElementById("portfolioLink");
                if (portfolioLink.style.display === "none") {
                    portfolioLink.style.display = "block";
                } else {
                    portfolioLink.style.display = "none";
                }
            }
        </script>
    </div>
    <div section="allreviews">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="allreviews">
                    <button onclick="toggleReviews()">All Reviews</button>
                    </div>
                    <table id="reviewsTable" class="table table-striped" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">Review ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Review</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('../assets/server/connection.php');
                                $sql = "SELECT * FROM reviews;";
                                $result = mysqli_query($con, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>" . $row["articleId"] . "</td><td>" . $row["name"] . "</td><td>" . $row["review"] . "</td><td>" . $row["time"] . "</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "0 results";
                                }
                                mysqli_close($con);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 

    <script>
        function toggleUsers() {
            var table = document.getElementById("usersTable");
            if (table.style.display === "none") {
                table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        }
    </script>

    <div section="allusers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="allusers">
                    <button onclick="toggleUsers()">All Users</button>
                    </div>
                    <table id="usersTable" class="table table-striped" style="display: none;">
                        <thead>
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('../assets/server/connection.php');
                                $sql = "SELECT * FROM users;";
                                $result = mysqli_query($con, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["time"] . "</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "0 results";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleReviews() {
            var table = document.getElementById("reviewsTable");
            if (table.style.display === "none") {
                table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        }
    </script>
<!-- Existing code -->

</main><!-- End #main -->

<?php include '../parts/botttom.php'?>

</body>

</html>


  </main><!-- End #main -->


<?php include '../parts/botttom.php'?>

</body>

</html>