<?php
include"connection.php";
$id=$_GET['id'];
$sql="DELETE FROM medicine WHERE med_id='{$id}'";
$query=mysqli_query($con,$sql) or die("Query Failed");

header("location:medicine.php");


?>