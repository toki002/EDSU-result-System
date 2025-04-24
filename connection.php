<?php
$host="localhost";
$databaseusername="root";
$password="";
$databasename="srms";
$connect= mysqli_connect($host, $databaseusername, $password, $databasename) or die("Error:.mysqli_connect_error()");
if($connect){
    echo"Connection Successful";
} else{
    echo "Error in connection";
}
?>