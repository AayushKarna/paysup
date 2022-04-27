<?php
$asset_path = '../';
require('../includes/check-auth.php');
require('../includes/db.php');
require('../includes/getMessages.php');
require('../includes/header.php');
$pageTitle = "Categories Page";
require('../includes/sidebar-header.php');
?>

<?php
require("../includes/displayMessages.php");
?>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Add Category</h4>
      </div>
      <div class="card-body">
        <form action="actions/create.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          <br>
          <input type="text" class="form-control" placeholder="Category Title" name="title"><br>
          <div class="text-right">
            <button class="btn btn-primary" type="submit">Add Category</button>
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
        <h4 class="card-title ">Current Categories</h4>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = mysqli_query($con, "SELECT id,name FROM categories ORDER BY id DESC");
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
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