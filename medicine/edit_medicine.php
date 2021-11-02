

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../index_admin.css">
    <link rel="stylesheet" href="add_medicine.css">
    <link rel="stylesheet" href="../../../font/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoM Admin Pannel..</title>
    <link rel="icon" href="../img/images/moma.png">
</head>

<!-- thid is a header part -->
<header class="header">
    <div class="logo">
        <img class="img_logo" src="../../../img/moma.jpg">
        <div class="logo_title">
            <h2 class="logo_name">Mind Of Medical</h2>
            <p class="logo_room">Admin Room</p>
        </div>
     
    </div>


    <div class="nav">
        <ul class="ul_nav">
            <li class="ul_nav_li"><i class="far fa-bell"></i></li>
            <li class="ul_nav_li"><i class="far fa-comments"></i></li>


        </ul>

        <div class="admin">
            <img class="admin_img" src="../../../img/ran.jpg">
            <p class="admin_name" >Admin</p>
        </div>
    </div>


</header>
<body>
    
    <div class="container">
        <!-- this is first div part where quick link is available -->
        <div class="first_div">
            <ul class="ul_list" id="myDIV">
                <a href="../../index.html"> <li class="li_list"><i class="fas fa-tachometer-alt"></i> Dashboard</li></a>
                <a href="../frontliner.html"><li class="li_list"><i class="fas fa-user-md"></i> Doctors</li></a>
                <a href="../diesease/diesease.html"> <li class="li_list "><i class="fas fa-allergies"></i> Diesease</li></a>
                <a href="medicine.html"><li class="li_list active"><i class="fas fa-pills"></i> Medicine</li></a>
                <a href="../html/diesease/diesease.html"><li class="li_list"><i class="fas fa-clinic-medical"></i> Hospital</li></a>
                <a href="../html/diesease/diesease.html"><li class="li_list"><i class="fab fa-accessible-icon"></i> Patients</li></a>
                <a href="../html/diesease/diesease.html"> <li class="li_list"><i class="fas fa-blog"></i> Post</li></a>
                <a href="../html/diesease/diesease.html"> <li class="li_list"><i class="far fa-address-book"></i> Contact</li></a>
                <a href="../html/diesease/diesease.html"></a><li class="li_list"><i class="fas fa-cog"></i> Settings</li></a>

               
            </ul>
        </div>


        <!-- this is second div where actual dashboard is available -->
        <div class="second_div">



            <div class="add_doctor">
                <h2 class="dashboard_name">Edit medicines</h2>
            </div>
<?php
include"connection.php";
$id=$_GET['id'];
$sql="SELECT * FROM medicine WHERE med_id='{$id}'";
$query=mysqli_query($con,$sql) or die("Query Failed");
while($row=mysqli_fetch_assoc($query)){
?>
            <div class="add_div">
               <form class="add_form" method="POST" action="save_edit_medicine.php" enctype="multipart/form-data">
               <input type="hidden" name= "id" value="<?php echo $row['med_id'];?>" placeholder="Enter post title"/>
                   <li>
                    <label>name :-</label>
                    <input type="text" name= "name" value="<?php echo $row['med_name'];?>" placeholder="Enter post title"/>
                   </li>

                   <li>
                    <label>Diasese :-</label>
                    <input type="text" name= "diasese" value="<?php echo $row['disease'];?>"  placeholder="Enter post title"/>
                   </li>
                   <li>
                    <label>Kefacts :-</label>
                    <input type="text" name= "kefacts" value="<?php echo $row['kefacts'];?>"  placeholder="Enter post title"/>
                   </li>
                  
                   <li>
                    <label>side effect :-</label>
                    <input type="text" name= "se"  value="<?php echo $row['side_effects'];?>" placeholder="Enter post title"/>
                   </li>
                   <li>
                    <label>med Descreption:-</label>
                    <textarea id="message" name="desc"  placeholder="Enter post Description..." required ><?php echo $row['med_descreption'];?></textarea>
                    </li>
                    <li>
                    <label>extra title :-</label>
                    <input type="text" name= "etitle" value="<?php echo $row['extra_title'];?>"  placeholder="Enter post title"/>
                   </li>
                   <li>
                    <label>extra Descreption:-</label>
                    <textarea id="message" name="edesc"   placeholder="Enter post Description..." required ><?php echo $row['extra_desc'];?></textarea>
                    </li>

                    <li>
                    <label>Med Image:-</label>
                    <input type="file" name="new-image" name="fileToUpload">
                <img  src="medicine/<?php echo $row['med_image'];?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['med_image'];?>">
                   </li>
               

               <button class="submit" type="submit" name="uploada">Update</button>
               </form>
               <?php } ?>
           </div>

        </div>
    </div>
</body>

<script>

        // this jabascript is for edit delete on doctor details

       function myFun(){
        var edit_delete= document.getElementById("edit_delete");

        if(edit_delete){
            var edit_delete= document.getElementById("edit_delete").style.display="block";
        }
    }




    // Add active class to the current button (highlight it)
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("li_list");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
      });
    }
    </script>
</html>




