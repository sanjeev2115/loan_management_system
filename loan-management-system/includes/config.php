<?php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
$DB_HOST='localhost'; $DB_NAME='ladle_loan_db'; $DB_USER='root'; $DB_PASS='';
try { $pdo=new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",$DB_USER,$DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]); }
catch(PDOException $ex) { http_response_code(500); exit('Database connection failed. Import database/schema.sql and check includes/config.php.'); }
function e(?string $v): string { return htmlspecialchars($v ?? '',ENT_QUOTES,'UTF-8'); }
function csrf_token(): string { if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function verify_csrf(): void { if(!hash_equals($_SESSION['csrf'] ?? '',$_POST['csrf'] ?? '')) { http_response_code(419); exit('Invalid form token. Please go back and try again.'); } }
function require_applicant(): void { if(empty($_SESSION['user_id'])) { header('Location: login.php'); exit; } }
function require_admin(): void { if(empty($_SESSION['admin_id'])) { header('Location: login.php'); exit; } }
?>