<?php
include 'db.php';

// Handle form submission for creating a new product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO product (name, brand, price, stock) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $name, $brand, $price, $stock);

    if ($stmt->execute()) {
        $message = "New product created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

// Fetch all products
$sql = "SELECT id, name, brand, price, stock FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Shop Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1, h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .action-links a { margin-right: 10px; }
        form { margin-top: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; }
        form input[type="text"], form input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form input[type="submit"]:hover { background-color: #218838; }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

    <h1>Mobile Shop Management</h1>

    <!-- Create Product Form -->
    <h2>Add New Product</h2>
    <?php if (!empty($message)): ?>
        <div class="message <?php echo strpos($message, 'Error') !== false ? 'error' : 'success'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <form method="post" action="index.php">
        <input type="hidden" name="create">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" required><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br>
        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>
        <input type="submit" value="Add Product">
    </form>

    <!-- Product List -->
    <h2>Product List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["brand"]); ?></td>
                    <td><?php echo number_format($row["price"], 2); ?></td>
                    <td><?php echo $row["stock"]; ?></td>
                    <td class="action-links">
                        <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No products found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>
