<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
</head>
<body>

    <h2>Add data to portfolio</h2>

    <form action="../forms/send-portfolio.php" onsubmit="return validation()" method="post" enctype="multipart/form-data" name="form">
        
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>
        
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required><br>
        
        <label for="client">Client:</label>
        <input type="text" id="client" name="client" required><br>
        
        <label for="dates">Dates:</label>
        <input type="date" id="dates" name="dates" required><br>
        
        <label for="link">Link:</label>
        <input type="text" id="link" name="link" required><br>
        
        <label for="summary">Summary:</label>
        <input type="text" id="summary" name="summary" required><br>
        
        <label for="homeImage">Home Image:</label>
        <input type="file" id="homeImage" name="homeImage" required><br>
    
        <label for="image3">Image 3:</label>
        <input type="file" id="image3" name="image3" required><br>

        <label for="image4">Image 4:</label>
        <input type="file" id="image4" name="image4" required><br>
        
        <input type="submit" value="Submit">
    </form>

</body>
</html>
