<?php
include '../assets/server/connection.php';
session_start();
if ($_SESSION['login']) {
    $email_name = $_SESSION['login'];
    $name_query = "SELECT name, email FROM users WHERE (name = '$email_name') OR (email = '$email_name');";
 
    $email_result = mysqli_query($con, $name_query);
    $email_row = mysqli_fetch_assoc($email_result);
    $email = $email_row['email'];
}

$name = mysqli_real_escape_string($con, stripslashes($_POST['name']));
$role = mysqli_real_escape_string($con, stripslashes($_POST['role']));
$review = mysqli_real_escape_string($con, stripslashes($_POST['review']));

$photo = $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];

$name = mysqli_real_escape_string($con, $name);
$role = mysqli_real_escape_string($con, $role);
$review = mysqli_real_escape_string($con, $review);
$time = date("Y-m-d H:i:s");

// Generate a random, unique filename for the photo
$filename = uniqid() . '_' . $photo;

// Move uploaded photo to "reviews/img" directory
$target_dir = "../reviews/img/";
$target_file = $target_dir . $filename;

// Resize the photo to 400x400

$resize_width = 400;
$resize_height = 420;
$resize_image = imagecreatetruecolor($resize_width, $resize_height);
$source_image = imagecreatefromjpeg($photo_tmp);

imagecopyresized($resize_image, $source_image, 0, 0, 0, 0, $resize_width, $resize_height, imagesx($source_image), imagesy($source_image));
imagejpeg($resize_image, $photo_tmp);
imagedestroy($resize_image);
imagedestroy($source_image);

// Check if the file was successfully uploaded
if (move_uploaded_file($photo_tmp, $target_file)) {
    $sql = "INSERT INTO reviews (name, email, role, review, photo, time)
    VALUES ('$name', '$email', '$role', '$review', '$filename', '$time')";

    if (mysqli_query($con, $sql)) {
        echo "Your review has been submitted successfully.";
        header("refresh:2; url=../reviews/review.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Error uploading the photo. Check your file permissions.";
}

mysqli_close($con);
?>
