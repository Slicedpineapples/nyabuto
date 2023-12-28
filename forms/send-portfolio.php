<?php
include '../assets/server/connection.php';

// Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    // Sanitize and escape form inputs
    $title = mysqli_real_escape_string($con, stripslashes($_POST['title']));
    $category = mysqli_real_escape_string($con, stripslashes($_POST['category']));
    $client = mysqli_real_escape_string($con, stripslashes($_POST['client']));
    $dates = mysqli_real_escape_string($con, stripslashes($_POST['dates']));
    $link = mysqli_real_escape_string($con, stripslashes($_POST['link']));
    $summary = mysqli_real_escape_string($con, stripslashes($_POST['summary']));

    // Get the file details from the form
    $homeImage = $_FILES['homeImage']['name'];
    $homeImage_tmp = $_FILES['homeImage']['tmp_name'];

    $image3 = $_FILES['image3']['name'];
    $image3_tmp = $_FILES['image3']['tmp_name'];

    $image4 = $_FILES['image4']['name'];
    $image4_tmp = $_FILES['image4']['tmp_name'];

    // Sanitize and escape additional inputs
    $title = mysqli_real_escape_string($con, $title);
    $category = mysqli_real_escape_string($con, $category);
    $client = mysqli_real_escape_string($con, $client);
    $dates = mysqli_real_escape_string($con, $dates);
    $link = mysqli_real_escape_string($con, $link);
    $summary = mysqli_real_escape_string($con, $summary);

    // Generate random, unique filenames for the images
    $homeImageFilename = "home".uniqid() . '_' . $homeImage;
    $image3Filename = uniqid() . '_' . $image3;
    $image4Filename = uniqid() . '_' . $image4;

    // Move uploaded images to "portfolio/img" directory
    $target_dir = "../portfolio/img/";
    $homeImageFile = $target_dir . $homeImageFilename;
    $image3File = $target_dir . $image3Filename;
    $image4File = $target_dir . $image4Filename;

    // Resize the images if needed
    // (Note: You may want to adjust the dimensions according to your requirements)
    // $resize_width = 400;
    // $resize_height = 400;

    // function resizeImage($source, $target)
    // {
    //     global $resize_width, $resize_height;
    //     $resize_image = imagecreatetruecolor($resize_width, $resize_height);
    //     $source_image = imagecreatefromjpeg($source);
    //     imagecopyresized($resize_image, $source_image, 0, 0, 0, 0, $resize_width, $resize_height, imagesx($source_image), imagesy($source_image));
    //     imagejpeg($resize_image, $target);
    //     imagedestroy($resize_image);
    //     imagedestroy($source_image);
    // }

    // Check if the files were successfully uploaded
    if (
        move_uploaded_file($homeImage_tmp, $homeImageFile) &&
        move_uploaded_file($image3_tmp, $image3File) &&
        move_uploaded_file($image4_tmp, $image4File)
    ) {
        // Insert data into the 'personal' table
        $sql = "INSERT INTO personal (homeImage, title, image3, image4, category, client, dates, link, summary)
        VALUES ('$homeImageFilename', '$title', '$image3Filename', '$image4Filename', '$category', '$client', '$dates', '$link', '$summary')";

        if (mysqli_query($con, $sql)) {
            echo "Data has been inserted successfully.";
            header("refresh:2; url=../portfolio/portfolio.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error uploading the images. Check your file permissions.";
    }
}

// Close the database connection
mysqli_close($con);
?>
