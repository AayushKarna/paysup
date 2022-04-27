      <!-- FOOTER START -->
      <div class="footer">
          <div class="footer-inner">
              <hr>
              <div class="footer-bottom top">
                  <div class="container">
                      <div class="col-sm-12 align-center">
                          <div class="copy-right center-xs">Copyright © 2021 All Rights Reserved. Paysup.</div>
                      </div>
                  </div>
              </div>
              <hr>
              <div class="bottom">
                  <div class="container">
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="footer_social pt-xs-15 center-xs mt-xs-15 align-center">
                                  <ul class="social-icon">
                                      <li><a target="_blank" href="<?= $config['FACEBOOK_URL'] ?>" title="Facebook"
                                              class="facebook"><i class="fa fa-facebook"> </i></a></li>
                                      <li><a target="_blank" href="<?= $config['INSTAGRAM_URL'] ?>" title="Twitter"
                                              class="twitter"><i class="fa fa-instagram"> </i></a></li>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="scroll-top">
          <div id="scrollup"></div>
      </div>
      <!-- FOOTER END -->
      </div>
      <!-- MAIN END -->
      <!-- JS FILES STARTS -->
      <script src="js/jquery-1.12.3.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery-ui.min.js"></script>
      <script src="js/fotorama.js"></script>
      <script src="js/jquery.magnific-popup.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/custom.js"></script>
      <?php 
        if (isset($requiresCK)) {
          include('admin/includes/ck_editor.php');
        }
      ?>
      <!-- JS FILES END -->
      </body>

      </html>