<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store');
session_set_cookie_params(['httponly'=>true,'secure'=>!empty($_SERVER['HTTPS']),'samesite'=>'Strict']);
if(session_status()!==PHP_SESSION_ACTIVE) session_start();
$host=getenv('DB_HOST')?:'127.0.0.1';$name=getenv('DB_NAME')?:'ladle_loan';$user=getenv('DB_USER')?:'root';$pass=getenv('DB_PASS')?:'';
try{$pdo=new PDO("mysql:host=$host;dbname=$name;charset=utf8mb4",$user,$pass,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);}catch(Throwable $e){http_response_code(500);echo json_encode(['error'=>'Database connection unavailable']);exit;}
function body():array{$v=json_decode(file_get_contents('php://input'),true);return is_array($v)?$v:$_POST;}
function out(array $v,int $code=200):never{http_response_code($code);echo json_encode($v);exit;}
function require_user():array{if(empty($_SESSION['user']))out(['error'=>'Please log in'],401);return $_SESSION['user'];}
function require_admin():array{$u=require_user();if($u['role']!=='admin')out(['error'=>'Administrator access required'],403);return $u;}
function csrf_check():void{$h=$_SERVER['HTTP_X_CSRF_TOKEN']??'';if(!$h||!hash_equals($_SESSION['csrf']??'', $h))out(['error'=>'Security token expired. Refresh and try again.'],419);}
function new_csrf():string{if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
?>