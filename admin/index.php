<?php
session_start();
require('includes/vars.php');

$auth = $_SESSION['auth'] ?? "";

$authKey = md5($key);

if ($auth === $authKey){
    header("Location: home.php");
} else {
    header("Location: login.php");
}
?>