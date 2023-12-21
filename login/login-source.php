<?php
session_start();
?>
<html>  
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/login-signup.css">

   
</head>  
<body>  
    <?php
        if(isset($_SESSION["login"])){
            echo "You are already logged in";
            echo '<button onclick="window.location.href = \'../../nyabuto\'">Proceeding to home </button>';
            echo '<script>setTimeout(function(){ window.location.href = \'../../nyabuto\'; }, 1000);</script>';
        } else {
    ?>
    <div class="frm">  
        <h2>Login</h2>  
        <form name="login" action="../forms/login-auth.php" method="POST">  
            
        <div class="email-or-name"><p>
            <label> Email or username: </label>
            <input type="text" id="email_name" name="email_name" required/> 
            </p>
        </div>
        <div class="passcode">
            <p>  
                <label> Passcode: </label>  
                <input type="password" id="passcode" name="passcode" required/>  
            </p>
        </div>  
        <div class ="login">
            <p>     
                <input type="submit" id="btn" value="Login" />  
            </p>
        </div>
        </form>  
        <div class="signup">
        <p>     
            <button onclick="window.location.href = '../signup/signup.php'">Sign Up</button>
            </p>
        </div>
        <div class="home">
        <p>     
            <button onclick="window.location.href = '../index.php'">Proceed to Home</button>
            </p>
        </div>

    </div>
    <?php
        }
    ?>
</body>     
</html>