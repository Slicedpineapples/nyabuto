<?php
include '../assets/server/connection.php';
session_start();
if ($_SESSION['login']) {
    $email_name = $_SESSION['login'];
    $name_query = "SELECT name FROM users WHERE (name = '$email_name') OR (email = '$email_name');";
    $name_result = mysqli_query($con, $name_query);
    $name_row = mysqli_fetch_assoc($name_result);
    $name = $name_row['name'];
    ?>
    <head>
        <link rel="stylesheet" type="text/css" href="../assets/css/profile-style.css">
    <h2>Hello <?php echo $name ?>!</h2>

    <div><h4>Change passcode</h4>
    <form action="../forms/profile-management.php" method="post">
        <input type="password" name="new_passcode" placeholder="New passcode" required>
        <input type="submit" name="change_passcode" value="Change passcode">
    </form>
    </div>

    <div><h4>Delete Account</h4>
    <form action="../forms/profile-management.php" method="post" onsubmit="return confirm('Are you sure you want to delete your account? This action is irreversible.');">
        <input type="submit" name="delete_account" value="Delete Account">
    </form>
    </div>
<div><h4> My reviews</h4></div>

    <?php
    $sql = "SELECT articleId, name, role, review FROM reviews where name = '$name';";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div>
                <h5>Review ID: <?php echo $row["articleId"]; ?></h5>
                <p><strong>Role:</strong> <?php echo $row["role"]; ?></p>
                <p><strong>Review :</strong> <?php echo $row["review"]; ?></p>
                <form action="../forms/profile-management.php" method="post">
                    <input type="hidden" name="review_id" value="<?php echo $row["articleId"]; ?>">
                    <input type="submit" name="delete_review" value="Delete Review">
                </form>
            </div>
            <?php
        }
    } else {
        echo "No reviews found.";
    }
    mysqli_close($con);
} else {
    echo "To access this function, you need to be logged in";
    sleep(2);
    header("Location: ../login/login.php");
}
?>