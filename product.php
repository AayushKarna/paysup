<?php
require('includes/header.php');

$product_id = sanitize($_GET['id']);
$product = mysqli_fetch_assoc(mysqli_query($con, "SELECT products.*, categories.name as category_name, subcategories.name as subcategory_name FROM products INNER JOIN categories ON categories.id=products.category_id INNER JOIN subcategories ON subcategories.id=products.subcategory_id WHERE products.id='$product_id'"));
?>


<?php
$breadCrumbTitle = "Product";
include("includes/breadcrumb.php");
?>

<!-- CONTAIN START -->
<section class="pt-95">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4 col-sm-4 col-xs-5">
                    <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
                        <?php
                        $images = $product['images'];
                        if (strrpos($images, ",") !== false) {
                            $images = explode(',', $images);
                        } else {
                            $images = [$images];
                        }

                        $sizes = $product['sizes'];
                        if (strrpos($sizes, ",") !== false) {
                            $sizes = explode(',', $sizes);
                        } else {
                            unset($sizes);
                        }

                        $colors = $product['colors'];
                        if (strrpos($colors, ",") !== false) {
                            $colors = explode(',', $colors);
                        } else {
                            unset($colors);
                        }

                        $materials = $product['materials'];
                        if (strrpos($materials, ",") !== false) {
                            $materials = explode(',', $materials);
                        } else {
                            unset($materials);
                        }

                        foreach ($images as $image) {
                        ?>
                            <a href="#">
                                <img src="images/products/<?= $image ?>" alt="<?= $product['title'] ?>">
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-7">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="product-detail-main">
                                <div class="product-item-details">
                                    <h1 class="product-item-name"><?= $product['title'] ?></h1>
                                    <h5>Price: <?= $product['price'] ?></h5>
                                    <div class="rating-summary-block">
                                        <div class="badge"><?= $product['category_name'] ?></div>
                                        <div class="badge"><?= $product['subcategory_name'] ?></div>
                                    </div>
                                    <!-- <div class="price-box"> <span class="price">$80.00</span> <del
                                            class="price old-price">$100.00</del> </div> -->
                                    <!-- <div class="product-info-stock-sku">
                                        <div>
                                            <label>Availability: </label>
                                            <span class="info-deta">In stock</span>
                                        </div>
                                        <div>
                                            <label>SKU: </label>
                                            <span class="info-deta">20MVC-18</span>
                                        </div>
                                    </div> -->
                                    <p><?= $product['description'] ?></p>
                                    <?php if (isset($sizes)) {
                                    ?>
                                        <div class="product-size select-arrow mb-20 mt-30">
                                            <label>Available Sizes</label><br>
                                            <?php foreach ($sizes as $i => $val) {
                                            ?>
                                                <div class="badge"><?= $val ?>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    } ?>
                                    <?php if (isset($colors)) {
                                    ?>
                                        <div class="product-size select-arrow mb-20 mt-30">
                                            <label>Available Colors</label><br>
                                            <?php foreach ($colors as $i => $val) {
                                            ?>
                                                <div class="badge"><?= $val ?>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    } ?>
                                    <?php if (isset($materials)) {
                                    ?>
                                        <div class="product-size select-arrow mb-20 mt-30">
                                            <label>Available Materials</label><br>
                                            <?php foreach ($materials as $i => $val) {
                                            ?>
                                                <div class="badge"><?= $val ?>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    } ?>
                                    <div class="mb-20">
                                        <form method="POST" action="wishlist.php">
                                            <label>Describe Your Order</label><br>
                                            <input type="hidden" name="product_id" value='<?= $product_id ?>'>
                                            <textarea name="description" id="ck_editor"></textarea>
                                            <div class="bottom-detail cart-button">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <button title="Add to Wishlist" class="btn-color btn">Add to
                                                            WishList</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CONTAINER END -->

<?php
$requiresCK = true;
include('includes/footer.php');
?>