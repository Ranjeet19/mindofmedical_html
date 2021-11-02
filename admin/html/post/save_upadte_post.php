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
  $target = "post_img/".$new_name;
  $image_name = $new_name;
  if(empty($errors) == true){
    move_uploaded_file($file_tmp,$target);
  }else{
    print_r($errors);
    die();
  }
}

$sql = "UPDATE post SET title='{$_POST["title"]}',descreption='{$_POST["subject"]}',image='{$image_name}'
        WHERE id={$_POST["id"]}";

$result = mysqli_multi_query($con,$sql);

if($result){
  header("location:post.php");
}else{
  echo "Query Failed";
}




?>
