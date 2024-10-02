<?php
include 'db.php';

$query = "SELECT * FROM events";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
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

        h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h3 {
            color: #007bff;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Events</h1>
    </header>
    <main>
        <h2>Upcoming Events</h2>
        <ul>
            <?php while ($event = mysqli_fetch_assoc($result)): ?>
                <li>
                    <h3><?php echo $event['title']; ?></h3>
                    <p><?php echo $event['description']; ?></p>
                    <p><strong>Date:</strong> <?php echo $event['date']; ?>, <strong>Time:</strong> <?php echo $event['time']; ?></p>
                    <p><strong>Location:</strong> <?php echo $event['location']; ?></p>
                    <p><strong>Price:</strong> $<?php echo $event['price']; ?></p>
                    <a href="event-details.php?id=<?php echo $event['id']; ?>">View Details</a>
                </li>
            <?php endwhile; ?>
        </ul>
    </main>
</body>
</html>
