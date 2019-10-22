<html>
   <head>
   	  <title>home page</title>
   	  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   	  <style>
   	  	 	.div1{
   	  	  		border:1px solid black;
   	  	  		background-color:white;
   	  	  		margin-left:12px;
   	  	  		color:black;
   	  	  		margin-top: 12px;
   	  	  	}
             form{
            width: 30%;
            height:100%;
            margin-left:10%;
            background-image: linear-gradient(yellow,white);
            margin-top:5%;
         }
         input[type="text"],input[type="password"],input[type="file"],input[type="textarea"]{
            width:120%;
            border-bottom:1px solid white;
            margin-left: 20%;
         }
         textarea{
             border-bottom:1px solid white;
            margin-left: 20%;
         }
         input[type="submit"]{
            width:65%;
            height: 45px;
            background-color: lime;
            margin-left:30%;
         }
         label{
            padding-left: 30%;
         }
         
   	  </style>
   </head>
   <body>
   		
   		<br>
   		 
   		<?php
         session_start();
         if(isset($_SESSION['pid']));
         {
          $pid=$_SESSION['pid'];
          echo $pid;
        
          require 'adminconn.php';

          $accept=mysqli_query($conn,"SELECT * FROM publish WHERE pid='$pid'");
          $number=mysqli_num_rows($accept);
           if($number)
           {
             	 while($row=mysqli_fetch_assoc($accept))
             	 {
                //$pid1=$row['pid'];
             	 	$title=$row['title'];
             	 	$comment=$row['comment'];
             	 	$email=$row['email'];
             	 	$weblink=$row['weblink'];
             	 	$image=$row['image'];


             	 	?>
              	<div class="div1">
                  <form action="" method="POST" enctype="multipart/form-data">
                 <br>
                 <p style="text-align:center;">Make a post</p>
                 <input type="hidden" name="id" value="<?php echo $pid;?>"><br>
                 <div class="row">
                    <div class="col-md-2">
                       <label>Title</label>
                    </div>
                    <div class="col-md-7">
                       <?php 
                          echo"<input type='text' name='title' value='$title'>";
                       ?>
                    </div>
                 </div>
                 <br>
                 <div class="row">
                    <div class="col-md-2">
                       <label>Comment</label>
                    </div>
                    <div class="col-md-7">
                      <?php
                        echo "<textarea name='comment' value='$comment'>".$comment."</textarea>";
                       ?>
                    </div>
                 </div>
                 <br>
                 <div class="row">
                    <div class="col-md-2">
                       <label>image</label>
                    </div>
                    <div class="col-md-7">
                      <?php
                       echo "<img src=data:image/jpg;base64,$image width='20%'>";
                     ?>
                      <input type='file' name='image'>
                    </div>
                 </div>
                 <br>
                 <div class="row">
                    <div class="col-md-2">
                       <label>Website linl or contact</label>
                    </div>
                    <div class="col-md-7">
                      <?php
                       echo"<input type='text' name='weblink' value='$weblink'>";
                       ?>
                    </div>
                 </div>
                 <br>
                 <div class="row">
                    <div class="col-md-2">
                       <label>email</label>
                    </div>
                    <div class="col-md-7">
                     <?php
                      echo"<input type='text' name='email' value='$email'>";
                       ?>
                    </div>
                 </div>
                 <br>             
                 <input type="submit" name="update" value="update">  
                 <input type="submit" name="delete" value="delete">            
              </form>
            </div>
            
              <?php

              if(isset($_POST['update']))
                {
                  echo "hellow";
                  $id=$_POST['id'];
                  $title1=$_POST['title'];
                  $comment1=$_POST['comment'];
                  $weblink1=$_POST['weblink'];
                  $email1=$_POST['email'];

                  $image1=$_FILES['image']['tmp_name'];
                  if($image1){
                    $binary1=fread(fopen($image1,"r"),filesize($image1));
                    $picture1=base64_encode($binary1);
                  
                   echo $picture1;

                    $update=mysqli_query($conn,"UPDATE publish SET title='$title1',comment='$comment1',image='$picture1',weblink='$weblink1',email='$email1' WHERE pid='$id'");
                    if($update)
                    {
                      echo"<script>";
                      echo"document.location.replace('./home.php')";
                      echo"</script>";
                    }
                    else
                    {
                      echo $conn->error;
                    }
                  }
                }//isset update
                if(isset($_POST['delete']))
                {
                  $id=$_POST['id'];
                  $delete=mysqli_query($conn,"DELETE FROM publish WHERE pid='$id'");
                      if($delete)
                      {
                        echo"<script>";
                        echo"document.location.replace('./home.php')";
                        echo"</script>";
                      }
                      else
                      {
                        echo $conn->error;
                      }
                }
              
              
           	 }//while
           }//if
        
           else
           {
           	 echo "not post id like this";
           }
          }

   		?>
      
   </body>
</html>