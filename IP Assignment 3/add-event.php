<?php
include 'db.php';
// Add session validation for admin
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add New Event</h1>
    </header>
    <main>
        <form action="add-event.php" method="POST">
            <input type="text" name="title" required placeholder="Event Title">
            <textarea name="description" required placeholder="Event Description"></textarea>
            <input type="date" name="date" required>
            <input type="time" name="time" required>
            <input type="text" name="location" required placeholder="Event Location">
            <input type="number" name="price" required placeholder="Ticket Price">
            <button type="submit">Add Event</button>
        </form>
    </main>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $price = $_POST['price'];

        $query = "INSERT INTO events (title, description, date, time, location, price) VALUES ('$title', '$description', '$date', '$time', '$location', '$price')";
        if (mysqli_query($conn, $query)) {
            echo "<p style='color: green;'>Event added successfully.</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $query . "<br>" . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
