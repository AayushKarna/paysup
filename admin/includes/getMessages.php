<?php
$err = "";
$success = "";

if (isset($_SESSION['err'])) {
    $err = $_SESSION['err'];
    unset($_SESSION['err']);
}

if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
