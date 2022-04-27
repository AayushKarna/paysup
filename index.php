<?php
require('includes/header.php');

$featured = [];
$new = [];
$exclusive = [];

$result = mysqli_query($con, "SELECT * FROM products WHERE is_top='1' OR is_new='1' OR is_exclusive='1'");
while($row = mysqli_fetch_assoc($result)){
  if ($row['is_top'] == 1){
    $featured[] = $row;
  }
  if ($row['is_new'] == 1){
    $new[] = $row;
  }
  if ($row['is_exclusive'] == 1){
    $exclusive[] = $row;
  }
}
?>

<!-- FEATURED PRODUCT AREA START -->
<section class="ptb-95">
    <div class="container">
        <!-- PRODUCT-LISTING MAIN CLASS START -->
        <div class="product-listing">
            <!-- TAB SECTION HEADING START -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="heading-part align-center mb-30">
                        <div id="tabs" class="category-bar">
                            <ul class="tab-stap">
                                <li><a class="tab-step1 selected" title="step1">Featured</a></li>
                                <li><a class="tab-step2" title="step2">New Arrivals</a></li>
                                <li><a class="tab-step3" title="step3">Exclusive</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TAB SECTION HEADING ENDS -->
            <!-- TAB SECTION CONTENT START -->
            <div class="row mlr_-20">
                <div id="items">
                    <div class="tab_content pro_cat">
                        <ul>
                            <li>
                                <!-- ALL TAB CONTENT START -->
                                <div id="data-step1" class="items-step1 product-slider-main position-r selected"
                                    data-temp="tabdata">
                                    <?php foreach($featured as $product){
                                    ?>
                                    <div class="col-lg-3 col-sm-4 col-xs-6 plr-20 mb-30">
                                        <?php include('includes/build-product.php');?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- ALL TAB CONTENT ENDS -->
                            </li>
                            <li>
                                <!-- FEATURED TAB CONTENT START -->
                                <div id="data-step2" class="items-step2 product-slider-main position-r"
                                    data-temp="tabdata">
                                    <?php foreach($new as $product){
                                      
                                      ?>
                                    <div class="col-lg-3 col-sm-4 col-xs-6 plr-20 mb-30">
                                        <?php include('includes/build-product.php');?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- FEATURED TAB CONTENT ENDS -->
                            </li>
                            <li>
                                <!-- MOST VIEWED TAB CONTENT START -->
                                <div id="data-step3" class="items-step3 product-slider-main position-r"
                                    data-temp="tabdata">
                                    <?php foreach($exclusive as $product){
                                      ?>
                                    <div class="col-lg-3 col-sm-4 col-xs-6 plr-20 mb-30">
                                        <?php include('includes/build-product.php');?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- MOST VIEWED TAB CONTENT ENDS -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- TAB SECTION CONTENT ENDS -->
        </div>
        <!-- PRODUCT-LISTING MAIN CLASS START -->
    </div>
</section>
<!-- FEATURED PRODUCT AREA ENDS -->
<?php
require('includes/footer.php');
?>