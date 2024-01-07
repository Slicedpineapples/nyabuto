<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'parts/meta-top.php'?>
</head>
<body>
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>


<?php include 'parts/top.php'; ?>
<?php include 'parts/about.php'; ?>
<?php include 'parts/skills.php'; ?>

<?php
if (isset($_SESSION['login'])) {
    include 'parts/resume.php';
}else{
    include 'parts/resume2.php';
}
?>
<?php
if (isset($_SESSION['login'])) {
    include 'parts/education.php';
}else{
    include 'parts/education2.php';
}
?>

<?php include 'parts/portfolio.php'; ?>
<?php include 'parts/reviews.php'; ?>
<?php include 'parts/contact.php'; ?>
<?php include 'parts/portfolio-repair.php';?>
<?php include 'parts/botttom.php'; ?>

</body>
</html>