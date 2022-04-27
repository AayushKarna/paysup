<?php
$images = $product['images'];
if (strrpos($images, ",") !== false) {
    $images = explode(',', $images);
} else {
    $images = [$images];
}
?>
<div class="product-item">
    <?php if ($product['is_new'] == 1) {
    ?>
        <div class="new-label"><span>New</span></div>
    <?php
    }
    ?>
    <?php if ($product['is_top'] == 1) {
    ?>
        <div class="sale-label"><span>Featured</span></div>
    <?php
    }
    ?>
    <div class="product-image">
        <a href="product.php?id=<?= $product['id'] ?>"></a>
        <img src="images/products/<?= $images[0] ?>" alt="<?= $product['title'] ?>">
    </div>
    <div class="product-item-details align-center">

        <div class="product-item-name">
            <a href="product.php?id=<?= $product['id'] ?>"><?= $product['title'] ?></a>
            Rs. <?= $product['price'] ?>
        </div>
    </div>
    <div class="product-detail-inner align-center">
        <div class="detail-inner-left">
            <a href="product.php?id=<?= $product['id'] ?>" class="btn btn-color" style="width:100%">View in Detail</a>
        </div>
    </div>
</div>