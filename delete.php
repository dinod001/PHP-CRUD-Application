<?php
include('database.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM `students` WHERE `id`=$id";
    $result=mysqli_query($connection,$sql);

    if(!$result){
        die("query failed".mysqli_error($connection));
    }
    else{
        header("location:index.php?delete_msg=Delted succesfully");
    }
}

?>