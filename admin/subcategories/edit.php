<?php
$asset_path = '../';
require('../includes/check-auth.php');
require('../includes/db.php');
require('../includes/getMessages.php');
require('../includes/header.php');
$pageTitle = "Edit SubCategory Page";
require('../includes/sidebar-header.php');
$id = $_GET['id'] ?? "";
$subcategory = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM subcategories WHERE id='$id'"));

$categories = [];

$result = mysqli_query($con, "SELECT * FROM categories");
while($row = mysqli_fetch_assoc($result)){
  $categories[] = $row;
}
?>

<?php
require("../includes/displayMessages.php");
?>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Edit SubCategory</h4>
      </div>
      <div class="card-body">
        <form action="actions/edit.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $id ?>">
          <br>
          SubCategory Name:<br/>
          <input type="text" class="form-control" placeholder="Category Name" name="title" value="<?= $subcategory['name'] ?>"><br>

          Select Category: <br>
          <select class="form-control" name="category_id">
          <?php foreach($categories as $cat){ ?> 
            <option value='<?= $cat['id']; ?>' <?= ($subcategory['category_id'] === $cat['id']) ? 'selected' : '';?>><?= $cat['name']; ?></option>
          <?php } ?>
          </select>
          <br>
          
          <div class="text-right">
            <button class="btn btn-primary" type="submit">Edit Category</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>
<?php
mysqli_close($con);
require('../includes/copyright-footer.php');
require('../includes/footer.php');
?>