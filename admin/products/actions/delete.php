<?php
require('../../includes/check-auth.php');
require('../../includes/db.php');

$id = $_GET['id'] ?? "";

if ($id === "") {
    $_SESSION['err'] = "Not a valid id.";
} else {
    $product = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE id='$id'"));

    $images = $product['images'];

    if (strrpos($images, ",") !== false){
        $images = explode(',', $images);
    } else {
        $images = [$images];
    }

    foreach($images as $image){
        unlink('../../../images/products/'.$image);
    }
    
    mysqli_query($con, "DELETE FROM products WHERE id='$id'");
    $_SESSION['success'] = "Deleted product [{$product['title']}].";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);