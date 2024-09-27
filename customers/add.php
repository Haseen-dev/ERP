<?php include('../includes/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Customer</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2>Register Customer</h2>
        <form action="add.php" method="POST">
            <label>Title</label>
            <select name="title" required>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
            </select>
            <label>First Name :</label>
            <input type="text" name="first_name" required>
            <label>Last Name :</label>
            <input type="text" name="last_name" required>
            <label>Contact Number</label>
            <input type="text" name="contact_no" required>
            <label>District</label>
            <select name="district" required>
                <?php
                $stmt = $conn->query("SELECT * FROM district WHERE active = 'yes'");
                while ($row = $stmt->fetch()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['district'] . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

    $sql = "INSERT INTO customer (title, first_name, last_name, contact_no, district) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$title, $first_name, $last_name, $contact_no, $district])) {
        echo "Customer Registered!";
    } else {
        echo "Error: Could not register customer.";
    }
}
?>