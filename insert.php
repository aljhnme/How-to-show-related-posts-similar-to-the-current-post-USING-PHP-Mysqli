<?php 
 
 include 'mysqli.php';

 $imagepath=$_FILES['img']['tmp_name'];

 $name_main=pathinfo($imagepath,PATHINFO_EXTENSION);

 $data_image=file_get_contents($imagepath);

 $image_encode=base64_encode($data_image);

 $img='data:image/'.$name_main.';base64,'.$image_encode;


 $sql="INSERT INTO `text_img`(`text`, `img`) 
                      VALUES ('".$_POST['text']."','".$img."')";

 if ($connect->query($sql)) 
 {
 	echo "successfully inserted";
 }

?>