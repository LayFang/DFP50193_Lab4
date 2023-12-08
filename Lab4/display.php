<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Product Display</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productName = $_GET["product"];
    $filePath = "products/" . $productName . ".txt";

    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);

        echo "<h2>$productName</h2>";
        echo "<p>$content</p>";
    } else {
        echo "Error: Product not found!";
    }
}
?>

<a href="index.php" class="button">Back to Main Page</a>

</body>
</html>