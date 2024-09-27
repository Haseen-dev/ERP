<?php include('../includes/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoice Item Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2>Invoice Item Report</h2>

        <!-- Form for selecting date range -->
        <form action="invoice_item_report.php" method="GET">
            <label>Start Date</label>
            <input type="date" name="start_date" required>
            <label>End Date</label>
            <input type="date" name="end_date" required>
            <button type="submit">Search</button>
        </form>

        <?php
        if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
            $start_date = $_GET['start_date'];
            $end_date = $_GET['end_date'];

            $sql = "SELECT 
                        i.invoice_no, 
                        i.date, 
                        CONCAT(c.title, ' ', c.first_name, ' ', c.last_name) AS customer_name,
                        it.item_code,
                        it.item_name, 
                        it.item_category, 
                        it.unit_price 
                    FROM invoice_master ii
                    JOIN invoice i ON ii.invoice_no = i.invoice_no
                    JOIN customer c ON i.customer = c.id
                    JOIN item it ON ii.item_id = it.id
                    WHERE i.date BETWEEN ? AND ?";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$start_date, $end_date]);
        ?>

            <!-- Table displaying invoice item report -->
            <table>
                <thead>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Invoiced Date</th>
                        <th>Customer Name</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $stmt->fetch()) {
                        echo "<tr>
                            <td>{$row['invoice_no']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['customer_name']}</td>
                            <td>{$row['item_code']}</td>
                            <td>{$row['item_name']}</td>
                            <td>{$row['item_category']}</td>
                            <td>{$row['unit_price']}</td>
                          </tr>";
                    }
                    ?>
                </tbody>
            </table>

        <?php } ?>
    </div>
</body>

</html>