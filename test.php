<?php

use Models\Database;
use Models\Token;

require_once 'autoload.php';

$user_id = 1;
$type = 'password';
$obj = new Token();
$token = $obj->getToken($user_id, $type);


var_dump($token);
