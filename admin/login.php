<?php
session_start();
require('includes/vars.php');

$auth = $_SESSION['auth'] ?? "";

$authKey = md5($key);

if ($auth === $authKey){
    header("Location: home.php");
    die();
}

if (isset($_POST['username'])){
    
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";
    
    if ($username === $adminUser && $password === $adminPass){
        $_SESSION["auth"] = $authKey;
        header("Location: home.php");
        die();
    } else {
        $err = "Invalid login details!";
    }
}
require("includes/header.php");
?>
<div
class="container-fluid"
style="display: flex;justify-content: space-around;height: 100vh;"
>
    <div class="col-md-3 my-auto">
        <?php 
        if (isset($err)){
        ?>  
        <div class="alert alert-danger"><?php echo $err;?></div>
        <?php
        }
        ?>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Login for Panel</h4>
          </div>
          <div class="card-body">
            <br />
            <form action="" method="POST">
              <input
                type="text"
                class="form-control"
                placeholder="Username"
                name="username"
              />
              <br />
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                name="password"
              />
              <br />
              <div class="text-right">
                <button class="btn btn-primary" type="submit">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
<?php
require("includes/footer.php");
?>
