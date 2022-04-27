<?php
$token = "";
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
} else {
    $token = uniqid("DBP") . md5(microtime());
}
setcookie("token", $token, time() + (86400 * 365), "/");

include('admin/includes/db.php');
include('admin/functions/sanitize.php');

$config = [];

$result = mysqli_query($con, "SELECT * FROM configs");
while ($row = mysqli_fetch_assoc($result)) {
    $config[$row['identifier']] = $row['value'];
}

$categories = [];
$categoryIds = [];

$result = mysqli_query($con, "SELECT * FROM categories");
while ($row = mysqli_fetch_assoc($result)) {
    $row['subcategories'] = [];
    $categoryIds[] = $row['id'];
    $categories[] = $row;
}
$result = mysqli_query($con, "SELECT * FROM subcategories");
while ($row = mysqli_fetch_assoc($result)) {
    $index = array_search($row['category_id'], $categoryIds);
    $categories[$index]['subcategories'][] = $row;
}

$wishlistCount = mysqli_num_rows(mysqli_query($con, "SELECT * FROM wishlist WHERE uuid='$token'"));
?>

<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Paysup</title>
    <!-- SEO Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="2 Days">
    <meta name="robots" content="ALL">
    <meta name="rating" content="8 YEARS">
    <meta name="Language" content="en-us">
    <meta name="GOOGLEBOT" content="NOARCHIVE">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/fotorama.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.html">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">
</head>

<body>
    <!-- MAIN START -->
    <div class="main">
        <!-- HEADER START -->
        <header class="navbar navbar-custom " id="header">
            <!-- CONTAINER START -->
            <div class="container">
                <!-- ROW START -->
                <div class="row">
                    <!-- HEADER LOGO START-->
                    <div class="col-md-3 col-xs-6">
                        <div class="navbar-header">
                            <a class="navbar-brand page-scroll" href="./">
                                <img alt="Paysup" src="images/logo.png">
                            </a>
                        </div>
                    </div>
                    <!-- HEADER LOGO END-->
                    <!-- HEADER ICONS START-->
                    <div class="col-md-3 col-xs-6 right-side">
                        <div class="header-right-link right-side float-none-xs">
                            <ul>
                                <!-- <li class="search-box">
                                    <a href="#">
                                        <span></span>
                                    </a>
                                </li> -->
                                <li class="cart-icon">
                                    <a href="wishlist.php">
                                        <span>
                                            <small class="cart-notification">
                                                <?= $wishlistCount ?>
                                            </small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- HEADER TOGGLE BUTTON START-->
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- HEADER TOGGLE BUTTON END-->
                    </div>
                    <!-- HEADER ICONS END-->
                    <!-- HEADER MENU START-->
                    <div class="col-md-6 col-sm-12 position-s left-side float-none-xs">
                        <div class="align-center">
                            <div id="menu" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="level">
                                        <a href="./">Home</a>
                                    </li>
                                    <?php foreach ($categories as $category) {
                                    ?>
                                        <li class="level dropdown">
                                            <span class="opener plus"></span>
                                            <a href="shop.php?category_id=<?= $category['id'] ?>" class="page-scroll">
                                                <?= $category['name'] ?>
                                            </a>
                                            <!-- MEGA MENU START-->
                                            <div class="megamenu mobile-sub-menu">
                                                <!-- MEGA MENU TOP START-->
                                                <div class="megamenu-inner-top">
                                                    <ul class="sub-menu-level1">
                                                        <li class="level2 ">
                                                            <ul class="sub-menu-level2">
                                                                <?php foreach ($category['subcategories'] as $subcategory) {
                                                                ?>
                                                                    <li class="level3"><a href="shop.php?category_id=<?= $category['id'] ?>&subcategory_id=<?= $subcategory['id'] ?>"><?= $subcategory['name'] ?></a>
                                                                    </li>
                                                                <?php
                                                                }
                                                                ?>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- MEGA MENU END-->
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <li class="level">
                                        <a href="contact.php" class="page-scroll">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- HEADER MENU END-->
                </div>
                <!-- ROW END -->
            </div>
            <!-- CONTAINER END -->
        </header>
        <!-- HEADER END -->

        <!-- SEARCH POPUP START -->
        <!-- <div class="sidebar-search-wrap">
            <div class="sidebar-table-container">
                <div class="sidebar-align-container">
                    <div class="search-closer right-side"></div>
                    <div class="search-container">
                        <form method="get" id="search-form">
                            <input type="text" id="s" class="search-input" name="s" placeholder="Start Searching">
                        </form>
                        <span>Search and Press Enter</span>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- SEARCH POPUP ENDS -->