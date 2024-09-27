<?php include('../includes/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Item List</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2>Item List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM item");
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['item_code']}</td>
                                <td>{$row['item_name']}</td>
                                <td>{$row['item_category']}</td>
                                <td>{$row['item_subcategory']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['unit_price']}</td>
                              </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>