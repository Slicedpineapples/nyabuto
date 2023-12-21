<?php
session_start();
?>
<html>  
<head>  
    <title>Login</title>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">    
   
</head>  
<body>  
    <?php
        if(isset($_SESSION["login"])){
            echo "You are already logged in";
            echo '<button onclick="window.location.href = \'../../nyabuto\'">Proceeding to home </button>';
            echo '<script>setTimeout(function(){ window.location.href = \'../../nyabuto\'; }, 1000);</script>';
        } else {
    ?>
    <div id="frm">  
        <h1>Login</h1>  
        <form name="login" action="../forms/login-auth.php" method="POST">  
            <p>
            <label> Email or username: </label>
            <input type="text" id="email_name" name="email_name" required/> 
            </p>
            <p>  
                <label> Passcode: </label>  
                <input type="password" id="passcode" name="passcode" required/>  
            </p>  
            <p>     
                <input type="submit" id="btn" value="Login" />  
            </p>
        </form>  
        <p>     
            <button onclick="window.location.href = '../signup/signup.php'">Sign Up</button>
            </p>
        <p>     
            <button onclick="window.location.href = '../index.php'">Proceed to Home</button>
            </p>
    </div>
    <?php
        }
    ?>
</body>     
</html>