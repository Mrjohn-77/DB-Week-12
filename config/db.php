<?php
// For local development only. Use environment variables on a shared server.
// Real server credentials go in secret/config.php (ignored by Git, never pushed).
if (file_exists(__DIR__ . '/../secret/config.php')) { require __DIR__ . '/../secret/config.php'; }
$host = $host ?? getenv('DB_HOST') ?: 'localhost';
$user = $user ?? getenv('DB_USER') ?: 'root';
$pass = $pass ?? getenv('DB_PASS') ?: '';
$dbname = $dbname ?? getenv('DB_NAME') ?: 'resume_lab';
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) { error_log(mysqli_connect_error()); http_response_code(500); exit('Database unavailable'); }
mysqli_set_charset($conn, 'utf8mb4');
