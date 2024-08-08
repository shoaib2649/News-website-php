<?php
include("config.php");
$id=$_GET['id'];
$del="DELETE FROM user where user_id='{$id}'";
$qu=mysqli_query($con,$del);
if($qu)
{
    header("Location:users.php");
}

?>