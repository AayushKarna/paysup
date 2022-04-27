<?php
if (isset($err) && strlen($err) > 0) {
?>
    <div class="alert alert-danger"><?php echo $err; ?></div>
<?php
}

if (isset($success) && strlen($success) > 0) {
?>
    <div class="alert alert-success"><?php echo $success; ?></div>
<?php
}
?>