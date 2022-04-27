<?php
require('includes/header.php');
?>
<!-- CONTAIN START ptb-95-->
<section class="ptb-95 gray-bg error-block-main">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="error-block-detail">
                    <div class="align-center">
                        <div class="error-small-text" style="line-height: 5rem;">Your quotation has been sent!</div>
                        <div class="error-slogan">Thanks for your request, and interest in our service. We wish you a
                            good rest of the day. You can follow us on Facebook and Instagram too, for more updates.
                        </div>
                        <ul class="social-icon mb-20">
                            <li><a target="_blank" href="<?= $config['FACEBOOK_URL'] ?>" title="Facebook"
                                    class="facebook"><i class="fa fa-facebook"> </i></a></li>
                            <li><a target="_blank" href="<?= $config['INSTAGRAM_URL'] ?>" title="Instagram"
                                    class="twitter"><i class="fa fa-instagram"> </i></a></li>
                            </li>
                        </ul>
                        <div class="mt-40"> <a href="./" class="btn btn-color">Back to Home</a> </div>
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