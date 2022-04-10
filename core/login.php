<?php

require_once 'config.php';

$user = new User($_POST['email'], $_POST['password']);    

if (isset($_POST['do_login']))
{
    if (checkUser($db, $user)) {
        require '../index.html';
    }
    else {
        require '../view/error.html';
    }
}

?>