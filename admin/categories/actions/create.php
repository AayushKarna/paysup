<?php
require('../../includes/check-auth.php');
include("../../includes/db.php");
include("../../functions/sanitize.php");
include("../../functions/uploadFile.php");
include("../../functions/setMessage.php");

try {
    if ($_SERVER["REQUEST_METHOD"] != 'POST') throw new Exception("Invalid request!");

    $title = sanitize($_POST['title'] ?? "");

    if (strlen($title) == 0) throw new Exception("Title $title is required!");

    // echo  "INSERT INTO services (title, description, url) VALUES ('$title', '$description', '$image')";

    mysqli_query($con, "INSERT INTO categories (name) VALUES ('$title')");
    setMessage('success', "A new category [$title] was added!");
} catch (Exception $e) {
    setMessage("err", $e->getMessage());
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
