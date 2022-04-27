<?php
require('includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $product_id = sanitize($_POST['product_id']);
  $description = sanitize($_POST['description']);

  $time = time();

  mysqli_query($con, "INSERT INTO wishlist (uuid,product_id,description,timestamp) VALUES ('$token','$product_id','$description','$time')");
}

$wishlist = [];
$result = mysqli_query($con, "SELECT wishlist.*, products.title, products.images FROM wishlist INNER JOIN products ON products.id=wishlist.product_id");

while($row = mysqli_fetch_assoc($result)){
  $wishlist[] = $row;
}
?>


<?php
  $breadCrumbTitle = "Wish List";
  include("includes/breadcrumb.php");
?>

<!-- CONTAIN START -->
<section class="ptb-95">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 mb-xs-30">
                <div class="cart-item-table commun-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Product Name</th>
                                    <th>Order Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            foreach($wishlist as $wishlistItem){
                              $images = $wishlistItem['images'];
                              if (strrpos($images, ",") !== false){
                              $images = explode(',', $images);
                              } else {
                                  $images = [$images];
                              }
                              ?>
                                <tr>
                                    <td>
                                        <div class="product-image"><img alt="<?= $wishlistItem['title'] ?>"
                                                src="images/products/<?= $images[0] ?>"></div>
                                    </td>
                                    <td>
                                        <div class="product-title"> <?= $wishlistItem['title'] ?> </div>
                                    </td>
                                    <td>
                                        <div class="total-price price-box"> <span class="price">

                                                <?= $wishlistItem['description'] ?>
                                            </span> </div>
                                    </td>
                                    <td><a href="delete-from-wishlist.php?id=<?= $wishlistItem['id'] ?>"><i
                                                title="Remove Item From Cart"
                                                class="fa fa-trash cart-remove-item"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-30">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mt-30"> <a href="./" class="btn-color btn"><span><i
                                    class="fa fa-angle-left"></i></span>Continue Shopping</a> </div>
                </div>
                <div class="col-sm-6">
                    <div class="mt-30 right-side float-none-xs"> <a href="request-quotation.php"
                            class="btn-color btn">Request Quotation <i class="fa fa-angle-right"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTAINER END -->

<?php
include('includes/footer.php');
?>