<?php
  include "connection.php";
  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 10485760){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }

  $name = mysqli_real_escape_string($con, $_POST['name']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $specialist = mysqli_real_escape_string($con, $_POST['special']);
  $sql = "INSERT INTO doctors(name, specialist,address,photo)
          VALUES('{$name}','{$specialist}','{$address}','{$new_name}')";
  $query= mysqli_query($con,$sql) or die("Query Failed");
  header("location:frontliner.php");

?>