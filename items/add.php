<?php include('../includes/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Item</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2>Register Item</h2>
        <form action="add.php" method="POST">
            <label>Item Code</label>
            <input type="text" name="item_code" required>
            <label>Item Name</label>
            <input type="text" name="item_name" required>
            <label>Item Category</label>
            <select name="item_category" required>
                <?php
                $stmt = $conn->query("SELECT * FROM item_category");
                while ($row = $stmt->fetch()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['category'] . "</option>";
                }
                ?>
            </select>
            <label>Sub Category</label>
            <select name="item_subcategory" required>
                <?php
                $stmt = $conn->query("SELECT * FROM item_subcategory");
                while ($row = $stmt->fetch()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['sub_category'] . "</option>";
                }
                ?>
            </select>
            <label>Quantity</label>
            <input type="number" name="quantity" required>
            <label>Unit Price</label>
            <input type="text" name="unit_price" required>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    $sql = "INSERT INTO item (item_code, item_name, item_category, item_subcategory, quantity, unit_price) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$item_code, $item_name, $item_category, $item_subcategory, $quantity, $unit_price]);

    echo "Item Registered!";
}
?>