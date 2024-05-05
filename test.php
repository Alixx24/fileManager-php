<?php

use Models\Database;
use Models\Token;

require_once 'autoload.php';

$user_id = 1;
$type = 'email';
$userToken = "a319dcf0799923436f7c7a592e934fe50594032331675985063eb36495bf6879";

$obj = new Token();
$token = $obj->compareToken($user_id, $type, $userToken);

var_dump( phpinfo() );die;
var_dump($token);
