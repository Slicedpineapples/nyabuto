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
    <title>Logout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Logout</h1>

    <p><?php echo $message; ?></p>
    
    <button onclick="location.href='../login/login.php'">Log In</button>
    <button onclick="location.href='../signup/signup.php'">Sign Up</button>
    <button onclick="location.href='../index.php'">Proceed to Home</button>
</body>
</html>
