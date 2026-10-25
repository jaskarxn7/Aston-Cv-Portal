<?php
session_start();

// === FINAL CONFIG WITH YOUR PASSWORD ===
$host = 'localhost';
$dbname = 'dg250149508_astoncv';
$username = 'dg250149508';
$password = 'Password123@';     // ← Your actual password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>