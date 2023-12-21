<?php
include '../assets/server/connection.php';
session_start();
if (isset($_POST['change_passcode'])) {
    $new_passcode = $_POST['new_passcode'];
    $new_passcode = stripcslashes($new_passcode);
    $newHashedPasscode = password_hash($new_passcode, PASSWORD_DEFAULT);

    // Update the passcode for the user in the database
    $email_name = $_SESSION['login'];
    $sql = "UPDATE users
    SET passcode = '$newHashedPasscode'
    WHERE (name = '$email_name') OR (email = '$email_name');";
    $result = mysqli_query($con, $sql);
    echo $result;
    echo $newHashedPasscode;
    echo $email_name;

    if ($result) {
        echo "Passcode updated successfully!";
    } else {
        echo "Error updating passcode: " . mysqli_error($con);
    } 
    mysqli_close($con);
}

if (isset($_POST['delete_account'])) {
    $email_name = $_SESSION['login'];
    $sql = "DELETE FROM users
    WHERE (name = '$email_name') OR (email = '$email_name');";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Account deleted successfully!";
        session_start();
        session_destroy();
        header("Location: ../index.php");
        sleep(1.5);
        exit;
    } else {
        echo "Something went wrong. Your account was not deleted." . mysqli_error($con);
    } 
    mysqli_close($con);
}
if(isset($_POST['delete_review'])){
    $review_id = $_POST['review_id'];
    $sql = "DELETE FROM reviews
    WHERE articleId = '$review_id';";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Review deleted successfully!";
        header("Location: ../profile/profile.php");
        sleep(1.5);
        exit;
    } else {
        echo "Something went wrong. Your review was not deleted." . mysqli_error($con);
    } 
    mysqli_close($con);
}

?>
