<?php
  include "connection.php";
  if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
   

    if($file_size > 10485760){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "medicine/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }
  $name = mysqli_real_escape_string($con,$_POST['name']);
  $des = mysqli_real_escape_string($con,$_POST['desc']);
  $diesese = mysqli_real_escape_string($con,$_POST['diasese']);
  $kefacts = mysqli_real_escape_string($con,$_POST['kefacts']);
  $effect = mysqli_real_escape_string($con,$_POST['se']);
  $etitle = mysqli_real_escape_string($con,$_POST['etitle']);
  $edesc = mysqli_real_escape_string($con,$_POST['edesc']);
  $sql = "INSERT INTO medicine(med_name,med_descreption,disease,kefacts,side_effects,extra_title,extra_desc,med_image)
          VALUES('{$name}','{$des}','{$diesese}','{$kefacts}','{$effect}','{$etitle}','{$edesc}','{$new_name}')";
  $query= mysqli_query($con,$sql) or die("Query Failed");
  header("location:medicine.php");

?>