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

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        exit("Please submit the contact form first.");
    }

    // Get form data
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $contact = trim($_POST["contact"] ?? "");

    // Check for empty fields
    if ($name == "" || $email == "" || $contact == "") {
        exit("All form fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Please enter a valid email address.");
    }

    // Insert data into the database
    $sql = "INSERT INTO my_contact (name, email, contact)
            VALUES (:name, :email, :contact)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":name" => $name,
        ":email" => $email,
        ":contact" => $contact
    ]);

    // Display saved information
    echo "<h2>Contact saved successfully!</h2>";

    echo "<p><strong>Name:</strong> "
        . htmlspecialchars($name) . "</p>";

    echo "<p><strong>Email:</strong> "
        . htmlspecialchars($email) . "</p>";

    echo "<p><strong>Contact:</strong> "
        . htmlspecialchars($contact) . "</p>";

    echo '<p><a href="index.php">Return to the form</a></p>';

} catch (PDOException $e) {

    // Display the actual database error for troubleshooting
    die("Database error: " . $e->getMessage());

}

?>