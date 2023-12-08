<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Delete</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productName = $_GET["product"];
    $filePath = "products/" . $productName . ".txt";

    if (file_exists($filePath)) {
        echo "Warning: Are you sure you want to delete $productName? ";
        echo "<form action='delete.php' method='post'>";
        echo "<input type='hidden' name='productName' value='$productName'>";
        echo "<input type='submit' value='Yes, Delete' class='button'>";
        echo "</form>";
    } else {
        echo "Error: Product not found!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $filePath = "products/" . $productName . ".txt";

    if (file_exists($filePath)) {
        unlink($filePath);
        echo "The file was deleted after displaying the warning.";
    } else {
        echo "Error: Product not found!";
    }
}
?>
<a href="index.php" class="button">Back to Main Page</a>
</body>
</html>