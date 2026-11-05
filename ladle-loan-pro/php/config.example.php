<?php
declare(strict_types=1);

// Copy to config.php on your PHP host and fill in credentials there.
// Never commit real database credentials to GitHub.
$host = getenv('DB_HOST') ?: '127.0.0.1';
$db   = getenv('DB_NAME') ?: 'ladle_loan_pro';
$user = getenv('DB_USER') ?: 'CHANGE_ME';
$pass = getenv('DB_PASS') ?: 'CHANGE_ME';

$pdo = new PDO(
    "mysql:host={$host};dbname={$db};charset=utf8mb4",
    $user,
    $pass,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
);
