<?php
require __DIR__.'/config.php';
$action=$_GET['action']??'';
if($action==='session'){out(['user'=>$_SESSION['user']??null,'csrf'=>new_csrf()]);}
if($action==='register'&&$_SERVER['REQUEST_METHOD']==='POST'){
$d=body();$name=trim($d['name']??'');$email=strtolower(trim($d['email']??''));$pw=$d['password']??'';
if(strlen($name)<2||!filter_var($email,FILTER_VALIDATE_EMAIL)||strlen($pw)<10)out(['error'=>'Enter a valid name, email and password of at least 10 characters'],422);
try{$s=$pdo->prepare("INSERT INTO users(full_name,email,password_hash) VALUES(?,?,?)");$s->execute([$name,$email,password_hash($pw,PASSWORD_DEFAULT)]);}catch(Throwable $e){out(['error'=>'That email may already be registered'],409);}
session_regenerate_id(true);$_SESSION['user']=['id'=>(int)$pdo->lastInsertId(),'name'=>$name,'email'=>$email,'role'=>'applicant'];out(['ok'=>true,'redirect'=>'applicant.html']);
}
if($action==='login'&&$_SERVER['REQUEST_METHOD']==='POST'){
$d=body();$s=$pdo->prepare("SELECT id,full_name,email,password_hash,role FROM users WHERE email=?");$s->execute([strtolower(trim($d['email']??''))]);$u=$s->fetch();
if(!$u||!password_verify($d['password']??'',$u['password_hash']))out(['error'=>'Email or password is incorrect'],401);
session_regenerate_id(true);$_SESSION['user']=['id'=>(int)$u['id'],'name'=>$u['full_name'],'email'=>$u['email'],'role'=>$u['role']];out(['ok'=>true,'redirect'=>$u['role']==='admin'?'admin.html':'applicant.html']);
}
if($action==='logout'){session_destroy();out(['ok'=>true]);}
if($action==='apply'&&$_SERVER['REQUEST_METHOD']==='POST'){
$u=require_user();csrf_check();$d=body();$type=$d['loan_type']??'';$amount=filter_var($d['amount']??null,FILTER_VALIDATE_INT);
if(!in_array($type,['Personal Loan','Home Loan','Education Loan'],true)||!$amount||$amount<10000||$amount>50000000)out(['error'=>'Choose a valid loan type and amount'],422);
$ref='LL-'.strtoupper(bin2hex(random_bytes(4)));$s=$pdo->prepare("INSERT INTO loan_applications(reference_code,user_id,loan_type,requested_amount) VALUES(?,?,?,?)");$s->execute([$ref,$u['id'],$type,$amount]);out(['ok'=>true,'reference'=>$ref]);
}
if($action==='my-applications'){$u=require_user();$s=$pdo->prepare("SELECT reference_code,loan_type,requested_amount,status,created_at FROM loan_applications WHERE user_id=? ORDER BY created_at DESC");$s->execute([$u['id']]);out(['applications'=>$s->fetchAll()]);}
if($action==='admin-list'){$u=require_admin();$s=$pdo->query("SELECT a.id,a.reference_code,a.loan_type,a.requested_amount,a.status,a.created_at,u.full_name,u.email FROM loan_applications a JOIN users u ON u.id=a.user_id ORDER BY a.created_at DESC");out(['applications'=>$s->fetchAll()]);}
if($action==='admin-update'&&$_SERVER['REQUEST_METHOD']==='POST'){$u=require_admin();csrf_check();$d=body();$id=filter_var($d['id']??null,FILTER_VALIDATE_INT);$status=$d['status']??'';if(!$id||!in_array($status,['Under Review','Approved','Rejected'],true))out(['error'=>'Invalid update'],422);$s=$pdo->prepare("UPDATE loan_applications SET status=? WHERE id=?");$s->execute([$status,$id]);out(['ok'=>true]);}
out(['error'=>'Unknown action'],404);
?>