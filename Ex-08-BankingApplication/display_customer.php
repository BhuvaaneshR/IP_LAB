
<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
</head>
<body>
    <h2>Customer Information</h2>

    <?php
    include 'db.php';

    $result = $conn->query("SELECT * FROM CUSTOMER");

    if ($result->num_rows > 0) {
        echo "<table border='1'>
              <tr><th>CID</th><th>CNAME</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["CID"] . "</td><td>" . $row["CNAME"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No customers found.";
    }
    $conn->close();
    ?>
</body>
</html>
