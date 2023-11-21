<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }

        h1 {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .links a {
            display: block;
            padding: 10px;
            text-decoration: none;
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .links a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="links">
            <h1>Update Page</h1>
            <a href="updatecar.php">Update a specific Car</a>
            <a href="updaterent.php">Update a specific Rental</a>
            <a href="updatesell.php">Update a specific Sell</a>
        </div>
    </div>
</body>

</html>