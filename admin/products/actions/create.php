<?php
require('../../includes/check-auth.php');
include("../../includes/db.php");
include("../../functions/sanitize.php");
include("../../functions/uploadFile.php");
include("../../functions/setMessage.php");

try {
    if ($_SERVER["REQUEST_METHOD"] != 'POST') throw new Exception("Invalid request!");

    $title = sanitize($_POST['title'] ?? "");
    $price = sanitize($_POST['price'] ?? 0.00);
    $description = sanitize($_POST['description'] ?? "");
    $sizes = sanitize($_POST['sizes'] ?? "");
    $materials = sanitize($_POST['materials'] ?? "");
    $colors = sanitize($_POST['colors'] ?? "");
    $category_id = sanitize($_POST['category_id'] ?? "");
    $subcategory_id = sanitize($_POST['subcategory_id'] ?? "");

    if (strlen($title) == 0) throw new Exception("title is required!");
    if (strlen($category_id) == 0) throw new Exception("category_id is required!");
    if (strlen($subcategory_id) == 0) throw new Exception("subcategory_id is required!");

    $images = "";

    // Count total files
    $countfiles = count($_FILES['files']['name']);

    // Looping all files
    for ($i = 0; $i < $countfiles; $i++) {
        if ($_FILES['files']['size'][$i] != 0) {
            $filename = md5(microtime()) . $hash = md5_file($_FILES['files']['tmp_name'][$i]) . ".gif";

            $images .= $filename . ",";

            // Upload file
            move_uploaded_file($_FILES['files']['tmp_name'][$i], '../../../images/products/' . $filename);
        }
    }

    if ($images === "") throw new Exception("Upload atleast one file");
    $images = substr($images, 0, strlen($images) - 1);

    mysqli_query($con, "INSERT INTO products (title, price, description, category_id, subcategory_id, sizes, colors, materials, images) VALUES ('$title', '$price', '$description', '$category_id', '$subcategory_id', '$sizes', '$colors', '$materials', '$images')");
    setMessage('success', "A new product [$title] was added!");
} catch (Exception $e) {
    setMessage("err", $e->getMessage());
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
