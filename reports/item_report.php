<?php include('../includes/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Item Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2>Item Report</h2>

        <?php
        $sql = "SELECT 
                    DISTINCT it.item_name, 
                    it.item_category, 
                    it.item_subcategory, 
                    SUM(it.quantity) as total_quantity 
                FROM item it 
                GROUP BY it.item_name, it.item_category, it.item_subcategory";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        ?>

        <!-- Table displaying item report -->
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Item Category</th>
                    <th>Item Subcategory</th>
                    <th>Total Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                            <td>{$row['item_name']}</td>
                            <td>{$row['item_category']}</td>
                            <td>{$row['item_subcategory']}</td>
                            <td>{$row['total_quantity']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>