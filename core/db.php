<?php

$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DBNAME, DB_NAME, DB_PSWD);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);