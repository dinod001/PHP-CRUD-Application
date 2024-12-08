<?php
include('database.php');

if(isset($_POST['Add'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];

    if($fname==""||empty($fname)){
        header('location:index.php?message=Please enter the first name');
    }
    elseif($lname==""||empty($lname)){
        header('location:index.php?message=Please enter the last name');
    }
    elseif($age==""||empty($age)){
        header('location:index.php?message=Please enter the age');
    }
    else{
        $sql = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', $age)";
        $reult=mysqli_query($connection,$sql);

        if(!$reult){
            die("Query failed".mysqli_error($connection));
        }
        else{
            header('location:index.php?inst_msg=Your data has been added successfully !');
        }
    }
}


?>