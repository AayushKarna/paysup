<?php
require('../../includes/check-auth.php');
include("../../includes/db.php");
include("../../functions/sanitize.php");
include("../../functions/uploadFile.php");
include("../../functions/setMessage.php");

try {
    $id = sanitize($_GET['id'] ?? "");
    if ($id === "") throw new Exception("Invalid ID!");

    $col = sanitize($_GET['col'] ?? "");

    $product = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE id='$id'"));

    $value = 1;

    if ($product[$col] == 1) {
        $value = 0;
    }

    if (strlen($col) == 0) throw new Exception("Col is required!");

    mysqli_query($con, "UPDATE products SET $col='$value' WHERE id='$id'");
    setMessage('success', "Product [{$product['title']}] was updated!");
} catch (Exception $e) {
    setMessage("err", $e->getMessage());
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
