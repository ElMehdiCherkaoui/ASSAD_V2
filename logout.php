<?php
include_once "models/Users.php";
$User = new User();
$User->logout();
header("Location: index.php");
exit;