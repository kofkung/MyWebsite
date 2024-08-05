<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสินค้า</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>เพิ่ม สินค้า</h1>
    <form action="add_product.php" method="post">
        <label for="name">ชื่อสินค้า:</label>
        <input type="text" id="name" name="name" required>
        <label for="description">รายละเอียดสินค้า:</label>
        <textarea id="description" name="description"></textarea>
        <label for="price">ราคา:</label>
        <input type="number" id="price" name="price" step="0.01" required>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
