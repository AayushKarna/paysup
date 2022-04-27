<?php
require('includes/header.php');
?>


<?php
  $breadCrumbTitle = "Contact";
  include("includes/breadcrumb.php");
?>

<!-- CONTAIN START-->
<!-- CONTACT DETAILS START-->
<section class="pt-95 client-main align-center">
    <div class="container">
        <div class="contact-info">
            <div class="row m-0">
                <div class="col-sm-4 col-xs-4 p-0">
                    <div class="contact-box">
                        <div class="contact-icon contact-phone-icon"></div>
                        <span><b>Tel</b></span>
                        <p><?= $config['PHONE'] ?></p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4 p-0">
                    <div class="contact-box">
                        <div class="contact-icon contact-mail-icon"></div>
                        <span><b>Mail</b></span>
                        <p><?= $config['EMAIL'] ?></p>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4 p-0">
                    <div class="contact-box">
                        <div class="contact-icon contact-open-icon"></div>
                        <span><b>Open</b></span>
                        <p><?= $config['OPENING_TIME'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CONTACT DETAILS START-->

<!-- FORM AND MAP START-->
<section class="ptb-95">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="map">
                    <div class="map-part">
                        <iframe src="<?= $config['MAP_URL'] ?>" width="100%" height="450" frameborder="0"
                            style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FORM AND MAP END-->
<!-- CONTAINER END -->

<?php
include('includes/footer.php');
?>