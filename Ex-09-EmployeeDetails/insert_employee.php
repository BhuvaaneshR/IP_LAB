<!DOCTYPE html>
<html>
<head>
    <title>Insert Employee</title>
</head>
<body>
    <h2>Insert Employee Details</h2>
    <form method="POST" action="insert_employee.php">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="designation">Designation:</label>
        <input type="text" name="designation" required><br>

        <label for="salary">Salary:</label>
        <input type="number" name="salary" step="0.01" min="0" required><br>

        <label for="doj">Date of Joining:</label>
        <input type="date" name="doj" required><br>

        <input type="submit" value="Add Employee">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db.php';
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $salary = $_POST['salary'];
        $doj = $_POST['doj'];

        $stmt = $conn->prepare("INSERT INTO Employee (Name, Designation, Salary, DOJ) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $name, $designation, $salary, $doj);

        if ($stmt->execute()) {
            echo "Employee added successfully.";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <br>
    <button onclick="window.location.href='display_employees.php'">View Employees</button>
</body>
</html>
