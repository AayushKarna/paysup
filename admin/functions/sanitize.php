<?php
function sanitize($s){
    global $con;
    return mysqli_real_escape_string($con, $s);
}
?>