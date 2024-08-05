<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>แก้ไข สินค้า</h1>
    <form action="edit_product.php?id=<?php echo $id; ?>" method="post">
        <label for="name">ชื่อสินค้า:</label>
        <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        <label for="description">รายละเอียดสินค้า:</label>
        <textarea id="description" name="description"><?php echo $product['description']; ?></textarea>
        <label for="price">ราคา:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
