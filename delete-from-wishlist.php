<?php
include('admin/includes/db.php');
include('admin/functions/sanitize.php');
$id = sanitize($_GET['id']);
mysqli_query($con, "DELETE FROM wishlist WHERE id='$id'");
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>