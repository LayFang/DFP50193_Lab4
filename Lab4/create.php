<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $productSpecifications = $_POST["productSpecifications"];

    if (!empty($productName) && !empty($productSpecifications)) {
        $filePath = "products/" . $productName . ".txt";

        if (file_exists($filePath)) {
            echo "Error: Product already exists!";
        } else {
            $file = fopen($filePath, "w");
            fwrite($file, $productSpecifications);
            fclose($file);

            echo "The file was successfully created and its contents were successfully inserted.";
        }
    } else {
        echo "Error: Both product name and specifications are required.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Create Product</title>
</head>
<body>
<br>
<a href="index.php" class="button">Back to Main Page</a>

</body>
</html>