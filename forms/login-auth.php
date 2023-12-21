<?php
    include('../assets/server/connection.php');
    $email_name = $_POST['email_name']; 
    $passcode = $_POST['passcode'];

    $email_name = stripcslashes($email_name);
    $email_name = mysqli_real_escape_string($con, $email_name);
    $passcode = stripcslashes($passcode);  
    $passcode = mysqli_real_escape_string($con, $passcode);   
    $hashedPasscode = password_hash($passcode, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users where  name = '$email_name' OR email = '$email_name';";  
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);
    $storedHashedPassword=$row['passcode'];

    if(password_verify($passcode,$storedHashedPassword)){
        // Set session cookie parameters to last until the user logs out
        // session_set_cookie_params(0);
        session_start();
        // $_SESSION['login'] = true;
        $_SESSION['login'] = $email_name;
        session_regenerate_id(true); // Regenerate session ID and update session cookie
        header("Location: ../index.php");
        sleep(1.5);
        exit;
    } else {
        sleep(2);
        echo "Incorrect login details. ";
        echo "<p>Redirecting to login page...</p>";
        session_destroy();
        echo "<script>setTimeout(function(){window.location.href='../login/login.php';}, 3000);</script>";
        exit;
    }
?>
