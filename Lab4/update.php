<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Product</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productName = $_GET["product"];
    $filePath = "products/" . $productName . ".txt";

    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);

        echo "<h2>Update Product: $productName</h2>";
        echo "<form action='update.php?product=$productName' method='post'>";
        echo "<label for='productSpecifications'>Product Specifications:</label>";
        echo "<textarea name='productSpecifications' rows='4' cols='50' required>$content</textarea>";
        echo "<br>";
        echo "<button type='submit' class='button'>Update Product</button>";
        echo "</form>";
    } else {
        echo "Error: Product not found!";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_GET["product"];
    $productSpecifications = $_POST["productSpecifications"];

    if (!empty($productName) && !empty($productSpecifications)) {
        $filePath = "products/" . $productName . ".txt";

        if (file_exists($filePath)) {
            $file = fopen($filePath, "w");
            fwrite($file, $productSpecifications);
            fclose($file);

            echo "<p>Product specifications updated successfully.</p>";
        } else {
            echo "<p class='error'>Error: Product not found!</p>";
        }
    } else {
        echo "<p class='error'>Error: Product name and specifications are required.</p>";
    }
}
?>

<a href="index.php" class="button">Back to Main Page</a>

</body>
</html>