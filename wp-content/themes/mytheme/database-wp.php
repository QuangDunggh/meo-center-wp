<?php
$db_host = "localhost";
$db_name = "meo";
$db_user = "root";
$db_pass = "123456";

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>