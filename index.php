<?php
include 'config.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>รายการสินค้า</h1>
    <a href="add_product.php" class="Product-add">เพิ่มสินค้าใหม่</a>
    <table>
        <thead>
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียดสินค้า</th>
                <th>ราคา</th>
                <th>แก้ไขข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>">แก้ไข</a> |
                    <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('คุณแน่ใจหรือไม่?');">ลบ</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script src="script.js"></script>

</body>
</html>

<?php
$conn->close();
?>
