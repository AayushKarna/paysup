<?php
$con = mysqli_connect("localhost", "eatfood_paysup", "1]9(0=@XohbW", "eatfood_paysup");
// $con = mysqli_connect("localhost", "root", "", "deep");

if (mysqli_connect_errno()) {
    die("SQL Connection Error");
}

mysqli_set_charset($con, 'utf8');
