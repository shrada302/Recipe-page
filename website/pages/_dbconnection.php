<?php
// Use environment variables for production (Render), fallback to localhost for development (XAMPP)
$host = getenv('DB_HOST') ?: '127.0.0.1';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'biralo';
$db = getenv('DB_NAME') ?: 'users';
$port = getenv('DB_PORT') ?: 3307;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>