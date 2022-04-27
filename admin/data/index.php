<?php
$asset_path = '../';
require '../includes/check-auth.php';
require '../includes/db.php';
require '../includes/getMessages.php';
require '../includes/header.php';
$pageTitle = "Data Page";
require '../includes/sidebar-header.php';
?>

<?php
require "../includes/displayMessages.php";
?>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Edit Data</h4>
      </div>
      <div class="card-body">
        <form action="actions/edit.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          <br>
          <?php
$result = mysqli_query($con, "SELECT * FROM data");
while ($row = mysqli_fetch_array($result)):
?>
          <?=$row['identifier']?><br>
          <input type="text" class="form-control" name="<?=$row['identifier']?>" value="<?=$row['value']?>"><br>

          <?php endwhile;?>

          <div class="text-right">
            <button class="btn btn-primary" type="submit">Update Data</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>

<?php
mysqli_close($con);
require '../includes/copyright-footer.php';
require '../includes/ck_editor.php';
require '../includes/footer.php';
?>