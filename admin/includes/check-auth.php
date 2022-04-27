<?php
session_start();
require('vars.php');
$auth = $_SESSION['auth'] ?? "";

if ($auth !== md5($key)){
    header("Location: $loginURL");
    die();
}
?>