<?php
include "connection.php";

if(empty($_FILES['new-image']['name'])){
  $new_name = $_POST['old-image'];
}else{
  $errors = array();

  $file_name = $_FILES['new-image']['name'];
  $file_size = $_FILES['new-image']['size'];
  $file_tmp = $_FILES['new-image']['tmp_name'];
  $file_type = $_FILES['new-image']['type'];
 

  if($file_size > 2097152){
    $errors[] = "File size must be 2mb or lower.";
  }

  if($file_size > 2097152){
    $errors[] = "File size must be 2mb or lower.";
  }
  $new_name = time(). "-".basename($file_name);
  $target = "medicine/".$new_name;
  $image_name = $new_name;
  if(empty($errors) == true){
    move_uploaded_file($file_tmp,$target);
  }else{
    print_r($errors);
    die();
  }
}

$sql = "UPDATE medicine SET med_name='{$_POST["name"]}',disease='{$_POST["diasese"]}',kefacts='{$_POST["kefacts"]}',side_effects='{$_POST["se"]}',
extra_title='{$_POST["etitle"]}',med_descreption='{$_POST["desc"]}',extra_desc='{$_POST["edesc"]}',med_image='{$image_name}'
        WHERE med_id={$_POST["id"]}";

$result = mysqli_query($con,$sql);

if($result){
  header("location: medicine.php");
}else{
  echo "Query Failed";
}




?>
