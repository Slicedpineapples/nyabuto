<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/login-signup.css">

    <title>Sign Up</title>
</head>
<body>
    <div id ="sgnup">
    <h2>Sign Up</h2>
    
    <form name="signup" action="../forms/sign-up-auth.php" onsubmit="return validation()" method="POST">  
        <div class="email-or-name">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        </div>
        <div class="passcode">
        <label for="passcode">Passcode:</label>
        <input type="password" id="passcode" name="passcode" required><br>

        <label for="confirm_passcode">Confirm Passcode:</label>
        <input type="password" id="confirm_passcode" name="confirm_passcode" required><br>
        </div>
        <div class="signup">
        <input type="submit" value="Sign Up">
        </div>
    </form>
    <div class="login">
    <p>     
        <button onclick="window.location.href = '../login/login.php'">Login</button>
    </p> 
    </div>
    <div class="home">
        <p>
        <button onclick="window.location.href = '../index.php'">Proceed to Home</button>
        </p>
    </div>
<!-- Validation for the form -->
    <script>  
        function validation() {
            var passcode = document.signup.passcode.value; 
            var confirm_passcode =document.signup.confirm_passcode.value;

            if ((confirm_passcode !== passcode)){
                alert("Passcodes do not match");
                return false; 
            }  
        }  
    </script>  
</body>
</html>
