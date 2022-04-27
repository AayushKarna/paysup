<?php
require '../../includes/check-auth.php';
include "../../includes/db.php";
include "../../functions/sanitize.php";
include "../../functions/uploadFile.php";
include "../../functions/setMessage.php";

try {
    if ($_SERVER["REQUEST_METHOD"] != 'POST') {
        throw new Exception("Invalid request!");
    }

    foreach ($_POST as $k => $v) {
        mysqli_query($con, "UPDATE data SET value='$v' WHERE identifier='$k'");
    }

    setMessage('success', "Data fields were upadated.");
} catch (Exception $e) {
    setMessage("err", $e->getMessage());
}

header('Location: ' . $_SERVER['HTTP_REFERER']);