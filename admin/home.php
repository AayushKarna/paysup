<?php
require('includes/check-auth.php');
require('includes/db.php');
require('functions/sanitize.php');

if (isset($_SESSION['err'])) {
    $err = $_SESSION['err'];
    unset($_SESSION['err']);
}

if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}

require('includes/header.php');
$pageTitle = "Home Page";
require('includes/sidebar-header.php');
?>

<?php
if (isset($err) && strlen($err) > 0) {
?>
    <div class="alert alert-danger"><?php echo $err; ?></div>
<?php
}

if (isset($success)) {
?>
    <div class="alert alert-success"><?php echo $success; ?></div>
<?php
}
?>
<div class="row">
    Welcome to the admin panel of Paysup! Browse the menu to find what option you need.
</div>
<?php
mysqli_close($con);
require('includes/copyright-footer.php');
require('includes/footer.php');
?>