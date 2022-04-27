<?php
require('../../includes/check-auth.php');
include("../../includes/db.php");
include("../../functions/sanitize.php");
include("../../functions/uploadFile.php");
include("../../functions/setMessage.php");

try {
    if ($_SERVER["REQUEST_METHOD"] != 'POST') throw new Exception("Invalid request!");

    $id = sanitize($_POST['id'] ?? "");
    if ($id === "") throw new Exception("Invalid ID!");

    $title = sanitize($_POST['title'] ?? "");

    if (strlen($title) == 0) throw new Exception("Title is required!");


    mysqli_query($con, "UPDATE categories SET name='$title' WHERE id='$id'");
    setMessage('success', "Category [$title] was edited!");
} catch (Exception $e) {
    setMessage("err", $e->getMessage());
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
