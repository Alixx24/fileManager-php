<?php

use Models\Database;
use Models\Token;

require_once 'autoload.php';

$user_id = 1;
$type = 'email';
$obj = new Token();
$token = $obj->saveToken($user_id, $type);


var_dump($token);
