<?php
function uploadFile($file, $dir)
{
    global $con;
    $target_dir = "../../../uploads/$dir/" ;
    $target_file = $target_dir . basename($file["name"]);
    $hash = md5_file($file["tmp_name"]);
    $fileDir = $target_dir . $hash . ".jpg";
    $url = str_replace("../../../", "", $fileDir);
    $err = "";
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        $err = "The file is not an image.";
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    $alreadyUploaded = false;

    $result = mysqli_fetch_array(mysqli_query($con, "SELECT url FROM images WHERE hash='$hash'"));

    if ($result) {
        $alreadyUploaded = true;
        $url = $result['url'];
    }

    if (!$alreadyUploaded) {
        if (move_uploaded_file($file["tmp_name"], $fileDir)) {
            mysqli_query($con, "INSERT INTO images (url, hash) VALUES ('$url','$hash')");
        } else {
            $err = "Sorry, there was an error uploading your file.";
        }
    }

    return ["err" => $err, "url" => $url];
}
