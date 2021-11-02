<?php
include"connection.php";
$id=$_GET['id'];
$sql="DELETE FROM doctors WHERE id = '{$id}'";
$query=mysqli_query($con,$sql) or die("Query Failed");
header("location:frontliner.php");



?>