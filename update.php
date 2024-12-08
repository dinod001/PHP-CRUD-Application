<?php
include('header.php');
include('database.php')

?>

<?php

    //gettting value from database
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM `students` WHERE `id`=$id";
        $result=mysqli_query($connection,$sql);
        $row=mysqli_fetch_assoc($result);
    };


?>

<?php
if (isset($_POST['Update'])) {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];

    $sql = "UPDATE students SET first_name = '$fname', last_name = '$lname', age = $age WHERE id = $id";
    $reult=mysqli_query($connection,$sql);

    if(!$reult){
        die("Query failed".mysqli_error($connection));
    }
    else{
        header('location:index.php?inst_msg=Your data has been updated successfully !');
    }
}
    

    
?>

<form action="update.php?id=<?php echo $id ?>" method="post">
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" name="fname" class="form-control" value=<?php echo $row['first_name']?>>
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" class="form-control" value=<?php echo $row['last_name'] ?>>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value=<?php echo $row['age'] ?>>
    </div>
    <input type="submit" name="Update" value="UPDATE" class="btn btn-success" >
</form>
