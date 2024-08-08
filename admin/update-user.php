<?php include "header.php"; ?>
<?php
include ("config.php");
$id = $_GET['id'];
$get = "SELECT * FROM user where user_id={$id}";
$query_run = mysqli_query($con, $get);
$result = mysqli_fetch_assoc($query_run);
if (isset($_POST['submit'])) {


    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $userid = mysqli_real_escape_string($con, $_POST['user_id']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $user = mysqli_real_escape_string($con, $_POST['username']);
    // $pass=mysqli_real_escape_string($con,md5($_POST['password']));
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $qury = "UPDATE user set first_name='{$fname}',last_name='{$lname}',username='{$user}',
    role='{$role}' where user_id='{$id}'";
    $quer_ext = mysqli_query($con, $qury) or die("query faild");
    if ($quer_ext) {
        header("Location:users.php");
    }
}


?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Table Form -->
                <table>


                </table>
                <!-- Form Start -->
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control"
                            value="<?php echo $result['user_id']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control"
                            value="<?php echo $result['first_name']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $result['last_name']; ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control"
                            value="<?php echo $result['username']; ?>" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                            if ($result['role'] == 0) {
                                echo '<option value="0" selected>Normal User</option>';
                                echo ' <option value="1" >Admin</option>';
                            } else {
                                echo '<option value="0">Normal User</option>';
                                echo ' <option value="1" selected>Admin</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <!-- /Form -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>