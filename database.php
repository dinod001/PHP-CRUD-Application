<?php
define("hostname","localhost:3308");
define("username","root");
define("password","");
define("database","students");

$connection=mysqli_connect(hostname,username,password,database);

if(!$connection){
    echo "Unsuccesfully";
}

?>