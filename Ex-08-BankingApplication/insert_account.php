
<!DOCTYPE html>
<html>
<head>
    <title>Insert Account</title>
</head>
<body>
    <h2>Insert Account Information</h2>
    <form method="POST" action="insert_account.php">
        <label for="atype">Account Type (S/C):</label>
        <input type="text" name="atype" pattern="[SC]" required><br>
        <label for="balance">Balance:</label>
        <input type="number" name="balance" step="0.01" min="0" required><br>
        <label for="cid">Customer ID:</label>
        <input type="number" name="cid" required><br>
        <input type="submit" value="Add Account">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php';
        $atype = $_POST['atype'];
        $balance = $_POST['balance'];
        $cid = $_POST['cid'];

        $stmt = $conn->prepare("INSERT INTO ACCOUNT (ATYPE, BALANCE, CID) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $atype, $balance, $cid);

        if ($stmt->execute()) {
            echo "Account added successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>


