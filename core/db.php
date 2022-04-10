<?php

require_once "user.php";

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DBNAME;

$db = new PDO($dsn, DB_NAME, DB_PSWD);
    
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function checkUser($db, $user)
{
    $sql = 'SELECT email, password FROM users WHERE email = :email AND password = :password';
    $st = $db->prepare($sql);
    var_dump($st); die;
    $st->bindParam(':email', $user->email, PDO::PARAM_STR);
    $st->bindParam(':password', $user->password, PDO::PARAM_STR);
    $res = $db->execute();
}
