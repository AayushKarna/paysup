<?php
$asset_path = '../';
require('../includes/check-auth.php');
require('../includes/db.php');
require('../includes/getMessages.php');
require('../includes/header.php');
$pageTitle = "SubCategories Page";
require('../includes/sidebar-header.php');
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
        <h4 class="card-title ">Add Sub-Category</h4>
      </div>
      <div class="card-body">
        <form action="actions/create.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          <br>
          <input type="text" class="form-control" placeholder="Sub-Category Name" name="title"><br>
          Select Category: <br>
          <select class="form-control" name="category_id">
          <?php foreach($categories as $cat){ ?> 
            <option value='<?= $cat['id']; ?>'><?= $cat['name']; ?></option>
          <?php } ?>
          </select>
          <br>
          <div class="text-right">
            <button class="btn btn-primary" type="submit">Add Sub-Category</button>
          </div>
        </form>


      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Current Sub-Categories</h4>
      </div>
      <div class="card-body">
        <table class="table" id="dataTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = mysqli_query($con, "SELECT subcategories.id,subcategories.name,categories.name as category_name FROM subcategories INNER JOIN categories ON subcategories.category_id=categories.id ORDER BY categories.name ASC");
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td>
                  <a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-info btn-sm">Edit</button></a>
                  <a href="actions/delete.php?id=<?php echo $row['id']; ?>" onclick="confirm('Are you Sure that you want ot delete')"><button class="btn btn-danger btn-sm">Delete</button></a>
                </td>
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
<?php
mysqli_close($con);
require('../includes/copyright-footer.php');
require('../includes/ck_editor.php');
require('../includes/footer.php');
?>