<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
   <div class="container" id="tourpackages-carousel">
   	 <form>
   	 	<div class="form-group">
   	 		<label for="img">Choose a picture</label>
   	 		<input type="file" class="form-control-file" id="img" name="img">

   	 		<label for="text">Enter text around the image</label>
   	 		<textarea class="form-control" id="text" name="text"></textarea>
   	 	</div>
   	 	<button type="submit" id="Insert" class="btn btn-primary">Insert</button>
         <div id="sc">
            
         </div>
   	 </form>
       <br>
       <br>
   	 <div class="row">
             
   	 </div>
    </div>
</body>
<script type="text/javascript">
   $(document).ready(function(){
     $('form').submit(function(e){

         e.preventDefault();
         
         var data=new FormData(this);

         $.ajax({
             url:"insert.php",
             type:"post",
             data:data,
             processData:false,
             contentType:false,
             cache:false,
             success:function(data)
             {
                $("#sc").text(data);
                fetch_img_text();
             }
         });
      });

     fetch_img_text();
     function fetch_img_text()
     {
        $.ajax({
            url:"fetch.php",
            success:function(data)
            {
               $(".row").html(data);
            }
        });
     }
   });
</script>
</html>