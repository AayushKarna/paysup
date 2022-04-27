<div class="sidebar" data-color="blue" data-background-color="white">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <img src="<?php echo $asset_path ?? ''; ?>../images/logo.png"
                style="width:80%; height:60px; object-fit: contain;" />
        </a>
    </div>
    <div class="sidebar-background" style="background: url('assets/img/sidebar-1.jpg')"></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?=$asset_path ?? '';?>home.php">
                    <i class="material-icons">home</i>
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$asset_path ?? '';?>products">
                    <i class="material-icons">work</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$asset_path ?? '';?>categories">
                    <i class="material-icons">post_add</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$asset_path ?? '';?>subcategories">
                    <i class="material-icons">post_add</i>
                    <p>SubCategories</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=$asset_path ?? '';?>configs">
                    <i class="material-icons">dashboard</i>
                    <p>Configs</p>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?=$asset_path ?? '';?>logout.php">
                    <i class="material-icons">power_settings_new</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#pablo"><?php echo $pageTitle; ?></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">