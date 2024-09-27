<?php include('../includes/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoice Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2>Invoice Report</h2>

        <!-- Form for selecting date range -->
        <form action="invoice_report.php" method="GET">
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
                        c.district, 
                        i.item_count, 
                        i.amount 
                    FROM invoice i 
                    JOIN customer c ON i.customer = c.id 
                    WHERE i.date BETWEEN ? AND ?";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$start_date, $end_date]);
        ?>

            <!-- Table displaying invoice report -->
            <table>
                <thead>
                    <tr>
                        <th>Invoice Number</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Customer District</th>
                        <th>Item Count</th>
                        <th>Invoice Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $stmt->fetch()) {
                        echo "<tr>
                            <td>{$row['invoice_no']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['customer_name']}</td>
                            <td>{$row['district']}</td>
                            <td>{$row['item_count']}</td>
                            <td>{$row['amount']}</td>
                          </tr>";
                    }
                    ?>
                </tbody>
            </table>

        <?php } ?>
    </div>
</body>

</html>