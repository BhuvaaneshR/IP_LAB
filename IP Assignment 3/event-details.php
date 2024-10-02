<?php
include 'db.php';

$event_id = $_GET['id'];
$query = "SELECT * FROM events WHERE id='$event_id'";
$result = mysqli_query($conn, $query);
$event = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $event['title']; ?></title>
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
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo $event['title']; ?></h1>
    </header>
    <main>
        <p><?php echo $event['description']; ?></p>
        <p><strong>Date:</strong> <?php echo $event['date']; ?>, <strong>Time:</strong> <?php echo $event['time']; ?></p>
        <p><strong>Location:</strong> <?php echo $event['location']; ?></p>
        <p><strong>Price:</strong> $<?php echo $event['price']; ?></p>
        <a href="book-ticket.php?id=<?php echo $event['id']; ?>" class="btn">Book Tickets</a>
    </main>
</body>
</html>
