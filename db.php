<?php
$host = 'localhost';
$db   = 'academic_excellence';
$user = 'root';
$pass = ''; // no password in XAMPP by default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

