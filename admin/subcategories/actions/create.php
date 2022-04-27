<?php
require('../../includes/check-auth.php');
include("../../includes/db.php");
include("../../functions/sanitize.php");
include("../../functions/uploadFile.php");
include("../../functions/setMessage.php");

try {
    if ($_SERVER["REQUEST_METHOD"] != 'POST') throw new Exception("Invalid request!");

    $title = sanitize($_POST['title'] ?? "");
    $category_id = sanitize($_POST['category_id'] ?? "");

    if (strlen($title) == 0) throw new Exception("Title is required!");
    if (strlen($category_id) == 0) throw new Exception("Category is required!");

    mysqli_query($con, "INSERT INTO subcategories (name, category_id) VALUES ('$title','$category_id')");
    setMessage('success', "A new sub-category [$title] was added!");
} catch (Exception $e) {
    setMessage("err", $e->getMessage());
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
