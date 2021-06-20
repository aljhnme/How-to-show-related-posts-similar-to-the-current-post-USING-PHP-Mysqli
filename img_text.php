<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <?php include 'mysqli.php'; ?>
  <div class="container">
  	 <br>
  	 <br>
  	 <br>
  	<div class="row">
  		<div class="col-md-5 col-lg-5">
  			<div class="featured-article">
  				 <img src="<?php echo $_POST['img'];?>">
  				<div class="block-title">
  					<h2><?php echo $_POST['text'];?></h2>
  				</div>
  			</div>
  		</div>
    </div>
    <?php echo text_si($connect,$_POST['text']);?>
  </div>
</body>
</html>

<?php  
 function text_si($connect,$text)
 {
   $sql="SELECT * FROM `text_img` where `text` != '".$text."'";

   $result=$connect->query($sql);

   while ($row = $result->fetch_assoc()) 
   {
      $text_o=explode(" ",$text);

      $text_m=explode(" ",$row['text']);

      $diff_string=array_diff($text_o,$text_m);

      $val_str_new=str_replace($diff_string,'',$text);

      //Gives a number half the number of words in the string
      $count_num_string=str_word_count($text)/2;

      if (str_word_count($val_str_new) >= $count_num_string) 
       {
        ?>
           <div class="col-md-7 col-lg-7">
              <ul class="media-list main-list">
                <li class="media">
                  <a  class="pull-left">
                   <img src="<?php echo $row['img'];?>" class="media-object" 
                    style="width:150px;height:90px;">
                  </a>
                  <div class="media-body">
                    <h4 class="media-heading">
                      <?php echo $row['text'];?>
                    </h4>
                  </div>
                </li>
              </ul>
            </div>
          <?php
          }
        }
      }
     ?>