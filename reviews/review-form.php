<head>
<link rel="stylesheet" type="text/css" href="../assets/css/review-style.css">
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['login'])) {
    ?>
    <div class="container" name="reviews-container">
        <form action="../forms/send-review-auth.php" onsubmit="return validation()" method="post" enctype="multipart/form-data" name="form">
        <div class = "name">    
        <label for="name">Name:</label>
            <input type="text" name="name" required><br>
        </div>
        <div class ="role">
            <label for="role">Role:</label>
            <input type="text" name="role" required><br>
        </div>
        <div class ="review">
            <label for="review">Review:</label>
            <textarea name="review" rows="4" required></textarea><br>
        </div>
        <div class ="photo">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" accept="image/*"><br>
        </div>
        <div class ="submit ">
            <input type="submit" name="submit" value="Submit">
        </div>
        </form>

            <div class = "tips">
                <p>
                    Important tips!
                </p>
                    <ul>
                        <li>You can use your official name. Alternatively, your default username can be used by leaving the name field empty</li>
                        <li>The photo uploaded will be compressed. For best quality, use a close-up photo with minimal background </li>
                        <li>Finally, smile and be proud to celebrate the achievements we have made together</li>
                    </ul>
            </div>
            
    </div>
    <?php
    } else {
        header("Location: ../login/login.php");
        exit();
    }
    ?>
</body>
