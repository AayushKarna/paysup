<?php
require('../../includes/check-auth.php');
require('../../includes/db.php');

$id = $_GET['id'] ?? "";

if ($id === "") {
    $_SESSION['err'] = "Not a valid id.";
} else {
    mysqli_query($con, "DELETE FROM subcategories WHERE id='$id'");
    $_SESSION['success'] = "Deleted a sub-category.";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
