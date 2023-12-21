<?php
session_start();

function deleteSession() {
    $_SESSION = array();
    session_unset();
    session_destroy();
}

deleteSession();

$message = "You have been logged out.";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/login-signup.css">
</head>
<body>
    <h2>Logout</h2>
<section class="inner-page">
    <div>
        <p><?php echo $message; ?></p>
    </div>
    <div class="login">
    <button onclick="location.href='../login/login.php'">Log In</button>
    </div>
    <div class = "signup">
    <button onclick="location.href='../signup/signup.php'">Sign Up</button>
    </div>
    <div class = "home">
    <button onclick="location.href='../index.php'">Proceed to Home</button>
    </div>
</section>
</body>
</html>
