<?php include "config.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <?php
                    include("config.php");
                    $limit=3;
                    
                   
if(isset($_GET['page']))
{
    $page=$_GET['page'];  
}
else
{
    $page=1;
}
                    
                    $offset=($page-1)*$limit;
                    $fet = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";
                    $query = mysqli_query($con, $fet) or die("Query failed");
                    // die();
                    $getalldata = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <thead>
                            <th>S.No.</th>
                            <th>Full Name</th>

                            <th>User Name</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($getalldata as $v) { ?>
                                <tr>
                                    <td><?php echo $v['user_id'] ?></td>
                                    <td><?php echo $v['first_name'] . " " . $v['last_name'] ?></td>
                                    <td><?php echo $v['username'] ?></td>
                                    <td>
                                        <?php
                                        if ($v['role'] == 0) {
                                            echo "Normal";
                                        } 
                                        else
                                            echo "Admin";
                                        ?>
                                    </td>


                                    <td class='edit'><a href='update-user.php?id=<?php echo$v['user_id'] ?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-user.php?id=<?php echo $v['user_id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                </table>
            <?php
                    }
                    $sql1="SELECT * FROM user ";
                    $res=mysqli_query($con,$sql1);
                    
                    if(mysqli_num_rows($res)>0)
                    {
                        $total=mysqli_num_rows($res);
                        $tot=ceil($total/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page>1)
                    {

     echo '<li><a href="users.php?page='.($page-1).'">Prev</a></li>';
                    }
                    for($i=1;$i<=$tot;$i++)
                    {
                        if($i==$page)
                        {
                            $active="active";
                        }
                        else
                        {
                            $active="";
                        }
                echo '<li class ="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($tot>$page)
                    {
                        echo '<li><a href="users.php?page='.($page+1).'">Next</a></li>';
                    }
                    echo "</ul>";
                    }
            ?>

            </div>
        </div>
    </div>
</div>
<!-- <?php include "header.php"; ?> -->