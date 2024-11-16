<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students"; // Adjust this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$regNo = $_GET['regNo'] ?? '';

if ($regNo) {
    $stmt = $conn->prepare("SELECT regNo, name, course, email FROM school WHERE regNo = ?");
    $stmt->bind_param("s", $regNo);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    echo json_encode($student);
} else {
    echo json_encode(null);
}

$stmt->close();
$conn->close();
?>