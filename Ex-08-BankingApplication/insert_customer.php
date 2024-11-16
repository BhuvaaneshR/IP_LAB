<!DOCTYPE html>
<html>
<head>
    <title>Insert Customer</title>
</head>
<body>
    <h2>Insert Customer Information</h2>
    <form method="POST" action="insert_customer.php">
        <label for="cname">Customer Name:</label>
        <input type="text" name="cname" required><br>
        <input type="submit" value="Add Customer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php';
        $cname = $_POST['cname'];
        $stmt = $conn->prepare("INSERT INTO CUSTOMER (CNAME) VALUES (?)");
        $stmt->bind_param("s", $cname);

        if ($stmt->execute()) {
            echo "Customer added successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>