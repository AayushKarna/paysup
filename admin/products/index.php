<?php
$asset_path = '../';
require '../includes/check-auth.php';
require '../includes/db.php';
require '../includes/getMessages.php';
require '../includes/header.php';
$pageTitle = "Products Page";
require '../includes/sidebar-header.php';
$categories = [];

$result = mysqli_query($con, "SELECT * FROM categories");
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

$subcategories = [];

$result = mysqli_query($con, "SELECT * FROM subcategories");
while ($row = mysqli_fetch_assoc($result)) {
    $subcategories[] = $row;
}
?>

<?php
require "../includes/displayMessages.php";
?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Add Product</h4>
            </div>
            <div class="card-body">
                <form action="actions/create.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <br>
                    <input type="text" class="form-control" placeholder="Product Title" name="title"><br>
                    <input type="text" class="form-control" placeholder="Product Price" name="price"><br>
                    Description: <br>
                    <textarea name="description" id="ck_editor"></textarea><br>
                    Select Category: <br>
                    <select class="form-control" name="category_id" onchange="onChangeCategory(this);">
                        <option value='N/A' disabled selected>Select Category</option>
                        <?php foreach ($categories as $cat) { ?>
                            <option value='<?= $cat['id']; ?>'><?= $cat['name']; ?></option>
                        <?php } ?>
                    </select><br />
                    Select SubCategory: <br>
                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                        <option value='N/A' disabled selected>Select SubCategory</option>
                    </select><br />
                    Sizes (Comma Separated): <br>
                    <textarea name="sizes" class="form-control" placeholder="S,M,L,XL,XXL"></textarea><br>
                    Colors (Comma Separated): <br>
                    <textarea name="colors" class="form-control" placeholder="Red,Blue,Green"></textarea><br>
                    Materials (Comma Separated): <br>
                    <textarea name="materials" class="form-control" placeholder="Glass, Metal, Plastic, Matt Finish"></textarea><br>
                    <br>
                    Select Images:<br>
                    <input type="file" name="files" /><br><br>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Add Product</button>
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
                <h4 class="card-title ">Current Products</h4>
            </div>
            <div class="card-body">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sub Category</th>
                            <th scope="col">Attributes</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($con, "SELECT products.*,categories.name as category_name, subcategories.name as subcategory_name FROM products INNER JOIN categories ON categories.id=products.category_id INNER JOIN subcategories ON subcategories.id=products.subcategory_id ORDER BY products.id DESC");
                        while ($row = mysqli_fetch_array($result)) {
                            $images = $row['images'];
                            if (strrpos($images, ",") !== false) {
                                $images = explode(',', $images);
                            } else {
                                $images = [$images];
                            }
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><img style="height:64px;width:64px; object-fit:cover;" src="../../images/products/<?= $images[0] ?>">&nbsp;&nbsp;<?php echo $row['title']; ?>
                                </td>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['subcategory_name'] ?></td>
                                <td>
                                    <?= $row['is_top'] == 1 ? "<span class='badge badge-primary'>Top</span>" : "" ?>
                                    <?= $row['is_new'] == 1 ? "<span class='badge badge-success'>New</span>" : "" ?>
                                    <?= $row['is_exclusive'] == 1 ? "<span class='badge badge-warning'>Exclusive</span>" : "" ?>
                                </td>
                                <td>

                                    <a href="actions/edit.php?id=<?php echo $row['id']; ?>&col=is_top"><button class="btn btn-info btn-sm">
                                            <?= $row['is_top'] == 1 ? "Remove" : "Add" ?> Top</button></a><br />
                                    <a href="actions/edit.php?id=<?php echo $row['id']; ?>&col=is_new"><button class="btn btn-success btn-sm">
                                            <?= $row['is_new'] == 1 ? "Remove" : "Add" ?> New</button></a><br />
                                    <a href="actions/edit.php?id=<?php echo $row['id']; ?>&col=is_exclusive"><button class="btn btn-warning btn-sm">
                                            <?= $row['is_exclusive'] == 1 ? "Remove" : "Add" ?> Exclusive</button></a><br />
                                    <a href="actions/delete.php?id=<?php echo $row['id']; ?>" onclick="confirm('Are you Sure that you want ot delete')"><button class="btn btn-danger btn-sm">Delete Product</button></a>
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
<script>
    const subcategories = [
        <?php
        foreach ($subcategories as $subcategory) {
        ?> {
                id: <?= $subcategory['id']; ?>,
                name: '<?= $subcategory['name']; ?>',
                category_id: <?= $subcategory['category_id']; ?>,
            },
        <?php
        }
        ?>
    ];

    const subcategory = document.querySelector("#subcategory_id");

    function onChangeCategory(el) {
        const items = subcategories.filter(s => s.category_id == el.value);
        let html = '';
        items.forEach(item => {
            html += `<option value='${item.id}'>${item.name}</option>`
        })
        subcategory.innerHTML = html;
    }
</script>
<?php
mysqli_close($con);
require '../includes/copyright-footer.php';
require '../includes/ck_editor.php';
require '../includes/footer.php';
?>