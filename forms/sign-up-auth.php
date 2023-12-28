<?php
    include('../assets/server/connection.php'); 

    $name = $_POST['name'];
    $email = $_POST['email'];
    $passcode = $_POST['passcode'];

    $name = stripslashes($name);
    $name = mysqli_real_escape_string($con, $name);
    $email = stripslashes($email);
    $email = mysqli_real_escape_string($con, $email);
    $passcode = stripslashes($passcode);
    $passcode = mysqli_real_escape_string($con, $passcode);
    $hashedPasscode = password_hash($passcode, PASSWORD_DEFAULT);
    $time = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM users where email = '$email';";  
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    
    if($count == 1){  
        echo("Sorry, this email has been used before");
        echo "<script>setTimeout(function(){window.location.href='../signup/signup.php';}, 3000);</script>";
        exit;
    } else {  
        $sql = "INSERT INTO users(name, email, passcode, time) VALUES ('$name', '$email', '$hashedPasscode', '$time')";
        if (mysqli_query($con, $sql)) {
            echo "Registration successful. ";
            echo "<p>Redirecting to login page...</p>";
            echo "<script>setTimeout(function(){window.location.href='../login/login.php';}, 3000);</script>";
        } else {
            echo "Error: Something went wrong" . mysqli_error($con);
            echo "<script>setTimeout(function(){window.location.href='./signup/signup.php';}, 3000);</script>";
        }
    }
    mysqli_close($con);
?>
