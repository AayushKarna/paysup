<?php
$asset_path = '../';
require('../includes/check-auth.php');
require('../includes/db.php');
require('../includes/getMessages.php');
require('../includes/header.php');
$pageTitle = "Configuration Page";
require('../includes/sidebar-header.php');
$configs = [];

$result = mysqli_query($con, "SELECT * FROM configs");
while($row=mysqli_fetch_assoc($result)){
  $configs[] = $row;
}
?>

<?php
require("../includes/displayMessages.php");
?>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Update Site Configs</h4>
      </div>
      <div class="card-body">
        <form action="actions/update.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          <br>
          <?php foreach($configs as $config){ ?>
          <div class="form-group">
            <?= $config['identifier'] ?>: <br>
            <input type="text" class="form-control" name="<?= $config['identifier'] ?>" value="<?= $config['value'] ?>"><br>
          </div>
          <?php } ?>
          <div class="text-right">
            <button class="btn btn-primary" type="submit">Save Changes</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>
<?php
mysqli_close($con);
require('../includes/copyright-footer.php');
require('../includes/ck_editor.php');
require('../includes/footer.php');
?>