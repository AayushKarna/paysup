<?php
require('includes/header.php');

$category_id = sanitize($_GET['category_id'] ?? 0);
$subcategory_id = sanitize($_GET['subcategory_id'] ?? 0);

function filterCategory($cat){
  global $category_id;
	return $cat['id'] == $category_id;
}

$categoriesFiltered = array_filter($categories, "filterCategory");

$key = key($categoriesFiltered);

$category = $categoriesFiltered[$key];

$products = [];
$query = "SELECT * FROM products WHERE category_id='$category_id'";

if ($subcategory_id != 0){
  $query .= " AND subcategory_id='$subcategory_id'";
}

$result = mysqli_query($con, $query);
$total = mysqli_num_rows($result);

$page = intval($_GET['page'] ?? 1);
$perPage = 24;
$skip = ($page - 1) * $perPage;

$pageCount = ceil($total / $perPage);

$query .= " ORDER BY id DESC LIMIT $skip,$perPage";

$result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result)){
  $products[] = $row;
}
?>


<?php
  $breadCrumbTitle = $category['name'];
  include("includes/breadcrumb.php");
?>

<!-- CONTAIN START -->
<section class="ptb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 mb-sm-30 sidebar-col">
                <div class="sidebar-block">
                    <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
                        <div class="sidebar-title">
                            <h3>Sub Categories</h3> <span></span>
                        </div>
                        <div class="sidebar-contant">
                            <ul>
                                <?php 
                              foreach($category['subcategories'] as $subcategory){
                                ?>
                                <li><a href="shop.php?category_id=<?= $category_id ?>&subcategory_id=<?= $subcategory['id'] ?>"
                                        style="<?= $subcategory['id'] == $subcategory_id ? "color:#ff0735;" : ""; ?>"><?= $subcategory['name'] ?></a>
                                </li>
                                <?php
                              }
                              ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 content-col">
                <div class="shorting mb-30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="view">
                                <div class="list-types grid active ">
                                    <div class="grid-icon list-types-icon"></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="show-item right-side float-left-sm"> <span>Show</span>
                                <div class="select-item">
                                    <select>
                                        <option value="" selected="selected">24</option>
                                    </select>
                                </div>
                                <span>Per Page</span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-listing">
                    <div class="inner-listing">
                        <div class="row mlr_-20">
                            <div class="col-md-4 col-xs-6 plr-20 mb-30">
                                <?php foreach($products as $product){
                                include('includes/build-product.php');
                              }
                              ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="pagination-bar">
                                    <ul>
                                        <li><a
                                                <?= $page == 1 ? "" : "href='shop.php?category_id=$category_id&subcategory_id=$subcategory_id&page=".($page - 1)."'" ?>><i
                                                    class="fa fa-angle-left"></i></a></li>
                                        <?php for($i = 1;$i <= $pageCount;$i++){
                                            ?>
                                        <li class="<?= $i == $page ? "active" : "" ?>"><a
                                                <?= $i == $page ? "" : "href='shop.php?category_id=$category_id&subcategory_id=$subcategory_id&page=$i'" ?>><?= $i ?></a>
                                        </li>
                                        <?php
                                          }
                                          ?>
                                        <li><a
                                                <?= $page == $pageCount ? "" : "href='shop.php?category_id=$category_id&subcategory_id=$subcategory_id&page=".($page + 1)."'" ?>><i
                                                    class="fa fa-angle-right"></i></a></li>
                                    </ul>
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
require('includes/footer.php');
?>