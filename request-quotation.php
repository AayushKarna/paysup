<?php
require('includes/header.php');
?>


<?php
  $breadCrumbTitle = "Request Quotation";
  include("includes/breadcrumb.php");
?>

<!-- CONTAIN START -->
<section class="checkout-section ptb-95">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="checkout-content">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
                            <form action="#" class="main-form full">
                                <div class="mb-20">
                                    <div class="row">
                                        <div class="col-xs-12 mb-20">
                                            <div class="heading-part align-center">
                                                <h3 class="sub-heading">About Yourself</h3>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box">
                                                <input type="text" required placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box">
                                                <input type="text" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box">
                                                <input type="email" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box">
                                                <input type="text" required placeholder="Contact Number">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="input-box">
                                                <button type="submit" class="btn btn-color" style="width:100%;">Request
                                                    Quotation</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTAINER END -->

<?php
  include("includes/footer.php");
?>