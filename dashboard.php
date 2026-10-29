<?php

$host = "localhost";
$port = 3307;
$dbname = "contacts";
$username = "root";
$password = "";

try {

    // Connect to the database
    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get all contacts from the database
    $sql = "SELECT * FROM my_contact ORDER BY id ASC";

    $stmt = $conn->query($sql);

    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Database error: " . $e->getMessage());

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef4ff;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .description {
            text-align: center;
            color: #64748b;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #2563eb;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border: 1px solid #e2e8f0;
            color: #334155;
        }

        tr:nth-child(even) {
            background: #f8fafc;
        }

        tr:hover {
            background: #eef4ff;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #64748b;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #94a3b8;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                padding: 15px;
                overflow-x: auto;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Contact Dashboard</h2>

        <p class="description">
            List of all registered contacts
        </p>

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>

            <?php if (count($contacts) > 0) { ?>

                <?php foreach ($contacts as $row) { ?>

                    <tr>
                        <td>
                            <?php echo htmlspecialchars($row['id']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </td>

                        <td>---</td>

                        <td>---</td>
                    </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="4" class="empty">
                        No contacts found in the database.
                    </td>
                </tr>

            <?php } ?>

            <!-- Fourth row with dashes in every column -->
            <tr>
                <td>4</td>
                <td>---</td>
                <td>---</td>
                <td>---</td>
            </tr>

        </table>

        <a href="index.php" class="button">Add New Contact</a>

        <div class="footer">
            Contact Management System
        </div>

    </div>

</body>

</html>