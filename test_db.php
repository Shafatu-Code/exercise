<?php

try {
    $conn = new PDO(
        "mysql:host=127.0.0.1;port=3307;dbname=contacts;charset=utf8mb4",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );

    echo "SUCCESS: Connected to the contacts database!";

} catch (PDOException $e) {
    echo "FAILED: " . $e->getMessage();
}

?>