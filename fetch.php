<?php 

 include 'mysqli.php';

 $sql="SELECT * FROM `text_img`";

 $result=$connect->query($sql);

 while ($row = $result->fetch_assoc()) 
 {
 	 ?>
      <div class="col-xs-18 col-sm-6 col-md-3">
       <div class="thumbnail">
        <img src="<?php echo $row['img'];?>" class="thumb">
              <div class="caption">
                <p><?php echo $row['text']; ?></p>
                <form action="img_text.php" method="post">
                  <label for="move<?php echo $row['id'];?>">
                  	  <p><a class="btn btn-info btn-xs" role="button">view</a></p>
                  </label>
                   <input type="submit" id="move<?php echo $row['id'];?>" style="display:none;">

                   <input type="hidden" name="text" value="<?php echo $row['text'];?>">

                   <input type="hidden" name="img" value="<?php echo $row['img'];?>">
                </form>
            </div>
          </div>
        </div>
 	 <?php
      }
     ?>