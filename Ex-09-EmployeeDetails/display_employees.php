<!DOCTYPE html>
<html>
<head>
    <title>Employee Information</title>
</head>
<body>
    <h2>Employee Information</h2>

    <?php
    include 'db.php';

    $result = $conn->query("SELECT * FROM Employee");

    if ($result->num_rows > 0) {
        echo "<table border='1'>
              <tr><th>EmpID</th><th>Name</th><th>Designation</th><th>Salary</th><th>Date of Joining</th><th>Update</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["EmpID"] . "</td>
                    <td>" . $row["Name"] . "</td>
                    <td>" . $row["Designation"] . "</td>
                    <td>" . $row["Salary"] . "</td>
                    <td>" . $row["DOJ"] . "</td>
                    <td><a href='update_employee.php?EmpID=" . $row["EmpID"] . "'>Update</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No employees found.";
    }

    $conn->close();
    ?>
</body>
</html>