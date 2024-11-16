
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
</head>
<body>
    <h2>Account Information</h2>

    <?php
    include 'db.php';

    $result = $conn->query("SELECT * FROM ACCOUNT");

    if ($result->num_rows > 0) {
        echo "<table border='1'>
              <tr><th>ANO</th><th>ATYPE</th><th>BALANCE</th><th>CID</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ANO"] . "</td><td>" . $row["ATYPE"] . "</td><td>" . $row["BALANCE"] . "</td><td>" . $row["CID"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No accounts found.";
    }
    $conn->close();
    ?>
</body>
</html>
