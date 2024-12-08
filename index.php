<?php
include('header.php');
include('database.php')
?>
    <div class="box1">
        <h2>All Students</h2>
        <button class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">Add students</button>
    </div>

    <table class="table table:hover table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <tr>
            <?php
            //readin data from database
            $sql="SELECT * FROM `students`";
            $result=mysqli_query($connection,$sql);

            while($row=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        <td><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Update</a></td>
                    </tr>
                <?php
            }

            ?>   
    </table>

    <?php
        if(isset($_GET['message'])){
            echo "<h6>".$_GET['message']."</h6>";
        }
        if(isset($_GET['inst_msg'])){
            echo "<h6>".$_GET['inst_msg']."</h6>";
        }
        if(isset($_GET['delete_msg'])){
            echo "<h6>".$_GET['delete_msg']."</h6>";
        }
    ?>
    <form action="insertdata.php" method="post">
        <!--model-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="Add" value="Add" class="btn btn-success">
            </div>
            </div>
        </div>
        </div>
    </form>
<?php
include('footer.php');
?>  