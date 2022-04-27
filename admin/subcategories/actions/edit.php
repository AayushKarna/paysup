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
    $category_id = sanitize($_POST['category_id'] ?? "");
        
    if (strlen($title) == 0) throw new Exception("Title is required!");
    if (strlen($category_id) == 0) throw new Exception("Category is required!");


    mysqli_query($con, "UPDATE subcategories SET name='$title', category_id='$category_id' WHERE id='$id'");
    setMessage('success', "SubCategory [$title] was edited!");
} catch (Exception $e) {
    setMessage("err", $e->getMessage());
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
