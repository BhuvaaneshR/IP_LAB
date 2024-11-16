<!DOCTYPE html>
<html>
<head>
    <title>Update Employee Information</title>
</head>
<body>
    <h2>Update Employee Information</h2>

    <form method="GET" action="update_employee.php">
        <label for="name">Enter Employee Name:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Search">
    </form>

    <?php
    include 'db.php';
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        $stmt = $conn->prepare("SELECT * FROM Employee WHERE Name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $employee = $result->fetch_assoc();
        if (!$employee) {
            echo "<p>No employee found with the name '$name'.</p>";
        } else {
            echo "<h3>Employee Details for Update</h3>";
            ?>
            <form method="POST" action="update_employee.php">
                <input type="hidden" name="original_name" value="<?php echo htmlspecialchars($employee['Name']); ?>">

                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($employee['Name']); ?>"><br>

                <label for="designation">Designation:</label>
                <input type="text" name="designation" value="<?php echo htmlspecialchars($employee['Designation']); ?>"><br>

                <label for="salary">Salary:</label>
                <input type="number" name="salary" step="0.01" min="0" value="<?php echo htmlspecialchars($employee['Salary']); ?>"><br>

                <label for="doj">Date of Joining:</label>
                <input type="date" name="doj" value="<?php echo htmlspecialchars($employee['DOJ']); ?>"><br>

                <input type="submit" value="Update Employee">
            </form>
            <?php
        }
        $stmt->close();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['original_name']) && !empty($_POST['name']) && !empty($_POST['designation']) && !empty($_POST['salary']) && !empty($_POST['doj'])) {
            $original_name = $_POST['original_name'];
            $name = $_POST['name'];
            $designation = $_POST['designation'];
            $salary = $_POST['salary'];
            $doj = $_POST['doj'];
            $stmt = $conn->prepare("UPDATE Employee SET Name = ?, Designation = ?, Salary = ?, DOJ = ? WHERE Name = ?");
            $stmt->bind_param("ssdss", $name, $designation, $salary, $doj, $original_name);

            if ($stmt->execute()) {
                echo "Employee details updated successfully.";
            } else {
                echo "Error: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Error: All fields are required. Please ensure no field is left empty.";
        }
    }
    ?>
</body>
</html>
