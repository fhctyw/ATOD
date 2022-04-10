<?php

require_once "user.php";

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_DBNAME;

$db = new PDO($dsn, DB_NAME, DB_PSWD);
    
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function checkUser($db, $user) // email - adfsfsa@gmail.com, password = 5253asyhads
{
    $sql = 'SELECT email, password FROM users'; //WHERE email = ' .$user->email.' AND password = '.$user->password;
    
    $st = $db->prepare($sql);
    $st->execute();

    $result = $st->fetchAll();
    
    foreach ($result as $var) {
        if ($var['email'] == $user->email && $var['password'] == $user->password)
            return true;
    }
    return false;
}
