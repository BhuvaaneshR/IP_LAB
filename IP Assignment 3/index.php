<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s, border-bottom 0.3s;
            padding-bottom: 5px;
        }

        nav a:hover {
            color: #007bff;
            border-bottom: 2px solid #007bff;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .featured-events {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .featured-events h3 {
            margin: 0 0 15px;
            color: #007bff;
        }

        .event-card {
            background-color: #ffffff;
            border: 1px solid #e2e2e2;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .event-title {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 5px;
        }

        .event-details {
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Event Management System</h1>
        <nav>
            <ul>
                <li><a href="events.php">Events</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="login.html">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Welcome to the Event Management System</h2>
        <section class="featured-events">
            <h3>Featured Events</h3>
            <div class="event-card">
                <h4 class="event-title">Event Title 1</h4>
                <p class="event-details">Description of Event 1. Date: 2024-10-15, Location: Venue 1, Price: $20</p>
            </div>
            <div class="event-card">
                <h4 class="event-title">Event Title 2</h4>
                <p class="event-details">Description of Event 2. Date: 2024-10-20, Location: Venue 2, Price: $30</p>
            </div>
            <!-- Add more event cards as needed -->
        </section>
    </main>
</body>
</html>
