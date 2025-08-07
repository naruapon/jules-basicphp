<?php
include 'db.php';

$id = $_GET['id'];
$message = '';

// Handle form submission for updating a product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "UPDATE product SET name=?, brand=?, price=?, stock=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $name, $brand, $price, $stock, $id);

    if ($stmt->execute()) {
        // Redirect to index page after successful update
        header("Location: index.php");
        exit();
    } else {
        $message = "Error updating record: " . $conn->error;
    }
    $stmt->close();
}

// Fetch the product to edit
$sql = "SELECT id, name, brand, price, stock FROM product WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();

if (!$product) {
    die("Product not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        form { margin-top: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; max-width: 500px; }
        form input[type="text"], form input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form input[type="submit"]:hover { background-color: #0056b3; }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .back-link { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>

    <h1>Edit Product</h1>

    <?php if (!empty($message)): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        <input type="hidden" name="update">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br>
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" value="<?php echo htmlspecialchars($product['brand']); ?>" required><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br>
        <label for="stock">Stock:</label><br>
        <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required><br><br>
        <input type="submit" value="Update Product">
    </form>

    <a href="index.php" class="back-link">Back to Product List</a>

</body>
</html>

<?php
$conn->close();
?>
