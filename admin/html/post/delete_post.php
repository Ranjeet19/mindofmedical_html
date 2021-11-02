<?php
include"connection.php";
$id=$_GET['id'];
$sql="DELETE FROM post WHERE id='{$id}'";
$query=mysqli_query($con,$sql);
header("location:post.php");



?>