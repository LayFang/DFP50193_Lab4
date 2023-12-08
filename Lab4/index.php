<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Product Management</title>
</head>
<body>

<h2>Baby Stuff</h2>
<form action="create.php" method="post">
    <label for="productName">Product Name:</label>
    <br>
    <input type="text" name="productName" required>
    <br>
    <label for="productSpecifications">Product Specifications:</label>
    <br>
    <textarea name="productSpecifications" rows="4" cols="50" required></textarea>
    <br>
    <button type="submit" class="button">Create Product</button>
</form>

<h2>Product List</h2>
<?php
$files = glob("products/*.txt");

foreach ($files as $file) {
    $productName = pathinfo($file, PATHINFO_FILENAME);
    echo "<h3>$productName</h3>";
    echo "<a href='update.php?product=$productName' class='button'>Update Specifications</a>";
    echo " | <a href='delete.php?product=$productName' class='button'>Delete Product</a>";
    echo " | <a href='display.php?product=$productName' class='button'>Display Specifications</a>";
}
?>

</body>
</html>